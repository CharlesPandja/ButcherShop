<?php

require_once '../models/User.php';
require_once '../daos/UserDAO.php';

class UserController {
    public function getUserArea() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: ../views/auth/login.php");
            exit;
        }

        $user = $_SESSION['user'];
        include '../views/pages/userArea.php';
    }
}