<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Missions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;



    class MissionsController extends Controller
{
    /**
     * @Route("/Missions",name="app_missions_missions")
     */
    public function MissionsAction()
    {
        $title="Missions";
        $em = $this->getDoctrine()->getManager();

        $missions = $em->getRepository('AppBundle:Missions')->findAll();

        return $this->render('@App/Missions/missions.html.twig', array(
            'title'=> $title,
            'missions' => $missions,
        ));
    }

    
}
