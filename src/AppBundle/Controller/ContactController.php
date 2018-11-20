<?php

namespace AppBundle\Controller;


use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContactController extends Controller
{
    /**
     * @Route("/Contact")
     */
    public function ContactAction(Request $request)
    {
        $title="Contact";

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() &&  $form->isValid() /*&& $this->captchaverify($request->get('g-recaptcha-response'))*/) {
           // var_dump($contact);
            //var_dump($form->getData('adresseMail'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $url=$this->generateUrl('homepage',array(), UrlGeneratorInterface::ABSOLUTE_URL);
            
            $messageFeddback = (new \Swift_Message('Confirmation de contact'))
            ->setFrom($this->getParameter('mailer_user'))
            ->setTo($contact->getAdresseMail())
            ->setBody('Nous avons bien reçu votre message : 
            '.$contact->getMessage().'
            Votre message sera traité dans les plus brefs délais. ');
            $this->get('mailer')->send($messageFeddback);

            $messageligue = (new \Swift_Message('alert nouveau contact'))
            ->setFrom($this->getParameter('mailer_user'))
            ->setTo(['your email@gmail.com'])//cd10@ligue-cancer.net
            ->setBody('Vous avez un nouveau message en attente sur le site provenant de '.$contact->getNom().' '.$contact->getPrenom().' '.$url.' 
            Sujet: '.$contact->getSujet().'
            Message'.$contact->getMessage());
            $this->get('mailer')->send($messageligue);
            

            $this->addFlash("success", "Votre Message a été enregistrer, une confirmation vous a été envoyé");
            return $this->redirectToRoute('homepage');
        }
        # check if captcha response isn't get throw a message
        if($form->isSubmitted() &&  $form->isValid()/*&& !$this->captchaverify($request->get('g-recaptcha-response'))*/){
                 
            $this->addFlash('danger', 'La vérification par reCAPTCHA est requise');             
        }
        
        return $this->render('@App/Contact/contact.html.twig', array(
            'title' => $title,
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }
    # get success response from recaptcha and return it to controller
    function captchaverify($recaptcha){
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            "secret"=>"6Lf_rVYUAAAAACWYYiBGTEgUAYU5PQ6JDaIIOXO0","response"=>$recaptcha));
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);     
    
    return $data->success;        
    }

}
