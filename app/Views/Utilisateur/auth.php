<form action="/login" method="post" >
<?php if (isset($_SESSION['error'])) { ?>
     <div> <?= $_SESSION['error'] ?> </div>
<?php }?>
     <label for="nameuser">Nom d'utilisateur</label><br />
     <input type ="text" name="nameuser" id="nameuser"/><br />
     <label for="password">Mot de passe</label><br />
     <input type ="password" name="password" id="password"/><br />
     <input type="submit" name="submit" value="Se connecter"/>-->
     <!--<button>Se connecter</button>-->
</form>   