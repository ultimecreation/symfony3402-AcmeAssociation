<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class JemengageController extends Controller
{
    /**
     * @Route("/Dons")
     */
    public function DonsAction()
    {
        $data['title']="Dons";
        return $this->render('@App/Jemengage/dons.html.twig',$data );
    }

    /**
     * @Route("/Partenaires")
     */
    public function PartenairesAction()
    {
        $data['title']="Partenaires";
        return $this->render('@App/Jemengage/partenaires.html.twig', $data);
    }

    /**
     * @Route("/Benevoles")
     */
    public function BenevolesAction()
    {
        $data['title']="Bénévoles";
        return $this->render('@App/Jemengage/benevoles.html.twig', $data);
    }


}
