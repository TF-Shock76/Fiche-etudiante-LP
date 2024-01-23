<h1> Modification de Fiche </h1>

<form class="marge_gauche" method="POST" action="modification_fiche.php">
    <div class="creaFiche">
        <input type="hidden" name="id_fiche" value="<?php echo $id ?>">
        <p>Nom de l'établissement : </p>
        <input class="creaFiche" type="text" name="etablissement" value="<?php echo $fiche['etabli_fiche']?>"/>
    </div>
    <div class="creaFiche">
        <p>Pays :                   </p>
        <input class="creaFiche" type="text" name="pays" value="<?php echo $fiche['pays_fiche']?>"/>
    </div>
    <div class="creaFiche">
        <p>Nom de la formation :    </p>
        <input class="creaFiche" type="text" name="libelle_form" value="<?php echo $fiche['libelle_fiche']?>"/>
    </div>
    <div class="creaFiche">
        <p>Niveau :                 </p>
        <input class="creaFiche" type="text" name="niveau" value="<?php echo $fiche['niveau']?>"/>
    </div>
    <div class="creaFiche">
        <p>Date de début :          </p>
        <input class="creaFiche" type="date" name="date_deb" value="<?php echo $fiche['date_deb_fiche']?>"/>
    </div>
    <div class="creaFiche">
        <p>Date de fin :            </p>
        <input class="creaFiche" type="date" name="date_fin" value="<?php echo $fiche['date_fin_fiche']?>"/>
    </div>

    <input type="button" value="Annuler" onclick='location.href=\"accueil.php\"'/>
    <input type="submit" value="Enregistrer la fiche">
</form>