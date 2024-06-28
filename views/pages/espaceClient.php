<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client - Boucherie Tassili</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="shortcut icon" href="../images/logo.png" type="images/png" alt="FavIcon" />
</head>

<body>
    <?php include '../includes/header.php'; ?>

    <main class="client-content">
        <section class="client-banner">
            <div class="client-presentation">
                <div class="clientTitle">
                    <h1>Espace Client</h1>
                    <hr class="separator">
                </div>
                <p class="client-slogan">Rejoignez notre espace client pour bénéficier de nos offres exclusives et suivre vos commandes en ligne.</p>
            </div>
        </section>
        <section class="client-options">
            <div class="client-option">
                <h2>Connexion</h2>
                <?php if (isset($loginerror)) : ?>
                    <p style="background-color: red; color: white;"><?php echo $loginerror; ?></p>
                <?php endif; ?>
                <form action="../controllers/loginCTRL.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Se connecter</button>
                    </div>
                </form>
            </div>
            <div class="client-option">
                <h2>Inscription</h2>
                <?php if (isset($error)) : ?>
                    <p style="background-color: red; color: white;"><?php echo $error; ?></p>
                <?php elseif (isset($success)) : ?>
                    <p style="background-color: green; color: white;"><?php echo $success; ?></p>
                <?php endif; ?>
                <form action="../controllers/registerCTRL.php" method="POST">
                    <div class="form-group">
                        <label for="register-lastname">Nom :</label>
                        <input type="text" id="register-lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="register-firstname">Prénom :</label>
                        <input type="text" id="register-firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="register-email">Email :</label>
                        <input type="email" id="register-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="register-phone-code">Indicatif téléphonique :</label>
                        <select id="register-phone-code" name="phone_code" required>
                            <option value="+33">France (+33)</option>
                            <!-- <option value="+1">USA (+1)</option>
                            <option value="+44">UK (+44)</option>
                            <option value="+44">CMR (+237)</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="register-phone">Téléphone :</label>
                        <input type="text" id="register-phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="register-password">Mot de passe :</label>
                        <input type="password" id="register-password" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">S'inscrire</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>

</html>