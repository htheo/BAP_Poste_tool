<?php
if (isset($pseudo) && isset($donnees_projet[0])){
    ?>

    <div class="start-projet">
        <h2>A propos du projet</h2>

        <form action="../admin.php?action=update&panel=edit-start-projet-v" name="start-form" method="post" enctype="multipart/form-data">
            <div class="input-group fileUpload">
                <span>Enregister le cahier des charges</span>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input type="file" id="uploadBtn" class="upload" name="cdc" accept=".doc,.docx, .pdf, .txt, .pages, .odt">
            </div>
            <input id="uploadFile" placeholder="Choisissez un fichier" disabled="disabled" />

            <div class="input-group">
                <label for="pitch">Pitch du projet</label><br>
                <textarea name="pitch" rows="3"></textarea>
            </div>
            <div class="input-group">
                <label for="deadline">Date de livraison</label><br>
                <input type="date" name="deadline">
            </div>
            <button type="submit">Valider</button>
        </form>
    </div>
    <script type="application/javascript">
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    </script>
    <?php
}
?>