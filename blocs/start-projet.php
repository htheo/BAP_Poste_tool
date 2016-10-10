<?php
if (isset($pseudo) && isset($donnees_projet[0])){
    ?>

    <div class="start-projet">
        <h2>1er Etape - A propos du projet</h2>

        <form action="../admin.php?action=update&panel=edit-start-projet-v" name="start-form" method="post" enctype="multipart/form-data">

            <div class="input-group">
                <label for="cdc">Cahier des charge</label><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input type="file" name="cdc" accept=".doc,.docx, .pdf, .txt, .pages, .odt">
            </div>
            <div class="input-group">
                <label for="pitch">Pitch du projet</label><br>
                <textarea name="pitch" cols="30" rows="2"></textarea>
            </div>
            <div class="input-group">
                <label for="deadline">Date de livraison</label><br>
                <input type="date" name="deadline">
            </div>
            <button type="submit">Valider</button>
        </form>
    </div>

    <?php
}
?>