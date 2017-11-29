<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('NGBundle:Trajet')
        ;
        $trajets = $repository->findAll();
        $trajetsojd = $repository->findBy(array('dateDepart' => \DateTime::createFromFormat('d-m-Y', date('d-m-Y'))));

        return $this->render('index.html.twig', array('trajets' => $trajets, 'trajetsojd' => $trajetsojd));
    }
}
