<?php

namespace App;


class Api
{

	/**
	 * URL base do PSP
	 * @var string
	 */
	private $baseUrl;

	/**
	 * Define os dados iniciais da classe
	 * @param string $baseUrl
	 */
	public function __construct(string $baseUrl)
	{
		$this->baseUrl = $baseUrl;
	}

	/**
	 * Método responsável por enviar requisições
	 * @param  string $method
	 * @param  string $resource
	 * @return array
	 */
	public function send(string $method, string $resource)
	{
		//ENDPOINT COMPLETO
		$endpoint = $this->baseUrl . $resource;
      // Agente de usuario
      $userAgent = $_SERVER['HTTP_USER_AGENT'];
		//CONFIGURAÇÃO DO CURL
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL            => $endpoint,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST  => $method,
         CURLOPT_HTTPHEADER	  => ['Content-type: application/json'],
         CURLOPT_USERAGENT      => $userAgent
		]);
		//EXECUTA O CURL
		$response = curl_exec($curl);
		curl_close($curl);

		//RETORNA O ARRAY DA RESPOSTA
		return json_decode($response, true);
	}
}