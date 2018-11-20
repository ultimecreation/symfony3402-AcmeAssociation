<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ActualitesController extends Controller
{
    /**
     * @Route("/Evenements/{page}", requirements={"page" = "\d+"}, defaults={"page" = 1})
     */
    public function EvenementsAction(Request $request,$page=1)
    {
        $title="Évenements réçents";
        // replace this example code with whatever you need
        
        $listeBlogs=$this->getDoctrine()->getRepository('AppBundle:Category')->findOneByName('blog')->getArticles();
         
        $blogs  = $this->get('knp_paginator')->paginate($listeBlogs, $page/* numéro page à afficher*/,1/*nbre d'éléments par page*/);
        // var_dump($blogs);
        return $this->render('@App/Actualites/evenements.html.twig', array(
            'blogs' => $blogs,
            'title'=> $title));
    }

    /**
     * @Route("/Bilans/{page}", requirements={"page" = "\d+"}, defaults={"page" = 1})
     */
    public function BilansAction(Request $request,$page=1)
    {
        $title="Bilans";
        // replace this example code with whatever you need
        
        $listeBilans=$this->getDoctrine()->getRepository('AppBundle:Category')->findOneByName('bilan')->getArticles();
        $bilans  = $this->get('knp_paginator')->paginate($listeBilans,$page/* numéro page à afficher*/, 1/*nbre d'éléments par page*/);
         //var_dump($bilans);
        return $this->render('@App/Actualites/bilans.html.twig', array(
            'bilans' => $bilans,
            'title'=> $title));
        
    }

}
