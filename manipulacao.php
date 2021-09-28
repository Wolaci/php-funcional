<?php

$dados = require 'dados.php';

$contador = count($dados);
echo "Número de países: $contador\n";

function converteNomePaisParaMaiusculo(array $pais){
  $pais['pais'] = mb_convert_case($pais['pais'], MB_CASE_UPPER); 
  return $pais;
}
$dados = array_map('converteNomePaisParaMaiusculo', $dados);
var_dump($dados);