<?php 

require __DIR__.'/vendor/autoload.php';
use App\Api;

$obApi = new Api("https://economia.awesomeapi.com.br/json");

// Retorna a ultima ocorrência das moedas selecionadas
$result = $obApi->send("GET","/last/USD-BRL,EUR-BRL,BTC-BRL");

print_r($result);