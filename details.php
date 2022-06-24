<?php
require 'functions.php';
$connection = dbConnect();

//checken of id wel is meegestuurd in de URL
if (!isset($_GET['id'])) {
    echo "De id is niet gezet";
    exit;
}

//checken of het wel een getal (integer) is
$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if ($check_int == false) {
    echo "Dit is geen getal (interger)";
    exit;
}

$statement = $connection->prepare('SELECT * FROM `mannen` WHERE id=?');
$params = [$id];
$statement->execute($params);
$place = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Heren kleding">
    <link rel="stylesheet" href="css/style.css ">
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <script src="js/script.js" defer></script>
    <title>Roiky-man</title>
    <link rel="short icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <nav>
            <ul class="ul--header">
                <li class="li--header"><a class="a--header" href="index.html" class="active">Roiky</a></li>
                <li class="li--header"><a class="a--header" href="heren.php">Heren</a></li>
                <li class="li--header"><a class="a--header" href="vrouwen.php">Vrouwen</a></li>
                <li class="li--header"><a class="a--header" href="contact.php">Contact</a></li>
                <li class="li--header"><a class="a--header" href="kopen.html"><i class="fa-solid fa-basket-shopping"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article class="detail--article">ejneie</article>


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

<img <?php echo $place['foto'] ?> class="modal__image">
        <?php echo $place['merk'] ?>
        <?php echo $place['beschrijving'] ?>
        €<?php echo $place['prijs'] ?>
        <?php echo $place['info'] ?>
        <a href="#" onclick="goBack()" class="terug--link">Terug</a>