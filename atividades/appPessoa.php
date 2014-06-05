<?php

include 'classes/Pessoa.php';
include 'classes/PessoaStatic.php';

$fulano = new Pessoa('Tarcnux');
$beltrano = new Pessoa('TNX');

echo "<pre>";
print_r($fulano);
echo "</pre>";
echo "<br />\n";
echo "<pre>";
print_r($beltrano);
echo "</pre>";
echo "<br />\n";

//Exemplo de como forçar para chamar o __destruct
//$fulano = null;

$fulano->digaOi();
echo "<br />\n";
$beltrano->digaOi();

//Exemplo de como forçar para chamar o __destruct
$fulano = null;
$beltrano = null;

/*
 * Exemplificando o uso de propriedades estáticas
 */
$cicrano = new PessoaStatic('Finn');
$deltrano = new PessoaStatic('Jake');
        
echo "<pre>";
print_r($cicrano);
echo "</pre>";
echo "<br />\n";
echo "<pre>";
print_r($deltrano);
echo "</pre>";
echo "<br />\n";

$cicrano->digaOi();
echo "<br />\n";
$deltrano->digaOi();

//Ao final todos os objetos são destruídos naturalmente



