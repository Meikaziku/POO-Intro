<?php 
require_once ('../utils/autoloader.php');

$titi = new Chien ();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1><?=  $titi->info() ?></h1>
<h2><?= $titi->infoPlus() ?></h2>
<h2><?=  $titi->crie() ?></h2>
</body>
</html>