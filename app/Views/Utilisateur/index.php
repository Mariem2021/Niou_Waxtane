<ul>

    <?php 
    $user = $_SESSION['nameuser'];
    for ($i = 0; $i < count($params); $i++) { ?> 
    <li><button class = "submit" onclick="expedition('<?= $user ?>')" id="<?= $params[$i]->getIdentifiant()?>"><?= $params[$i]->getIdentifiant() ?></button></li>
    <?php } ?>   
<ul>
<!--<h1>Bonjour le monde</h1> -->