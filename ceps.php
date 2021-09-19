<?php 

require __DIR__.'/vendor/autoload.php';
use App\Api;

$obApi = new Api("https://cep.awesomeapi.com.br");

// retorna dados do cep
$result = $obApi->send("GET","/json/05424020");

echo '<pre>'; print_r($result); echo '</pre>'; exit;