<div>
<?php for ($i = 1; $i < count($params); $i++) {
    if ($params[$i]->getIdDestinataire() === $_SESSION['nameuser']) {
        ?> 
      <p class = "recu"><?= $params[$i]->getContenu(); ?></p>
    <?php }else{ ?>
        <p class = "envoi"><?= $params[$i]->getContenu(); ?></p>
    <?php }} ?>      
</div>