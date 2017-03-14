<?php

namespace TestfabriceBundle\Controller;
use TestfabriceBundle\Entity\AdvertSkill;
use TestfabriceBundle\Entity\Category;
use TestfabriceBundle\Entity\Advert;
use TestfabriceBundle\Entity\Application;
use TestfabriceBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;//pour récupérer la requête depuis un controller
//use Symfony\Component\HttpFoundation\RedirectResponse;
//Pour simplifier la construction d'une réponse faisant une redirection, il existe l'objet RedirectResponse
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AdvertController extends Controller
{
	  // La route fait appel à OCPlatformBundle:Advert:view,
  // on doit donc définir la méthode viewAction.
  // On donne à cette méthode l'argument $id, pour
  // correspondre au paramètre {id} de la route
 /*public function viewAction($id)
  {
    
    // $id vaut 5 si l'on a appelé l'URL /platform/advert/5

    // Ici, on récupèrera depuis la base de données
    // l'annonce correspondant à l'id $id.
    // Puis on passera l'annonce à la vue pour
    // qu'elle puisse l'afficher

 	return new Response("<body>Affichage de l'annonce d'id : </body>".$id);
  }*/
    
  // ... et la méthode indexAction que nous avons déjà créée
    //on récupère tous les paaramètres en arguments de la méthode
 /*public function viewSlugAction($slug, $year, $format)
    {
    	return new Response("On pourrait afficher l'annonce correspondant au slug '".$slug."',
    		créée en ".$year." et au format ".$format.".");
    }*/
    
   /*public function indexAction()
   {
   	//on veut avoir l'URL  de l'annonce d'id 5.
   	//1er argument : le nom de la route
   	////2eme argument : les valeurs des paramètres
   	
   	$url = $this->get('router')->generate('testfabrice_view', array('id'=> 5));
   	// $url vaut "platform/advert/5"
   	return new Response("L'URL de l'annonce d'id 5 est : ".$url);
   }*/

   //Pour générer une URL absolue, lorsque vous l'envoyez par e-mail par exemple, 
   //il faut mettre le troisième argument de la méthode generate  à true. Exemple :
	/*public function indexAction()
   {

		$url = $this->get('router')->generate('testfabrice_home', array(), true);
		//Ainsi, $url vaut http://localhost:8000/monbundle
		return new Response("L'URL de l'annonce d'id 5 est : ".$url);
	}*/

	/*public function indexAction()
	{
		return new Response("<body>Hello World!</body>");
	}*/

	 /*public function viewAction($id, Request $request)//accès à la requête http via $request
	  {
	    
	    // on récupère notre paramètre tag
	    $tag = $request->query->get('tag');

	 	return new Response("Affichage de l'annonce d'id : ".$id ", avec le tag : ".$tag);
	  }*/
	  
	  //On modifie viewAction, cr elle existe déjà
	  //on utilise pas cette méthode 
	/* public function viewAction($id)
	  {
	  	//on crée la réponse sans lui donner de contenu pour le moment
	  	$response = new Response();

	  	//on définit le contenu
	  	$response->setContent("Ceci est une page d'erreur 404");

	  	//on définit le code HTTP à "not found" (erreur 404)
	  	$response->setStatusCode(Response::HTTP_NOT_FOUND);

	  	//on retourne la réponse
	  	return $response;
	  }*/
		
	  //on utilise cette méthode
	/* public function viewAction($id)
	  {
	  	//on utilise le raccourci :  il crée un objet response
	  	//et lui donne comme contenu le contenu du template
	  	return $this->get('templating')->renderResponse(
	  		'TestfabriceBundle:Advert:view.html.twig', 
	  		array('id' =>$id)
	  		);

	  }*/

	  //en plus court
	 /*public function viewAction($id)
	  {
	  		return $this->render(
	  		'TestfabriceBundle:Advert:view.html.twig', 
	  		array('id' => $id)
	  		);

	  }*/

	 /* public function viewAction($id)
	  {
	  	$url = $this->get('router')->generate('testfabrice_home');
	  	return new RedirectResponse($url);
	  }*/

	  //sans utiliser le use de redirect response
	  /* public function viewAction($id)
	  {
	  	
	  	return $this->redirectToRoute('testfabrice_home');
	  }*/

	  // en changeant le content-type
	  /*public function viewAction($id)
	  {
	  	// créons nous-mêmes la réponse en JSON, grâce à la fonction json_encode()
	  	$response = new Response(json-encode(array('id' => $id)));

	  	//ici, nous définissons le content type pour dire au navigateur 
	  	// que l'on renvoie du JSON et non du HTML
	  	$response->headers->set('Content-Type','application/json');

	  	return $response;
	  }*/

	 /* public function viewAction($id)
	  {
	  	//ou en plus court
	  	return new JsonResponse(array('id'=>$id));
	  }*/

	 /* public function viewAction($id, Request $request)
	  {
	  	//Récupération de la session
	  	$session = $request->getSession();

	  	//on récupère le contenun de la variable user_id
	  	$userId = $session ->get('user_id');

	  	//on définit une nouvelle valeur pour cette variable user_id
	  	$session->set('user_id',91);

	  	//on n'oublie pas de renvoyer  une réponse
	  	return new Response("<body>Je suis une page de test,je n'ai rien à dire!</body>");
	  }*/

	 /*public function viewAction($id)
	  {
	  	return $this ->render('TestfabriceBundle:Advert:view.html.twig',array('id'=>$id));
	  }

	  //Ajoutez cette méthode:
	  public function addAction(Request $request)
	  {
	  	$session = $request->getSession();

	  	//bien sûr, cette méthode devra réellement ajouter l'annonce
	  	//mais faisons comme si c'était le cas
	  	$session->getFlashBag()->add('info','Annonce bien enregistrée');
		
		//le flashbag est ce qui contient les messages flash dans la session
		//il peut bien sûr contenir plusieurs messages :
		$session ->getFlashBag()->add('info', 'oui, elle est bien enregistrée!');

		//puis on redirige vers la page de visualisation de cette annonce
		return $this->redirectToRoute('testfabrice_view', array('id'=>5));

	  }*/

	 //Construction du contrôleur de mon bundle
	 public function indexAction($page)
	 {
	 	//on ne sait pas combien de pages il y a 
	 	//mais on sait qu'une page doit être supérieure ou égale à 1
	 	if($page<1){
	 		//on déclenche une exception NotFoundHttpException, cela  va afficher 
	 		//une page d'erreur 404 
	 		throw new NotFoundHttpException('Page"'.$page.'"inexistante');

	 	}
	   
	    // Notre liste d'annonce en dur
	    $listAdverts = array(
	      array(
	        'title'   => 'Recherche développpeur Symfony2',
	        'id'      => 1,
	        'author'  => 'Abbbb',
	        'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
	        'date'    => new \Datetime()),
	      array(
	        'title'   => 'Mission de webmaster',
	        'id'      => 2,
	        'author'  => 'Hugo',
	        'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
	        'date'    => new \Datetime()),
	      array(
	        'title'   => 'Offre de stage webdesigner',
	        'id'      => 3,
	        'author'  => 'Mathieu',
	        'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
	        'date'    => new \Datetime())
	    );

	    // Et modifiez le 2nd argument pour injecter notre liste
	    return $this->render('TestfabriceBundle:Advert:index.html.twig', array(
	      'listAdverts' => $listAdverts
	    ));
	 } 

	 public function viewAction($id)
	 {
	 	/*// Ici, on récupérera l'annonce correspondante à l'id $id
		 	$advert = array(
	      'title'   => 'Recherche développpeur Symfony2',
	      'id'      => $id,
	      'author'  => 'Alexandre',
	      'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
	      'date'    => new \Datetime()
	    );


	    return $this->render('TestfabriceBundle:Advert:view.html.twig', array(
	      'advert' => $advert
	    ));
		*/
		//on récupère le repository
		$em = $this->getDoctrine()->getManager();

	    // On récupère l'annonce $id
	    $advert = $em
	      ->getRepository('TestfabriceBundle:Advert')
	      ->find($id)
	    ;

	    if (null === $advert) {
	      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
	    }

	    // On récupère la liste des candidatures de cette annonce
	    $listApplications = $em
	      ->getRepository('TestfabriceBundle:Application')
	      ->findBy(array('advert' => $advert))
	    ;
	     // On récupère maintenant la liste des AdvertSkill
    	$listAdvertSkills = $em
      	->getRepository('TestfabriceBundle:AdvertSkill')
      	->findBy(array('advert' => $advert))
    	;


	    return $this->render('TestfabriceBundle:Advert:view.html.twig', array(
	      'advert'           => $advert,
	      'listApplications' => $listApplications
	    ));

	 }

	 public function addAction(Request $request)
	 {
	 	 //On récupère le service
	   /*$antispam = $this->container->get('TestfabriceBundle.antispam');
	    //je pars du principe que $text contient le texte d'un message quelconque
	    $text = '...';
	    if ($antispam->isSpam($text)){
	    	throw new \Exception('Votre message a été détecté comme spam!');
	       	}*/
	      /*
		// Depuis un contrôleur

		$em = $this->getDoctrine()->getManager();

		// On crée une nouvelle annonce
		$advert1 = new Advert;
		$advert1->setTitle('Recherche développeur.');
		$advert1->setContent("Pour mission courte");
		$advert1->setAuthor('Minnie');
		// Et on le persiste
		$em->persist($advert1);

		// On récupère l'annonce d'id 5. On n'a pas encore vu cette méthode find(),
		// mais elle est simple à comprendre. Pas de panique, on la voit en détail
		// dans un prochain chapitre dédié aux repositories
		$advert2 = $em->getRepository('TestfabriceBundle:Advert')->find(8);

		// On modifie cette annonce, en changeant la date à la date d'aujourd'hui
		$advert2->setDate(new \Datetime());

		// Ici, pas besoin de faire un persist() sur $advert2. En effet, comme on a
		// récupéré cette annonce via Doctrine, il sait déjà qu'il doit gérer cette
		// entité. Rappelez-vous, un persist ne sert qu'à donner la responsabilité
		// de l'objet à Doctrine.

		// Enfin, on applique les deux changements à la base de données :
		// Un INSERT INTO pour ajouter $advert1
		// Et un UPDATE pour mettre à jour la date de $advert2
		$em->flush();*/
		// On récupère l'EntityManager
	    $em = $this->getDoctrine()->getManager();

	    // Création de l'entité Advert
	    $advert = new Advert();
	    $advert->setTitle('Recherche développeur Symfony2.');
	    $advert->setAuthor('Alexandre');
	    $advert->setContent("Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…");

	    // On récupère toutes les compétences possibles
	    $listSkills = $em->getRepository('TestfabriceBundle:Skill')->findAll();

	    // Pour chaque compétence
	    foreach ($listSkills as $skill) {
	      // On crée une nouvelle « relation entre 1 annonce et 1 compétence »
	      $advertSkill = new AdvertSkill();

	      // On la lie à l'annonce, qui est ici toujours la même
	      $advertSkill->setAdvert($advert);
	      // On la lie à la compétence, qui change ici dans la boucle foreach
	      $advertSkill->setSkill($skill);

	      // Arbitrairement, on dit que chaque compétence est requise au niveau 'Expert'
	      $advertSkill->setLevel('Expert');

	      // Et bien sûr, on persiste cette entité de relation, propriétaire des deux autres relations
	      $em->persist($advertSkill);
	    }

	    // Doctrine ne connait pas encore l'entité $advert. Si vous n'avez pas définit la relation AdvertSkill
	    // avec un cascade persist (ce qui est le cas si vous avez utilisé mon code), alors on doit persister $advert
	    $em->persist($advert);

		/////////////
		// Création des entités
		$advert = new Advert;
		$application = new Application;

		// On lie la candidature à l'annonce
		$advert->addApplication($application);
		// On lie l'annonce à la candidature
		$application->setAdvert($advert);

    	 // Création de l'entité Advert
	    $advert = new Advert();
	    $advert->setTitle('Recherche développeur Angularjs.');
	    $advert->setAuthor('bbb');
	    $advert->setContent("Nous recherchons un développeur angular js. Blabla…");

	    // Création de l'entité Image
	    $image = new Image();
	    $image->setUrl('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
	    $image->setAlt('Job de rêve');

	    // On lie l'image à l'annonce
	    $advert->setImage($image);
	        // Création d'une première candidature
	    $application1 = new Application();
	    $application1->setAuthor('Marine');
	    $application1->setContent("J'ai toutes les qualités requises.");

	    // Création d'une deuxième candidature par exemple
	    $application2 = new Application();
	    $application2->setAuthor('Pierre');
	    $application2->setContent("Je suis très motivé.");

	    // On lie les candidatures à l'annonce
	    $application1->setAdvert($advert);
	    $application2->setAdvert($advert);

	    // On récupère l'EntityManager
	    $em = $this->getDoctrine()->getManager();

	    // Étape 1 : On « persiste » l'entité
	    $em->persist($advert);

	    // Étape 1 bis : si on n'avait pas défini le cascade={"persist"},
	    // on devrait persister à la main l'entité $image
	     $em->persist($image);
	      // définie dans l'entité Application et non Advert. On doit donc tout persister à la main ici.
	    $em->persist($application1);
	    $em->persist($application2);
	    // Étape 2 : On déclenche l'enregistrement
	    $em->flush();

    	//reste de la méthode qu'on avait déjà écrit pour le formulaire
    	if($request->isMethod('POST'))
    	{
    		$request->getSession()->getFlashBag()->add('notice','Annonce bien enregistrée.');
    		return $this->redirect($this->generateUrl('testfabrice_view',array('id' => $advert->getId())));
    	}
    return $this->render('TestfabriceBundle:Advert:add.html.twig');
    
  	}
  	
  	//dans un controleur celui que vous voulez
  	
	public function editImageAction($advertId)
	{
	  $em = $this->getDoctrine()->getManager();

	  // On récupère l'annonce
	  $advert = $em->getRepository('TestfabriceBundle:Advert')->find($advertId);

	  // On modifie l'URL de l'image par exemple
	  $advert->getImage()->setUrl('test.png');

	  // On n'a pas besoin de persister l'annonce ni l'image.
	  // Rappelez-vous, ces entités sont automatiquement persistées car
	  // on les a récupérées depuis Doctrine lui-même
	  
	  // On déclenche la modification
	  $em->flush();

	  return new Response('OK');
	}

  public function editAction($id, Request $request)
  {
    // Ici, on récupérera l'annonce correspondante à $id

    // Même mécanisme que pour l'ajout
    /*if ($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Ansnonce bien modifiée.');

      return $this->redirectToRoute('testfabrice_view', array('id' => 5));
    }*/
	/*$advert = array(
      'title'   => 'Recherche développpeur Symfony2',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
      'date'    => new \Datetime()
    );
    return $this->render('TestfabriceBundle:Advert:edit.html.twig',array(
      'advert' => $advert
    ));*/
	
		
	$em = $this ->getDoctrine()->getMAnager();

	// Ici, on récupérera l'annonce correspondant à $id
	$advert = $em ->getRepository('TestfabriceBundle:Advert')->find($id);

	if (null === $advert){
		throw new NotFoundHttpException("L'annonce d'id ".$id. "n'existe pas.");
	}

    // La méthode findAll retourne toutes les catégories de la base de données
    $listCategories = $em->getRepository('TestfabriceBundle:Category')->findAll();

    // On boucle sur les catégories pour les lier à l'annonce
    foreach ($listCategories as $category) 
    {
      $advert->addCategory($category);
  	}

	$form = $this->createForm(new AdvertEditType(), $advert);

	if ($form->handleRequest($request)->isValid()){
		//Inutile de persister ici, Doctrine connait déjà notre annonce
		$em->flush();

		$request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
      return $this->redirect($this->generateUrl('testfabrice_view', array('id' => $advert->getId())));
    }
    return $this->render('TestfabriceBundle:Advert:edit.html.twig', array(
      'form'   => $form->createView(),
      'advert' => $advert // Je passe également l'annonce à la vue si jamais elle veut l'afficher
    ));
	}
  

	 public function deleteAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    // On récupère l'annonce $id
    $advert = $em->getRepository('TestfabriceBundle:Advert')->find($id);
    if (null === $advert) {
      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
    }
    // On boucle sur les catégories de l'annonce pour les supprimer
    foreach ($advert->getCategories() as $category) {
      $advert->removeCategory($category);
    }
    $em->flush();
    // On crée un formulaire vide, qui ne contiendra que le champ CSRF
    // Cela permet de protéger la suppression d'annonce contre cette faille
    $form = $this->createFormBuilder()->getForm();
    if ($form->handleRequest($request)->isValid()) {
      $em->remove($advert);
      $em->flush();
      $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");
      return $this->redirect($this->generateUrl('testfabrice_home'));
    }
    // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
    return $this->render('TestfabriceBundle:Advert:delete.html.twig', array(
      'advert' => $advert,
      'form'   => $form->createView()
    ));
  }

	public function menuAction()
	{
		//on fixe en dur une liste ici, bien entendu par la suite
		//on la récupèrera depuis la BDD
		$listAdverts = array(
			array('id' => 1, 'title' =>'Recherche développeur Symfony 2'),
			array('id' => 2, 'title' =>'Mission webmaster'),
			array('id' => 3, 'title' =>'Offre de stage webdesigner'),);

		return $this->render('TestfabriceBundle:Advert:menu.html.twig',array(
			//tout l'intérêt est ici : le contrôleur passe
			//les variables nécessaires au template!
			'listAdverts' => $listAdverts
			));
	}

}
