<?php
if (isset($pseudo) && isset($donnees_projet[0])){
    ?>

    <div class="listing_projet start">
        <div class="bandeau_cycle">
            <h1>A propos du projet</h1>
            <a href="projet-en-cours.php"><img src="../../img/arrow.svg" alt="fleche" title="voir les cycles"></a>
        </div>

        <?php if($donnees_projet[0]['statut'] == "start"){ ?>

        <form action="../admin.php?action=update&panel=edit-start-projet-v" name="start-form" method="post" enctype="multipart/form-data">
            <div class="input-group fileUpload">
                <span>Enregister le cahier des charges</span>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input type="file" id="uploadBtn" class="upload" name="cdc" accept=".doc,.docx, .pdf, .txt, .pages, .odt" required>
            </div>
            <input id="uploadFile" placeholder="Choisissez un fichier" disabled="disabled" />

            <div class="input-group fileUpload">
                <span>Ajouter un planning de Gantt (optionel)</span>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input type="file" id="uploadBtn2" class="upload" name="gantt" accept=".doc,.docx, .pdf, .txt, .pages, .odt">
            </div>
            <input id="uploadFile2" placeholder="Choisissez un fichier" disabled="disabled" />

            <div class="input-group">
                <label for="pitch">Pitch du projet</label><br>
                <textarea name="pitch" rows="3" required></textarea>
            </div>
            <div class="input-group">
                <label for="created_at">Date de début de projet</label><br>
                <input type="date" id="myDate" name="created_at" required>
            </div>
            <div class="input-group">
                <label for="deadline">Date de livraison</label><br>
                <input type="date" id="myDate2" name="deadline" required>
            </div>
            <button type="submit">Valider</button>
        </form>

        <?php } else {  ?>
        <div style="padding-top: 40px; width: 60%; margin: auto; text-align: left">
                <span><strong>Cahier des charges: </strong><?php echo $donnees_projet[0]['cdc_link'] ?> </span><br><br>
                <span><strong>Planning de Gantt: </strong><?php if(isset($donnees_projet[0]['gantt_link'])) {
                        echo ' '.$donnees_projet[0]['gantt_link'];
                } else {
                    echo 'aucun';
                } ?>
                </span><br><br>
                <span><strong>Brief: </strong><?php echo $donnees_projet[0]['pitch'] ?> </span><br><br>
                <span><strong>Fin de projet: </strong><?php echo $donnees_projet[0]['deadline'] ?> </span><br><br>
            </div>

        <?php } ?>
    </div>
    <script type="application/javascript">
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };

        document.getElementById("uploadBtn2").onchange = function () {
            document.getElementById("uploadFile2").value = this.value;
        };

        var today = new Date();
        $('#myDate').val(today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2));
        $('#myDate2').val(today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2));
    </script>
    <?php
}
?>