<form action="" method="POST" id="formAjoutbien">
    <div class="saisieVille">
        <label for="saisieVille">Ville : </label>
        <input list="saisieVilles" id="saisieVille" name="saisieVille" placeholder="City here" required>
        <datalist id="saisieVilles" name="saisieVilles">
            <?php
            foreach(getVilles($lepdo) as $ville){
                ?>
                <option value="<?php echo $ville['noVille']?>"><?php echo $ville['libelle']?></option>
                <?php
            }
            ?>
        </datalist>
    </div>
    <div class="saisieType">
        <label for="saisieType">Type : </label>
        <input list="saisieTypes" id="saisieType" name="saisieType" placeholder="Type here" required>
        <datalist id="saisieTypes" name="saisieTypes">
            <?php
            foreach(getTypes($lepdo) as $type){
                ?>
                <option value="<?php echo $type['noType']?>"><?php echo $type['libelle']?></option>
                <?php
            }
            ?>
        </datalist>
    </div>
    <div class="saisieJardin">
        <label for="saisieJardin">Jardin : </label>
        <input type="radio" id="oui" class="radioBtn" name="saisieJardin" value="1" required>
        <label for="oui">OUI</label>
        <input type="radio" id="non" class="radioBtn" name="saisieJardin" value="0" required>
        <label for="non">NON</label>
    </div>
    <div class="saisieSurface">
        <label for="saisieSurface">Surface : </label>
        <input type="number" id="saisieSurface" name="saisieSurface" placeholder="Surface here" min="0" value="" required>
        <p>m²</p>
    </div>
    <div class="saisieNbPiece">
        <label for="saisieNbPiece">Nombres de pieces : </label>
        <input type="number" id="saisieNbPiece" name="saisieNbPiece" placeholder="Number of piece here" min="0" value="" required>
    </div>
    <div class="saisiePrix">
        <label for="saisiePrix">Prix : </label>
        <input type="number" id="saisiePrix" name="saisiePrix" min="0" value="" 
               placeholder="Price here" required>
        <p>€</p>
    </div>
    <div class="saisieDescription">
        <label for="saisieDescription">Description : </label>
        <input type="text" id="saisieDescription" name="saisieDescription" 
               value="" placeholder="Description here" required>
    </div>
    <div class="saisieImage">
        <label for="saisieImage">Image : </label>
        <input type="text" id="saisieImage" name="saisieImage" 
               value="" placeholder="URL image here" required>
    </div>
    <input type="submit" id="submit" name="submit" value="Ajouter">
</form>