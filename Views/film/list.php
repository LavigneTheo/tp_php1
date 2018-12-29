
<section class="grid">
    <div class="list-film">
        <div class="title">
            <h1>Vos films</h1>
        </div>
        <?php foreach ($films as $film) : ?>
            <div class="col-1-2">
                <article class="list-item">
                    <img height="100" src="<?php echo $film->image_path;?>" alt="Affiche du film <?php echo $film->name; ?>">
                    <h1><?php echo $film->name; ?></h1>
                    <div class="content">
                        <span>Sortie en <?php echo $film->year; ?> et réalisé par <?php echo $realisators[$film->realisator_id]->surname.' '.$realisators[$film->realisator_id]->name; ?></span>
                        <p>
                            <?php echo $film->summary; ?>
                        </p>
                        <p>Categorie : <?php echo $categories[$film->category_id]->name; ?></p>
                    </div>

                </article>
            </div>
        <?php endforeach; ?>
    </div>

</section>



