<?php
include_once "inc/header.inc.php";
include_once 'autres/verifBienReference.php';  
    $reference = $_GET['reference'];
    $leBien = getBienByReference($db, $reference);
    if(isset($_POST['btnDownload'])){
        header("Location: ?page=pdf&reference=$reference");
    }
    if(isset($_POST['supprBien'])){
        supprimerBien($reference);
        header("Location: index.php?page=lesbiens");
    }
    ?>

<section class="midpage">
        <div class="top">
            <div class="topleft">
                <div class="title">
                    <h1>
                    <?php echo $leBien["type_bien"]." ".$leBien["nbpiece"]." pièces";?></h1>
                    </h1>

                    <span>
                        <h3>
                            <?php echo $leBien['prix']." €";?>
                        </h3>
                    </span>
                </div>

                <div class="caracteristiques">
                    <section>
                        <h2>L'essentiel</h2>
                        <span><?php echo $leBien['nbpiece']?> piece</span><br>
                        <span>Situé à <?php echo $leBien['ville_nom']?></span><br>
                        <span>Surface de <?php echo $leBien['surface']?> m²</span><br>
                    </section>
                    <?php if($leBien['jardin']==true){ ?>
                    <section>
                        <h2>L'extérieur</h2>
                        <span>Posséde un jardin</span>
                    </section>
                    <?php } ?>
                </div>
            </div>
            <div class="slider">
                <img src="<?php echo $leBien['img']?>" alt="Le bien">
            </div>
        </div>
        <article>
            <div class="desc">
                <h1>
                    Description
                </h1>
                <p>
                    <?php echo $leBien['description'];?>
                </p>
            </div>
            <aside>
                <form action="" method="post" target="_blank">
                    <label for="btnDownload"><img src="img/pdf.png" alt="pdf image"></label>
                    <input type="submit" value="DOWNLOAD PDF" name="btnDownload" id="btnDownload">
                    </form>
                <?php if(isset($_SESSION['nom'])){ ?>
                <form action="" method="post">
                    <input type="submit" name="supprBien" value="Supprimer le bien">  
                </form>
            <?php } ?> 
            </aside>
        </article>
</section>
