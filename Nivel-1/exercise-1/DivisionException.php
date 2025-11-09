<?php
function dividir ($a, $b) {
    if ($b == 0) {
        throw new  Exception ("No se puede dividir por 0!");
    }
    return $a / $b;
}

try{
    echo dividir(5, 0);
    } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    }
?>