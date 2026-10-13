<?php
// Palabra que se esconde en la imagen (img/imagen.svg es una casa)
$respuesta = "casa";

// Compara sin importar mayúsculas, espacios ni tildes
function normaliza($t) {
    $t = mb_strtolower(trim($t), 'UTF-8');
    return strtr($t, ['á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u']);
}
