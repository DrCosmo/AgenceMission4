
<div class="user">
            <?php
    if(isset($_SESSION['nom'])){ ?>
    <h1 id="helloUser">Bonjour, <?php echo $_SESSION['nom']," ",$_SESSION['prenom'];?></h1>
        <a href="?deconnexion=1" id="disconect">DECONNEXION</a>
    <?php } ?>
</div>