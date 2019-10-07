<?php
// src/Service/BRPService.php
namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use GuzzleHttp\Client;

class BRPService
{
	private $client;
	
	public function __construct()
	{		
		$this->client= new Client([
				// Base URI is used with relative requests
				'base_uri' => 'http://brp.demo.zaakonline.nl/',
				// You can set any number of default request options.
				'timeout'  => 2000.0,
		]);
	}
	
	public function getAll()
	{
		$response = $this->client->request('GET','/personen');
		$response = json_decode($response->getBody(), true);
		return $response["hydra:member"];
	}
	
	public function getOne($bsn)
	{		
		$response = $this->client->request('GET','/personen',['query' => ['burgerservicenummer' => $bsn]]);
		$response = json_decode($response->getBody(), true);
		return $response["hydra:member"][0];
	}
	
}
