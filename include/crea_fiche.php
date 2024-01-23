<h1> Création de Fiche </h1>

<form class="marge_gauche"method="POST" action="creation.php">

    <div class="creaFiche">
        <p>Nom de l'établissement : </p>
        <input class="creaFiche" type="text" name="etablissement"/>
    </div>

    <div class="creaFiche">
        <p>Pays :                   </p>
        <input class="creaFiche" type="text" name="pays"/>
    </div>

    <div class="creaFiche">
        <p>Nom de la formation :    </p>
        <input class="creaFiche" type="text" name="libelle_form"/>
    </div>

    <div class="creaFiche">
        <p>Niveau :                 </p>
        <input class="creaFiche" type="text" name="niveau"/>
    </div>

    <div class="creaFiche">
        <p>Date de début :          </p>
        <input class="creaFiche" type="date" name="date_deb"/>
    </div>

    <div class="creaFiche">
        <p>Date de fin :            </p>
        <input class="creaFiche" type="date" name="date_fin"/>
    </div>

    <input type="button" value="Annuler" onclick='location.href=\"index.php\"'/>
    <input type="submit" value="Enregistrer la fiche">
    
</form>