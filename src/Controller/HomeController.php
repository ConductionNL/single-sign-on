<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use App\Service\BRPService;
use App\Service\ContactService;
use App\Service\EmployeeService;

class HomeController extends AbstractController
{ 
	/**
	* @Route("/")
	*/
    public function indexAction(Request $request, BRPService $brpService, ContactService $contactService, EmployeeService $employeeService)
	{	
        $personen = [];
        $employees = $employeeService->getEmployees();
        foreach($employees as $employee){
            
            $persoon = [];
            $contact = $contactService->getContactOnUri($employee['contact']);
            $persoon['burgerservicenummer'] =  $employee['id'];
            $persoon['voornamen'] =  htmlentities ( $contact['given_name']);
            $persoon['geslachtsnaam'] =  htmlentities ( $contact['additional_name'].' '.$contact['family_name']);
            $personen[] = $persoon;
        }
	    
		
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
