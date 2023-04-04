
<form action="" method="POST" id="formSearch">
    <div>
        <label for="referenceList">Référence : </label>
        <input list="referenceList" id="searchRef" name="searchRef">
        <datalist id="referenceList" name="referenceList">
            <?php
            foreach(getToutBiens($lepdo) as $bien){
                ?>
                <option value="<?php echo $bien['reference']?>"><?php echo $bien['reference']?></option>
                <?php
            }
            ?>
        </datalist>
    </div>
    <div class="searchVille">
        <label for="villeList">Ville : </label>
        <select name="villeList" id="villeList">
            <option value="" selected> -- </option>
            <?php
            foreach(getVilles($lepdo) as $ville){
                ?>
                <option value="<?php echo $ville['noVille']?>"><?php echo $ville['libelle']?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="chooseType">
        <label for="typelist">Type : </label>
        <select name="typeList" id="typelist">
            <option value="" selected> -- </option>
            <?php
            foreach(getTypes($lepdo) as $type){
                ?>
                <option value="<?php echo $type['noType']?>"><?php echo $type['libelle']?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="chooseJardin">
        <label for="ChoixJardin">Jardin : </label>
        <select name="ChoixJardin" id="ChoixJardin">
            <option value="" selected> -- </option>
            <option value= "1">oui</option>
            <option value= "0">non</option>
        </select>
    </div>
    <div class="choosePrix">
        <div class="prixMax">
            <label for="ChoixPrixMin">Prix Minimum : </label>
            <input Type="number" name = "ChoixPrixMin">
        </div>
        <div class="prixMin">
            <label for="ChoixPrixMax">Prix Maximum : </label>
            <input Type="number" name = "ChoixPrixMax">
        </div>
    </div>
    <div class="surfaceMini">
        <label for="ChoixSurfaceMin">Surface Minimum : </label>
        <input Type="number" name = "ChoixSurfaceMin">
    </div>
    <div class="piecesMini">
        <label for="ChoixPiecesMin">Nombre de pièces Minimum : </label>
        <input Type="number" name = "ChoixPiecesMin">
    </div>
    <input type="submit" id="submit" name="submit" value="Rechercher">
</form>
