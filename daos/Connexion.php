<?php
// Connexion.php
function getConnection() {
    $config = parse_ini_file('../conf/BdTassili.ini', true);
    $dbParams = $config['section_connexion'];
    try {
        $pdo = new PDO("mysql:host={$dbParams['serveur']};dbname={$dbParams['bd']}", $dbParams['ut'], $dbParams['mdp']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        echo $e->getMessage();
        $pdo = null;
    }
    return $pdo;
}
?>