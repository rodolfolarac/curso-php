<?php
require_once 'sistema/configuracao.php';
require_once './helpers.php';
date_default_timezone_set('America/Sao_Paulo');
//include 'configuracao.php';

//declare(strict_types = 1) Não deixa que o PHP converta numeros em string com variavéis 
//tipadas

$hora = date('d/m/Y H:i:s');
echo "<h1>Exercícios</h1>";
echo $hora;
echo "<hr>";
echo contarTempo('2024-04-25 06:00:15');
echo "<hr>";
var_dump(validarEmail("rodolfo@hotmail.com"));

echo url('admin');
echo "<hr>";
echo slug("TESTE123");
echo "<hr>";
echo slug("Avatar - O caminho da agua");
