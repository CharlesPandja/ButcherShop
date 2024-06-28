<?php

require_once 'Connexion.php';

class UserDAO {
    public function getUserByEmail($email) {
        $conn = getConnection();
        if ($conn) {
            try {
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return null;
            }
        }
        return null;
    }

    public function registerUser($lastname, $firstname, $email, $phone, $password) {
        $conn = getConnection();
        if ($conn) {
            try {
                $stmt = $conn->prepare("INSERT INTO users (lastname, firstname, email, phone, password) VALUES (:lastname, :firstname, :email, :phone, :password)");
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':password', $password);
                return $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        return false;
    }

    public function checkEmailExists($email) {
        $conn = getConnection();
        if ($conn) {
            try {
                $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $count = $stmt->fetchColumn();
                return $count > 0;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        return false;
    }

    public function checkPhoneExists($phone) {
        $conn = getConnection();
        if ($conn) {
            try {
                $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE phone = :phone");
                $stmt->bindParam(':phone', $phone);
                $stmt->execute();
                $count = $stmt->fetchColumn();
                return $count > 0;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        return false;
    }
}
?>