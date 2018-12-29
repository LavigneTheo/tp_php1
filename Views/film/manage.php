
<section class="grid manage film">
    <div class="options">
        <div class="active">
            <h2>Film</h2>
        </div>
        <div>
            <h2><a href="?p=category.manage">Catégorie</a></h2>
        </div>
        <div>
            <h2><a href="index.php?p=realisator.manage">Réalisateur</a></h2>
        </div>
    </div>
    <form action="?p=film.save" method="post" enctype="multipart/form-data">
        <div class="col-1-2 form-item">
            <label for="name">Titre du film : </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="col-1-2 form-item">
            <label for="year">Année de sortie : </label>
            <input type="number" min="1800" max="2099" step="1" name="year" id="year"/>
        </div>
        <div class="col-1-2 form-item">
            <label for="category_id">Catégorie : </label>
            <select name="category_id" id="category_id">
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-1-2 form-item">
            <label for="realisator_id">Réalisateur : </label>
            <select name="realisator_id" id="realisator_id">
                <?php foreach ($realisators as $realisator): ?>
                    <option value="<?php echo $realisator->id; ?>"><?php echo $realisator->name.' '.$realisator->surname; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-item">
            <input type="file" name="file" id="file">
        </div>
        <div class="form-item">
            <label for="summary">Description du film : </label>
            <textarea name="summary" id="summary" cols="30" rows="10"></textarea>
        </div>
        <div class="button-container">
            <button type="submit" class="button">Ajouter</button>
        </div>
    </form>

</section>