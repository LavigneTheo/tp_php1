
<section class="manage realisator">
    <div class="options">
        <div>
            <h2><a href="index.php?p=film.manage">Film</a></h2>
        </div>
        <div >
            <h2><a href="?p=category.manage">Catégorie</a></h2>
        </div>
        <div class="active">
            <h2>Réalisateur</h2>
        </div>
    </div>
    <div class="list">
        <?php foreach($realisators as $realisator): ?>
            <article class="item grid">
                <form action="index.php?p=realisator.edit" method="post">
                    <input type="hidden" name="id" value="<?php echo $realisator->id; ?>">
                    <div class="col-3-12 field">
                        <input type="text" name="name" value="<?php echo $realisator->name?>">
                    </div>
                    <div class="col-3-12 field">
                        <input type="text" name="surname" value="<?php echo $realisator->surname?>">
                    </div>
                    <div class="col-2-12 field">
                        <input type="date" name="dob" value="<?php echo $realisator->dob?>">
                    </div>
                    <div class="col-2-12">
                        <button type="submit" class="button icon fa-edit small">Modifier</button>
                    </div>
                    <div class="col-2-12">
                        <a href="index.php?p=realisator.delete&id=<?php echo $realisator->id;?>" class="button icon fa-trash small">Supprimer</a>
                    </div>
                </form>

            </article>
        <?php endforeach;?>
    </div>

    <form class="add" action="index.php?p=realisator.save" method="post">
        <div class="grid">
            <div class="col-1-2">
                <div class="field">
                    <label for="new-name">Nom du réalisateur</label>
                    <input type="text" name="name" id="new-name">
                </div>
            </div>
            <div class="col-1-2">
                <div class="field">
                    <label for="new-surname">Prenom du réalisateur</label>
                    <input type="text" name="surname" id="new-surname">
                </div>
            </div>
            <div class="field">
                <label for="new-dob">Date de naissance : </label>
                <input type="date" name="dob" id="new-dob">
            </div>
        </div>

        <div class="button-container">
            <button type="submit" class="button">Ajouter</button>
        </div>
    </form>
</section>