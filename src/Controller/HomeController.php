<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{ 
	/**
	* @Route("/")
	*/
	public function indexAction()
	{
		// Lets make a list of team members
		$team = [];
		$team[] = ['id'=> 1,'icon'=> null,'name'=>'Ruben van der Linde','function'=>'Lead Developer','description'=>'De omdenker en bouwer.','image'=>'images/avatar_ruben.png'];
		$team[] = ['id'=> 2,'icon'=> null,'name'=>'Marleen Romijn','function'=>'Social en Training','description'=>'Ons social brein, zowel on- als offline','image'=>'images/avatar_marleen.png'];
		$team[] = ['id'=> 3,'icon'=> null,'name'=>'Matthias Oliveiro','function'=>'Design en Testing','description'=>'Houdt de kwaliteit hoog.','image'=>'images/avatar_matthias.png'];
		
		// Lets make a list of applications
		$applications = [];		
		
		// Lets make a list of components
		$components=[];
		$components[] = [
				'id'=> 1,
				'icon'=>'fa-lg fas fa-calendar-check',
				'name'=>'Agendas',
				'summary'=>'Afspraken en Beschikbaarheid',
				'description'=>'Met dit component kan je een agenda koppelen aan objecten uit overige componenten. Dit stelt je in staat om voor deze objecten afspraken en beschikbaarheid te tonen en bij te houden.',
				'images'=> [
						'images/large-images/large_agenda.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://agendas.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/agendas-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/agendas'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/agendas/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 2,
				'icon'=>'fa-lg fas fa-user-tie',
				'name'=>'Ambtenaren',
				'summary'=>'Overheidsmedewerkers',
				'description'=>'Het ambtenaren component zorgt ervoor dat je medewerkers van een (semi)overheidsinstelling kan registreren, opvragen en bijhouden.  ',
				'images'=> [
						'images/large-images/large_ambtenaren.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://ambtenaren.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/ambtenaren-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/ambtenaren'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/ambtenaren/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 4,
				'icon'=>'fa-lg fas fa-file-invoice-dollar',
				'name'=>'Betalen',
				'summary'=>'Component voor betalen',
				'description'=>'Dit component heeft als functie het versturen van SMS, E-Mail, Whatsapp berichten of reguliere post naar burgers, aan de hand van vooraf ingestelde sjablonen. Ook is het mogelijk om met de juiste credentials berichten in te zien.',
				'images'=> [
						'images/large-images/large_betalen.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://betalen.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/betalen-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/betalen'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/betalen/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 5,
				'icon'=>'fa-lg fas fa-users',
				'name'=>'BRP', 
				'summary'=>'De Basis Registratie Personen',
				'description'=>'Veel processen binnen de (semi)overheid hebben de BRP nodig om gegevens op te vragen. Dit component is een mock waarmee we de BRP simuleren op NLX. Het bevat een rest-API en mogelijkheden om testdata voor andere componenten te genereren. ',
				'images'=> [
						'images/large-images/large_brp.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://brp.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/brp-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/mock-basisregistratie-personen'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/mock-basisregistratie-personen/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 6,
				'icon'=>'fa-lg fas fa-mail-bulk',
				'name'=>'Contact Registraties',
				'summary'=>'Berichtenverkeer',
				'description'=>'Dit component heeft als functie het versturen van SMS, E-Mail, Whatsapp berichten of reguliere post naar burgers, aan de hand van vooraf ingestelde sjablonen. Ook is het mogelijk om met de juiste credentials berichten in te zien.',
				'images'=> [
						'images/large-images/large_contactregistraties.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://contactregistraties.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/contactregistraties-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/contactregistraties'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/contactregistraties/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 7,
				'icon'=>'fa-lg fas fa-person-booth',
				'name'=>'Instemmingen',
				'summary'=>'Verwerken instemmingen',
				'description'=>'Binnen de gemeentelijke processen is het nodig om vast te stellen wat de intenties van personen of instanties zijn. Dit component maakt gebruik van tokens of digid voor het ondertekenen van intenties, verzoeken of documenten.',
				'images'=> [
						'images/large-images/large_instemeningen.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://instemmingen.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/instemmingen-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/instemmingen'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/instemmingen/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 8,
				'icon'=>'fa-lg fas fa-building',
				'name'=>'Locaties',
				'summary'=>'Overzicht van ruimtes',
				'description'=>'Het component locaties beschrijft een geografische locatie met de daarbij horende kenmerken. Dit stelt je in staat om locaties te raadplegen en te beheren. Daarnaast is het mogelijk hier de kenmerken van de locaties te registreren en aan te passen. ',
				'images'=> [
						'images/large-images/large_agenda.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://locaties.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/locaties-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/locaties'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/locaties/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 9,
				'icon'=>'fas fa-file-invoice',
				'name'=>'Orders',
				'summary'=>'Order verwerking',
				'description'=>'Dit is een "fullfilment" component voor het verwerken van bestellingen. Dit component gaat vaak hand in hand met de componenten betalen, producten en diensten maar dit is niet altijd noodzakelijk.',
				'images'=> [
						'images/large-images/large_orders.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://orders.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/orders-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/orders'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/orders/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 10,
				'icon'=>'fa-lg fas fa-box',
				'name'=>'Producten',
				'summary'=>'Producten en diensten catalogus',
				'description'=>'Dit component is een producten- en dienstencatalogus. Je kan hier de diverse producten en diensten definiëren die te gebruiken zijn in verschillende processen. Dit component wordt vaak gebruikt met de betalen en orders componenten, maar dit is niet altijd noodzakelijk. ',
				'images'=> [
						'images/large-images/large_producten.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://producten-diensten.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/producten-diensten-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/producten-diensten'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/producten-diensten/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 11,
				'icon'=>'fa-lg fas fa-images',
				'name'=>'Resources',
				'summary'=>'Afbeeldingen, films en documenten',
				'description'=>'Het gebruik van multimedia bestanden wordt gefaciliteerd binnen dit component. Het stelt je in staat om multimedia bestanden (waaronder plaatjes en filmpjes) en documenten, te gebruiken met bijvoorbeeld componenten, websites of andere apps.',
				'images'=> [
						'images/large-images/large_resources.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://resources.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/resources-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/resources'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/resources/archive/master.zip']
				]
		];
		$components[] = [
				'id'=> 12,
				'icon'=>'fa-lg fas fa-user-friends',
				'name'=>'Trouwen',
				'summary'=>'Doorgeven huwelijk/partnerschap',
				'description'=>'Het trouwen component bevat alle functionaliteit die nodig is om een huwelijk of partnerschap te kunnen sluiten. Het component kan bijvoorbeeld zaken aanmaken voor zaakgericht werken maar ook de voortgang binnen het trouwproces bijhouden en tonen.',
				'images'=> [						
						'images/large-images/large_trouwen.gif'
				],
				'links'=> [
						['name'=>'online demo','url'=>'http://trouwen.demo.zaakonline.nl/'],
						['name'=>'docker container','url'=>'https://hub.docker.com/r/huwelijksplanner/trouwen-component'],
						['name'=>'codebase (git)','url'=>'https://github.com/GemeenteUtrecht/trouwen'],
						['name'=>'codebase (zip)','url'=>'https://github.com/GemeenteUtrecht/trouwen/archive/master.zip']
				]
		];
		
		// Lets make a list of libraries
		$libraries=[];
		
		return $this->render('home/index.html.twig', [
				'team' => $team,
				'applications' => $applications,
				'components' => $components,
				'libraries' => $libraries,
		]);
	}
}
