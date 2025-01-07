<?php
class DatabaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }      
    }

    public function insertProduct($name, $price, $description, $img) {
        $query = "INSERT INTO product (name, price, description, img) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("siss", $name, $price, $description, $img);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function getProductById($id) {
        $query = "SELECT * FROM product WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM product WHERE id_product = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function insertUser($username, $email, $password){
        $query = "INSERT INTO user (username, email, password, name, surname) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $username, $email, $password, $name, $surname);
        $stmt->execute();

        return $stmt->insert_id;
    }

    /* public function checkLogin($username, $password){
        $query = "SELECT id_user, username, name FROM user WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    } */

    public function getUserByEmail($email){
        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>