<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Presidence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Presidence controller.
 *
 * @Route("presidence")
 */
class PresidenceController extends Controller
{
    /**
     * Lists all presidence entities.
     *
     * @Route("/", name="presidence_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presidences = $em->getRepository('AppBundle:Presidence')->findAll();

        return $this->render('presidence/index.html.twig', array(
            'presidences' => $presidences,
        ));
    }

    /**
     * Creates a new presidence entity.
     *
     * @Route("/new", name="presidence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $presidence = new Presidence();
        $form = $this->createForm('AppBundle\Form\PresidenceType', $presidence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($presidence);
            $em->flush();

            return $this->redirectToRoute('presidence_show', array('id' => $presidence->getId()));
        }

        return $this->render('presidence/new.html.twig', array(
            'presidence' => $presidence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a presidence entity.
     *
     * @Route("/{id}", name="presidence_show")
     * @Method("GET")
     */
    public function showAction(Presidence $presidence)
    {
        $deleteForm = $this->createDeleteForm($presidence);

        return $this->render('presidence/show.html.twig', array(
            'presidence' => $presidence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing presidence entity.
     *
     * @Route("/{id}/edit", name="presidence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Presidence $presidence)
    {
        $deleteForm = $this->createDeleteForm($presidence);
        $editForm = $this->createForm('AppBundle\Form\PresidenceType', $presidence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('presidence_edit', array('id' => $presidence->getId()));
        }

        return $this->render('presidence/edit.html.twig', array(
            'presidence' => $presidence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a presidence entity.
     *
     * @Route("/{id}", name="presidence_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Presidence $presidence)
    {
        $form = $this->createDeleteForm($presidence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($presidence);
            $em->flush();
        }

        return $this->redirectToRoute('presidence_index');
    }

    /**
     * Creates a form to delete a presidence entity.
     *
     * @param Presidence $presidence The presidence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Presidence $presidence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presidence_delete', array('id' => $presidence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
