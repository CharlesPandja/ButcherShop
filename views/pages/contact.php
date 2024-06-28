<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Boucherie Tassili</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="shortcut icon" href="../images/logo.png" type="images/png" alt="FavIcon" />
</head>

<body>
    <header>
    <?php include '../includes/header.php'; ?>
    </header>

    <main class="contact-content">
        <section class="contact-banner">
            <div class="contact-presentation">
                <div class="contactTitle">
                    <h1>Contactez-Nous</h1>
                    <hr class="separator">
                </div>
                <p class="contact-slogan">Nous sommes à votre écoute pour toutes vos questions et commandes.
                    N'hésitez pas à nous contacter par les moyens ci-dessous.</p>
            </div>
        </section>
        <section class="contact-info">
            <div class="contact-details">
                <h2>Nos Coordonnées</h2>
                <p>Adresse: 145 rue de stalingrad, 38000 Grenoble France</p>
                <p>Téléphone: +33 4 38 49 21 19</p>
                <p>Email: contact@boucherie-tassili.fr</p>
            </div>
            <div class="contact-form">
                <h2>Envoyez-nous un message</h2>
                <form action="process_contact.php" method="post">
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </section>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>

</html>