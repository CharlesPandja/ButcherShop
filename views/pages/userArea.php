<?php
// userArea.php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<?php include '../includes/header.php'; ?>

<main class="user-content">
    <section class="user-banner">
        <div class="user-presentation">
            <div class="userTitle">
                <h1>Bienvenue, <?php echo htmlspecialchars($user['firstname']); ?> !</h1>
                <hr class="separator">
            </div>
            <p class="user-slogan">Gérez vos commandes et découvrez nos offres exclusives.</p>
        </div>
    </section>
    <section class="user-options">
        <div class="user-option">
            <h2>Mes Commandes</h2>
            <p>Visualisez et suivez vos commandes passées.</p>
            <a href="orders.php" class="button">Voir mes commandes</a>
        </div>
        <div class="user-option">
            <h2>Nouvelle Commande</h2>
            <p>Passez une nouvelle commande de nos produits frais.</p>
            <a href="newOrder.php" class="button">Passer une commande</a>
        </div>
        <div class="user-option">
            <h2>Offres Exclusives</h2>
            <p>Accédez à des offres réservées à nos membres.</p>
            <a href="offers.php" class="button">Voir les offres</a>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>