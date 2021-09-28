<?php

$dados = require 'dados.php';

$contador = count($dados);
echo "Número de países: $contador\n";

function converteNomePaisParaMaiusculo(array $pais){
  $pais['pais'] = mb_convert_case($pais['pais'], MB_CASE_UPPER); 
  return $pais;
}

function verificaPaisTemEspacoNoNome(array $pais){
  return strpos($pais['pais'], ' ')!==false;
}

$dados = array_map('converteNomePaisParaMaiusculo', $dados);
var_dump($dados);
echo '<br>';
echo "--------------------------------------";
echo '<br>';
$dados = array_filter($dados, 'verificaPaisTemEspacoNoNome');
var_dump($dados);
echo '<br>';
echo "--------------------------------------";
echo '<br>';
$dados = array_filter(array_map('converteNomePaisParaMaiusculo', $dados), 'verificaPaisTemEspacoNoNome') ;
var_dump($dados);