<?php
require 'functions.php';
$connection = dbConnect();

$voornaam = '';
$achternaam = '';
$email = '';
$bericht = '';

// opslag variabele (array voor errors)
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //gegevens opslaan
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];
    $tijdstip = date('Y-m-d H:i:s');

    // fouten controleren
    if (isEmpty($voornaam)) {
        $errors['voornaam'] = 'Vul uw voornaam in a.u.b.';
    }
    if (isEmpty($achternaam)) {
        $errors['achternaam'] = 'Vul uw achternaam in a.u.b.';
    }
    if (!isValidEmail($email)) {
        $errors['email'] = 'Dit is geen geldig e-mail adres!';
    }
    if (!hasMinlength($bericht, 5)) {
        $errors['bericht'] = 'Vul minimaal 5 tekens in.';
    }

    //print_r($errors);

    if (count($errors) == 0) {
        $sql = "INSERT INTO `contact` (`voornaam`, `achternaam`, `email`, `bericht`, `tijdstip`) 
            VALUES (:voornaam, :achternaam, :email, :bericht, :tijdstip);";
        $statement = $connection->prepare($sql);

        $params = [
            'voornaam' => $voornaam,
            'achternaam' => $achternaam,
            'email' => $email,
            'bericht' => $bericht,
            'tijdstip' => $tijdstip
        ];
        $statement->execute($params);

        //stuur bezoeker naar bedanktpagina
        header('location: bedankt.html');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Neem contact met roiky op">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <title>Roiky-contact</title>
    <link rel="short icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <nav>
            <ul class="ul--header">
                <li class="li--header"><a class="a--header" href="index.html">Roiky</a></li>
                <li class="li--header"><a class="a--header" href="heren.php">Heren</a></li>
                <li class="li--header"><a class="a--header" href="vrouwen.php">Vrouwen</a></li>
                <li class="li--header"><a class="a--header" href="contact.php">Contact</a></li>
                <li class="li--header"><a class="a--header" href="kopen.html"><i class="fa-solid fa-basket-shopping"></i></a></li>
            </ul>
        </nav>
    </header>
    <main class="section--mail">
        <div class="container">
            <form action="contact.php" method="POST" id="my-form" novalidate>
                <div class="form-group">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" value="<?php echo $voornaam;?>" id="voornaam" name="voornaam" placeholder="..." required>

                    <?php if(!empty($errors['voornaam'])):?>
                        <p class="form--error"><?php echo $errors['voornaam']?></p>
                    <?php endif;?>

                </div>
                <div class="form-group">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" id="achternaam" value="<?php echo $achternaam;?>" name="achternaam" placeholder="..." required>
                </div>

                <?php if(!empty($errors['achternaam'])):?>
                        <p class="form--error"><?php echo $errors['achternaam']?></p>
                    <?php endif;?>

                <div class="form-group">
                    <label for="emial">Email</label>
                    <input type="email" id="email" value="<?php echo $email;?>" name="email" placeholder="..." required>
                </div>

                <?php if(!empty($errors['email'])):?>
                        <p class="form--error"><?php echo $errors['email']?></p>
                    <?php endif;?>

                <div class="form-group">
                    <label for="bericht">Bericht</label>
                    <textarea style="font-family: sans-serif;" value="<?php echo $bericht;?>" name="bericht" id="bericht" cols="30" rows="10" placeholder="Typ je bericht hier..." required></textarea>
                </div>

                <?php if(!empty($errors['bericht'])):?>
                        <p class="form--error"><?php echo $errors['bericht']?></p>
                    <?php endif;?>

                <div class="button--div">
                    <button class="button--mail" type="submit">Verstuur</button>
                </div>
            </form>
        </div>
        <div id="status"></div>
    </main>
    <footer class="footer">
        <section class="socials">
            <ul class="ul--footer">
                <li>
                    <a class="a--footer" href="https://www.instagram.com/kiet.mandjes_/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a class="a--footer" href="https://www.tiktok.com/@roiky12" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                    <a class="a--footer" href="https://www.facebook.com/igor"><i class="fa-brands fa-facebook"></i></a>
                    <a class="a--footer" href="https://www.youtube.com/channel/UCWTetQnaIb4wsvxbWbYIfXA"><i class="fa-brands fa-youtube"></i></a>
                    <a class="a--footer" href="https://twitter.com/roiky"><i class="fa-brands fa-twitter"></i></a>
                </li>
            </ul>
        </section>
        <section class="mij">
            <ul class="ul--footer">
                <li>
                    Roiky
                </li>
            </ul>
        </section>
    </footer>
</body>

</html>