<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `mannen` WHERE `mv` = "man" ORDER BY RAND();');

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
    <span class="hidden mySlides"></span>
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
    <main class="section">
        <section class="inputs">
            <div>
                <input id="shirts" type="checkbox" class="filter">
                <label for="shirts" class="label">Shirts</label>
            </div>
            <div>
                <input id="jassen" type="checkbox" class="filter">
                <label for="jassen" class="label">Jassen</label>
            </div>
            <div>
                <input selected id="broeken" type="checkbox" class="filter">
                <label for="broeken" class="label">Broeken</label>
            </div>
        </section>
        <ul class="herenKleren">
            <?php foreach ($result as $row) : ?>
                <li class="heren" data-category="<?php echo $row["cat"] ?>">
                    <a href="details.php?id=<?php echo $row['id']; ?>">
                        <img src="img/<?php echo $row['foto'] ?>" alt="">
                        <div class="overlay">
                            <h2><?php echo $row['merk']; ?></h2>
                            <h4><?php echo $row['beschrijving'] ?></h4>
                            <br>
                            <h4>€<?php echo $row['prijs'] ?></h4>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
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