<?php 
require_once ('../utils/autoloader.php');

$myFormule1 = new Formule1();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1><?=  $myFormule1->drive() ?></h1>
<?php $myFormule1->shiftGear() ?>
<h2><?=  $myFormule1->drive() ?></h2>

</body>
</html>