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

    // Return all the available products
    public function getAllProducts() {
        $query = "SELECT * FROM product
            ORDER BY name";
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function addProductToCart($userId, $productId, $quantity) {
        $query = "INSERT INTO cart_product (id_cart, id_product, quantity)
            VALUES ((SELECT id_cart FROM cart WHERE id_user = ?), ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $userId, $productId, $quantity);
        return $stmt->execute();
    }

    // Retrieve products in given user's cart, with details and quantity
    public function getCartProducts($userId) {
        $query = "SELECT p.id_product, p.name, p.price, cp.quantity
            FROM cart_product cp
            JOIN product p ON cp.id_product = p.id_product
            JOIN cart c ON cp.id_cart = c.id_cart
            JOIN user u ON c.id_user = u.id_user
            WHERE u.id_user = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
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
        $query = "DELETE FROM cart_product
            WHERE id_cart = ? AND id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $userId, $productId);
        return $stmt->execute();
    }

    public function insertUser($username, $email, $password, $name, $surname){
        $query = "INSERT INTO user (username, email, password, name, surname) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $username, $email, $password, $name, $surname);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function checkLogin($username, $password){
        $query = "SELECT id_user, username, name FROM user WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
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

    public function updateProduct($name, $price, $description, $stock, $id) {
        $query = "UPDATE product SET name = ?, price = ?, description = ?, stock = ? WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sisii", $name, $price, $description, $stock, $id);
        return $stmt->execute();
    }
}

?>