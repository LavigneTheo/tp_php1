
<section class="manage category">
    <div class="options">
        <div>
            <h2><a href="index.php?p=film.manage">Film</a></h2>
        </div>
        <div class="active">
            <h2>Catégorie</h2>
        </div>
        <div>
            <h2><a href="index.php?p=realisator.manage">Réalisateur</a></h2>
        </div>
    </div>
    <div class="list">
        <?php foreach($categories as $category): ?>
            <article class="item grid">
                <div class="col-2-12">
                    <span><?php echo $category->name;?></span>
                </div>
                <div class="col-10-12">
                    <form action="index.php?p=category.edit" method="post">
                        <div class="col-6-12">
                            <input type="text" name="name">
                            <input type="hidden" name="id" value="<?php echo $category->id;?>">
                        </div>
                        <div class="col-3-12 btn-container">
                            <button type="submit" class="button icon fa-edit small">Modifier</button>
                        </div>
                    </form>
                    <div class="col-3-12 btn-container">
                        <a href="index.php?p=category.delete&id=<?php echo $category->id;?>" class="button icon fa-trash small">Supprimer</a>
                    </div>
                </div>
            </article>
        <?php endforeach;?>
    </div>

    <form action="?p=category.save" method="post">
        <div class="form-item">
            <label for="new-cat">Nom de la catégorie : </label>
            <input type="text" name="name" id="new-cat">
        </div>

        <div class="button-container">
            <button type="submit" class="button">Ajouter</button>
        </div>
    </form>

</section>