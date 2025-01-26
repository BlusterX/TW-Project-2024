<?php
class DatabaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }      
    }

    public function insertProduct($name, $price, $description, $img, $stock) {
        $query = "INSERT INTO product (name, price, description, img, stock) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sissi", $name, $price, $description, $img, $stock);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function getProductById($id) {
        $query = "SELECT * FROM product WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function getProductStock($productId) {
        $query = "SELECT stock FROM product WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return (int) $row['stock'];
        }
        return 0;
    }

    public function updateProductStock($productId, $newQuantity) {
        if($newQuantity < 0) {
            exit("Stock cannot be negative");
        }

        $query = "UPDATE product SET stock = ? WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $newQuantity, $productId);
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM product WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function updateProduct($name, $price, $discount, $description, $stock, $id) {
        $query = "UPDATE product SET name = ?, price = ?, discount = ?, description = ?, stock = ? WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("siisii", $name, $price, $discount, $description, $stock, $id);
        return $stmt->execute();
    }

    // Return all the available products
    public function getAllProducts() {
        $query = "SELECT * FROM product
            WHERE is_deleted = 0
            ORDER BY name";
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductSoldOut() {
        $query = "SELECT * FROM product WHERE stock = 0";
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Initialize a cart instance for the given user
    public function createCart($userId) {
        $query = "INSERT INTO cart (id_user) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        return $stmt->execute();
    }

    public function getCartId($userId) {
        $query = "SELECT id_cart FROM cart WHERE id_user = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return (int) $row['id_cart'];
        }
        return 0;
    }
    
    public function addProductToCart($userId, $productId) {
        $query = "INSERT INTO cart_product (id_cart, id_product, quantity)
            VALUES ((SELECT id_cart FROM cart WHERE id_user = ?), ?, 1)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $userId, $productId);
        return $stmt->execute();
    }

    public function updateCartQuantity($userId, $productId, $newQuantity) {
        if($newQuantity < 1) {
            return $this->removeFromCart($userId, $productId);
        }
        $query = "UPDATE cart_product cp
            JOIN cart c ON cp.id_cart = c.id_cart
            JOIN user u ON c.id_user = u.id_user
            SET cp.quantity = ?
            WHERE u.id_user = ? AND cp.id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $newQuantity, $userId, $productId);
        return $stmt->execute();
    }

    public function isProductInCart($userId, $productId) {
        $query = "SELECT 1
            FROM cart_product cp
            JOIN cart c ON cp.id_cart = c.id_cart
            JOIN user u ON c.id_user = u.id_user
            WHERE u.id_user = ? AND cp.id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $userId, $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    // Retrieve products in given user's cart, with details and quantity
    public function getCartProducts($userId) {
        $query = "SELECT p.id_product, p.name, p.price, p.discount, p.img, cp.quantity
            FROM cart_product cp
            JOIN product p ON cp.id_product = p.id_product
            JOIN cart c ON cp.id_cart = c.id_cart
            JOIN user u ON c.id_user = u.id_user
            WHERE u.id_user = ? AND p.is_deleted = 0";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Return the total number of items in the user's cart
    public function getCartItemsCount($userId) {
        $query = "SELECT SUM(quantity) AS totalItems
            FROM cart_product cp
            JOIN cart c ON cp.id_cart = c.id_cart
            JOIN product p ON cp.id_product = p.id_product
            WHERE c.id_user = ? AND p.is_deleted = 0";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_assoc()) {
            return (int) $row['totalItems'];
        }
        return 0;
    }

    // Return the quantity of a product in the user's cart
    public function getCartQuantity($userId, $productId) {
        $query = "SELECT quantity
            FROM cart_product cp
            JOIN cart c ON cp.id_cart = c.id_cart
            JOIN user u ON c.id_user = u.id_user
            WHERE u.id_user = ? AND cp.id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $userId, $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return (int) $row['quantity'];
        }
        return 0;
    }

    public function removeFromCart($userId, $productId) {
        $query = "DELETE cp
            FROM cart_product cp
            JOIN cart c ON cp.id_cart = c.id_cart
            JOIN user u ON c.id_user = u.id_user
            WHERE u.id_user = ? AND cp.id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $userId, $productId);
        return $stmt->execute();
    }

    public function removeFromAllCarts($productId) {
        $query = "DELETE FROM cart_product WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        return $stmt->execute();
    }

    public function createOrder($userId) {
        $query = "INSERT INTO `order` (id_user, `date`) VALUES (?, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function addProductToOrder($orderId, $productId, $quantity, $price) {
        $query = "INSERT INTO order_product (id_order, id_product, quantity, price)
            VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iiid', $orderId, $productId, $quantity, $price);
        return $stmt->execute();
    }

    public function generateShippingDate($orderId) {
        $shippingDate = date('Y-m-d H:i:s', time() + rand(10, 20));
        $query = "UPDATE `order` SET date_shipping = ? WHERE id_order = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $shippingDate, $orderId);
        return $stmt->execute();
    }

    public function getOrderedProducts($orderId) {
        $query = "SELECT p.id_product, p.name, p.price, p.discount, p.img, op.quantity
            FROM order_product op
            JOIN product p ON op.id_product = p.id_product
            WHERE op.id_order = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $orderId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteOrder($orderId) {
        $query = "DELETE FROM `order` WHERE id_order = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $orderId);
        return $stmt->execute();
    }

    public function deleteOrderedProducts($orderId) {
        $query = "DELETE FROM order_product WHERE id_order = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $orderId);
        return $stmt->execute();
    }

    public function getAllOrders($userId) {
        $query = "SELECT * FROM `order` WHERE id_user = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllOrdersNewestFirst($userId) {
        $query = "SELECT * FROM `order` WHERE id_user = ? ORDER BY id_order DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUndeliveredOrders($userId) {
        $query = "SELECT * FROM `order` WHERE id_user = ? AND is_delivered = 0";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setAsDelivered($orderId) {
        $query = "UPDATE `order` SET is_delivered = 1 WHERE id_order = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $orderId);
        return $stmt->execute();
    }

    public function insertUser($username, $email, $password, $name, $surname){
        $query = "INSERT INTO user (username, email, password, name, surname) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $username, $email, $password, $name, $surname);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function getUserByEmail($email){
        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserByUsername($username){
        $query = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createNotification($userId, $title, $message){
        $query = "INSERT INTO notification (id_user, title, `message`) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iss", $userId, $title, $message);
        return $stmt->execute();
    }

    public function markNotificationAsRead($notificationId) {
        $query = "UPDATE notification SET is_read = 1 WHERE id_notification = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $notificationId);
        return $stmt->execute();
    }

    public function getNotificationById($notificationId) {
        $query = "SELECT * FROM notification WHERE id_notification = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $notificationId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    } 

    public function getUserNotifications($userId) {
        $query = "SELECT * FROM notification WHERE id_user = ? ORDER BY id_notification DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserUnreadNotifications($userId) {
        $query = "SELECT * FROM notification WHERE id_user = ? AND is_read = 0";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminId() {
        $query = "SELECT id_user FROM user WHERE is_admin = 1 LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return (int) $row['id_user'];
        }
        return 0;
    }

    public function getUsernameById($userId) {
        $query = "SELECT username FROM user WHERE id_user = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['username'];
        }
        return null;
    }

    public function getProductWithDiscount() {
        $query = "SELECT * FROM product WHERE discount > 0 AND stock > 0 AND is_deleted = 0";    
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateDeletedProduct($productId) {
        $query = "UPDATE product SET is_deleted = 1 WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        return $stmt->execute();
    }

    public function getUsersWithProductInCart($productId) {
        $query = "SELECT u.id_user
            FROM user u
            JOIN cart c ON u.id_user = c.id_user
            JOIN cart_product cp ON c.id_cart = cp.id_cart
            WHERE cp.id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>