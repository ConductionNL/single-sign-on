<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use App\Service\BRPService;

class HomeController extends AbstractController
{ 
	/**
	* @Route("/")
	*/
	public function indexAction(Request $request, BRPService $brpService)
	{	
		$personen=[];
		$csv = fopen(dirname(__FILE__).'/../DataFixtures/Resources/personen.csv', 'r');
		$i = 0;
		
		//var_dump(array_map("str_getcsv", file(dirname(__FILE__).'/Resources/Tabel32_Nationaliteitentabel.csv')));
		while (!feof($csv)) {
			// Lets get a line from the csv file
			$line = fgetcsv($csv);
			
			// Lets skip the first line sine it contains colum names
			if($i == 0){
				$i++;
				continue;
			}
			
			$persoon['burgerservicenummer'] =  $line[0];
			$persoon['voornamen'] =  htmlentities ( $line[1]);
			$persoon['geslachtsnaam'] =  htmlentities ( $line[2].' '.$line[3]);
			$personen[] = $persoon;
		}	
		//$personen = $brpService->getAll();
		
		//var_dump($personen);
		$responceUrl = $request->request->get('responceUrl');
		if(!$responceUrl){$responceUrl = $request->query->get('responceUrl');}
		if(!$responceUrl){$responceUrl = $request->headers->get('responceUrl');}
		if(!$responceUrl){$responceUrl = $request->cookies->get('responceUrl');}
		$token = $request->request->get('token ');
		if(!$token){$token = $request->query->get('token ');}
		if(!$token){$token = $request->headers->get('token ');}
		if(!$token){$token = $request->cookies->get('token ');}
		
		return $this->render('index.html.twig', [
				'personen' => $personen,
				'responceUrl' => $responceUrl,
				'token' => $token
		]);
	}
}
