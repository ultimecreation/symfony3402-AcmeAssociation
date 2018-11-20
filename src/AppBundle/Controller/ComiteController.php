<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ComiteController extends Controller
{
    /**
     * @Route("/Historique")
     */
    public function HistoriqueAction()
    {
        $data['title']="Historique";

         return $this->render('@App/Comite/historique.html.twig',$data);
    }

    /**
     * @Route("/Equipe")
     */
    public function EquipeAction()
    {
        $data['title']="Équipe";
        $em = $this->getDoctrine()->getManager();

        $data['presidences'] = $em->getRepository('AppBundle:Presidence')->findAll();
        $data['bureaux'] = $em->getRepository('AppBundle:Bureau')->findAll();
        $data['administrateurs']= $em->getRepository('AppBundle:Administrateur')->findAll();

        return $this->render('@App/Comite/equipe.html.twig',$data);
    }

    /**
     * @Route("/NousRencontrer")
     */
    public function NousRencontrerAction()
    {
        $data['title']="Nous Rencontrer";
        return $this->render('@App/Comite/nous_rencontrer.html.twig',$data);
    }

}
