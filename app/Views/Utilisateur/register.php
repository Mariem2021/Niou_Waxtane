<form action="/register" method="post" >
<?php if (isset($_SESSION['succes'])) { ?>
     <div> <?= $_SESSION['succes'] ?> </div>
<?php }?>
     
    <label for="nameuser">Nom d'utilisateur</label><br />
     <input type ="text" name="username" id="nameuser" required/><br />
        <?php if (isset($_SESSION['errorNameUser'])) { ?>
            <span> <?= $_SESSION['errorNameUser'] ?> </span> <br/>
        <?php }?>
     
    <label for="password">Mot de passe</label><br />
    <input type ="password" name="pass" id="password" required/><br />
    <?php if (isset($_SESSION['errorPassword'])) { ?>
            <span> <?= $_SESSION['errorPassword'] ?> </span> <br/>
        <?php }?>

    <label for="email">Email</label><br />
    <input type ="text" name="email" id="email" required/><br />
    <?php if (isset($_SESSION['errorEmail'])) { ?>
            <span> <?= $_SESSION['errorEmail'] ?> </span> <br/>
        <?php }?>

    <label for="numtel">Numéro de téléphone</label><br />
    <input type ="tel" name="numtel" id="numtel" required/><br />
    <?php if (isset($_SESSION['errorNumTel'])) { ?>
            <span> <?= $_SESSION['errorNumTel'] ?> </span> <br/>
        <?php }?>

    <input type="submit" name="submit" value="S'inscrire"/>
</form>   