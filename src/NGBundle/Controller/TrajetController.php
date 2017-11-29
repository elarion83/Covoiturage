<?php

namespace NGBundle\Controller;

use NGBundle\Entity\Trajet;
use NGBundle\Form\TrajetType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TrajetController extends Controller
{
	public function indexAction() {
		return $this->render('NGBundle:trajet:index.html.twig');
	}
	public function addAction(Request $request) {
		$trajet = new Trajet();
		$form = $this->get('form.factory')->create(TrajetType::class, $trajet);

	    if ($request->isMethod('POST')) {
			// On fait le lien Requête <-> Formulaire
			// À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
			$form->handleRequest($request);

			// On vérifie que les valeurs entrées sont correctes
			// (Nous verrons la validation des objets en détail dans le prochain chapitre)
			if ($form->isValid()) {
				// On enregistre notre objet $advert dans la base de données, par exemple
				$em = $this->getDoctrine()->getManager();
				$trajet->setCreated(\DateTime::createFromFormat('d-m-Y', date('d-m-Y')));
				// $trajet->setModified(\DateTime::createFromFormat('d-m-Y', date('d-m-Y')));
				$trajet->setUser($this->getUser());
				$em->persist($trajet);
				$em->flush();

				$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

				// On redirige vers la page de visualisation de l'annonce nouvellement créée
			}
			return $this->redirectToRoute('ng_trajetview', array('id' => $trajet->getId()));
	    }
		// On passe la méthode createView() du formulaire à la vue
		// afin qu'elle puisse afficher le formulaire toute seule
		return $this->render('NGBundle:trajet:add.html.twig', array(
		  'form' => $form->createView(),
		));
	}

	public function editAction($id, Request $request) {
		$reposTrajets = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository('NGBundle:Trajet')
		;
		$trajet = $reposTrajets->find($id);
		$form = $this->get('form.factory')->create(TrajetType::class, $trajet);

	    if ($request->isMethod('POST')) {
			$form->handleRequest($request);
	    	
			if ($form->isValid()) {
				// On enregistre notre objet $advert dans la base de données, par exemple
				$em = $this->getDoctrine()->getManager();
				// $trajet->setModified(\DateTime::createFromFormat('d-m-Y', date('d-m-Y')));
				$em->persist($trajet);
				$em->flush();
				$request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
				// On redirige vers la page de visualisation de l'annonce nouvellement créée
			}
			return $this->redirectToRoute('ng_trajetview', array('id' => $trajet->getId()));
	    }

		return $this->render('NGBundle:trajet:edit.html.twig', array(
		  'form' => $form->createView(),
		));
	}

	public function viewAction($id) {
		$trajet = $this->getDoctrine()->getManager()->find('NGBundle:Trajet', $id);
		if (null === $trajet) {
	      throw new NotFoundHttpException("Le trajet id ".$id." n'existe pas.");
	    }
		return $this->render('NGBundle:trajet:view.html.twig', array('trajet' => $trajet));
	}

	public function deleteAction($id, Request $request) {
		$em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('NGBundle:Trajet')->findOneBy(array('id' => $id));

        if ($entity != null){
            $em->remove($entity);
            $em->flush();
			$request->getSession()->getFlashBag()->add('notice', 'Annonce supprimée.');
		}
		return $this->redirectToRoute('ng_trajetsliste');
	}

	public function miensAction() {
		$reposTrajets = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository('NGBundle:Trajet')
		;
		$trajets = $reposTrajets->findBy(array('user' =>  $this->getUser()));
		return $this->render('NGBundle:trajet:liste.html.twig', array('trajets' => $trajets));
	}

	public function searchAction(Request $request) {
			$formulaire = $this->createFormBuilder()
            ->setAction($this->generateUrl('ng_trajetssearch'))
            ->add('search', SearchType::class, array('constraints' => new Length(array('min' => 3)), 'attr' => array('placeholder' => 'Une ville') ))
            ->add('send', SubmitType::class, array('label' => 'Envoyer'))
            ->getForm();
	    if ($request->isMethod('POST')) {
	    	$reposTrajets = $this
			  ->getDoctrine()
			  ->getManager()
			  ->getRepository('NGBundle:Trajet')
			;
			$formulaire->handleRequest($request);
		    // data is an array with "name", "email", and "message" keys
		    $data = $formulaire->getData();
			$trajets = $reposTrajets->findBy(array('villeDepart' =>  $data['search']));
	    	return $this->render('NGBundle:trajet:searchresult.html.twig', array('trajets' => $trajets, 'villeDepart' =>  $data['search']));
	    }
	    else {
			return $this->render('NGBundle:trajet:search.html.twig', array('formulaire' =>$formulaire->createView()));
		}
    }
}

