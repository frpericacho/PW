<html>
    <header> clases </header>
<?php

include 'clase.php';

$perro = new Animal('azul', 0);
$gato = new Animal('azul', 20);

$cabracho = new Pez('azul', 0);

$cabracho->setMar('adriatico');
echo $cabracho->getMar();
echo '<br>';
$perro->setPeso(10);
echo $perro->getPeso();
echo '<br>';
echo $gato->getColor();
echo '<br>';
echo $gato->getPeso();
echo '<br>';
echo Animal::PESO_MEDIO;
echo '<br>';
Animal::mover();
echo '<br>';
$perro->__destruct();
echo '<br>';
$gato->__destruct();
echo '<br>';

?>
</html>