<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Micropachycephalosaurus">

    <title>Liste de vos films</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/simplegrid.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/base.css">


</head>

<body>

<!--****************************** NAV ******************************-->

<header>
    <nav>
        <div class="grid">
            <div class="col-1-6 nav-item">
                <img src="img/clapperboard.png" height="50" alt="logo">
            </div>
            <div class="col-1-6 nav-item">
                <div>
                    <a href="?p=film.all">Tes films</a>
                </div>
            </div>
            <div class="col-1-6 nav-item">
                <a href="?p=film.manage">Ajouter</a>
            </div>
            <div class="col-1-6 nav-item">
                <a href="?p=film.reset_database">Reset DB</a>
            </div>
        </div>
    </nav>
</header>

<main>
    <?php echo $content ?>
</main>



<!-- ****************************** FOOTER ******************************-->

<footer>

</footer>

</body>

</html>