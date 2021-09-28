<?php

$dados = require 'dados.php';

$contador = count($dados);
echo "Número de países: $contador\n";

function somaMedalhas(int $medalhasAcumuladas, int $medalhas){
  return $medalhasAcumuladas + $medalhas;
}

$brasil = $dados[0];
$numeroMedalhas = array_reduce($brasil['medalhas'], 'somaMedalhas',0);

function converteNomePaisParaMaiusculo(array $pais){
  $pais['pais'] = mb_convert_case($pais['pais'], MB_CASE_UPPER); 
  return $pais;
}

function verificaPaisTemEspacoNoNome(array $pais){
  return strpos($pais['pais'], ' ')!==false;
}

function medalhasTotaisDosPaises(int $medalhasAcumuladas, array $pais){
  return $medalhasAcumuladas + array_reduce($pais['medalhas'], 'somaMedalhas', 0);
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
echo '<br>';
echo "--------------------------------------";
echo '<br>';

echo array_reduce($dados, 'medalhasTotaisDosPaises', 0);