<?php
if (isset($pseudo) && isset($donnees_projet[0])) {
    ?>
    <div class="recettage">
        <h2>Finalisation du projet</h2>
        <div class="export">
            <a href="../admin.php?panel=export-pdf"><div class="button-recettage"><i class="export-icon"></i>Exporter le recettage</div></a>
            <a href="../../<?php echo $donnees_projet[0]['cdc_link'] ?>"><div class="button-recettage"><i class="export-icon"></i>Exporter le cahier des charge</div></a>
            <?php if($donnees_projet[0]['gantt_link'] != ""){ ?>
                <a href="../../<?php echo $donnees_projet[0]['gantt_link'] ?>"><div class="button-recettage"><i class="export-icon"></i>Exporter le planning de Gantt</div></a>
            <?php
            }?>
        </div>
    </div>
    <?php
}
?>