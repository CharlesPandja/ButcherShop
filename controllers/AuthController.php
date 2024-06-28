<?php

require_once '../models/User.php';
require_once '../daos/UserDAO.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                $loginerror = "Tous les champs sont obligatoires.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $loginerror = "Adresse email invalide.";
            } else {
                $userDAO = new UserDAO();
                $user = $userDAO->getUserByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header("Location: ../views/pages/userArea.php");
                } else {
                    $loginerror = "Email ou mot de passe incorrect.";
                }
            }
        }
        include '../views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lastname = trim($_POST['lastname']);
            $firstname = trim($_POST['firstname']);
            $email = trim($_POST['email']);
            $phone_code = trim($_POST['phone_code']);
            $phone = trim($_POST['phone']);
            $password = trim($_POST['password']);

            $full_phone = $phone_code . $phone;

            if (empty($lastname) || empty($firstname) || empty($email) || empty($phone_code) || empty($phone) || empty($password)) {
                $error = "Tous les champs sont obligatoires.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Adresse email invalide.";
            } elseif (!preg_match("/^[a-zA-Z]{2,}$/", $lastname)) {
                $error = "Le nom doit contenir au moins 2 lettres et uniquement des lettres.";
            } elseif (!preg_match("/^[a-zA-Z]{2,}$/", $firstname)) {
                $error = "Le prénom doit contenir au moins 2 lettres et uniquement des lettres.";
            } elseif (!preg_match("/^\d{10}$/", $phone)) {
                $error = "Le numéro de téléphone doit contenir uniquement 10 chiffres.";
            } else {
                $userDAO = new UserDAO();
                if ($userDAO->checkEmailExists($email)) {
                    $error = "Vous êtes déjà inscrit.";
                } elseif ($userDAO->checkPhoneExists($full_phone)) {
                    $error = "Ce numéro de téléphone est déjà utilisé.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $result = $userDAO->registerUser($lastname, $firstname, $email, $full_phone, $hashedPassword);

                    if ($result) {
                        $success = "Inscription réussie. Vous pouvez désormais vous connecter et accéder à votre espace client.";
                    } else {
                        $error = "Échec de l'inscription. Veuillez réessayer.";
                    }
                }
            }
        }
        include '../views/auth/register.php';
    }
}