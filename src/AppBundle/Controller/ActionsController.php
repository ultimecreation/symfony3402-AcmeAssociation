<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Actions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class ActionsController extends Controller
{
    /**
     * @Route("/Actions",name="app_actions_actions")
     */
    public function ActionsAction()
    {
        $title="Actions";
        $em = $this->getDoctrine()->getManager();

        $actions = $em->getRepository('AppBundle:Actions')->findAll();

        return $this->render('@App/Actions/actions.html.twig', array(
            'title'=> $title,
            'actions' => $actions,
        ));
    }

    
}

