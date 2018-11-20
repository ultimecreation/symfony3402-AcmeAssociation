<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Articles;
use AppBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DefaultController extends Controller
{
    /**
     * @Route("/{page}", requirements={"page" = "\d+"}, defaults={"page" = 1}, name="homepage")
     */
    public function indexAction(Request $request,$page=1)
    {
        
        $title="À la une";
      
        $listeArticles=$this->getDoctrine()->getRepository(Category::class)->findOneByName('une')->getArticles();
        
        $articles  = $this->get('knp_paginator')->paginate(
        $listeArticles,$page/* numéro page à afficher*/,
          1/*nbre d'éléments par page*/);
        
        return $this->render('default/index.html.twig', array(
            'articles' => $articles,
            'title'=> $title,
            ));
    }
    /**
     * @Route("/article/detail/{id}", name="detail-article")
     */
    public function articleDetailAction(Request $request,$id)
    {
        $title="détail de l'article";
        $article=$this->getDoctrine()->getRepository(Articles::class)->find($id);
        $comments=$this->getDoctrine()->getRepository(Comment::class)->findBy(array('article' => $id,'approuved'=>1),array('createdAt' => 'desc'));
        
        $comment = new Comment();
        $form = $this->createFormBuilder($comment)
                ->add('commentBody',TextareaType::class, array('required' => true))
                ->getForm();
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            
            $comment->setApprouved(0);
            $comment->setCreatedAt(new \DateTime('now'));
            $comment->setUser($this->getUser());
            $comment->setArticle($article);
            $comment->setUpdatedAt(null);
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            $this->addFlash('success',"Votre commentaire a été enregistrer");
            return $this->redirectToRoute('detail-article',array('id'=>$id));
        }
        
        return $this->render('default/articleDetail.html.twig', array(
            'article' => $article,
            'title'=> $title,
            'comments'=>$comments,
            'form'=>$form->createView()
            ));
    }
    /**
     * @Route("/mentions",name="mentions légales")
     */
    public function mentionsAction(Request $request)
    {
        $data['title']="Mentions légales";
        return $this->render('default/mentionslegale.html.twig',$data);
    }
    /**
     * @Route("/plan-du-site",name="plan du site")
     */
    public function plandusiteAction(Request $request)
    {
        $data['title']="Plan du site";
        return $this->render('default/plandusite.html.twig',$data);
    }
    /**
     * @Route("/renvoie-confirmation-email",name="renvoie-confirmation-email")
     */
    public function resendConfirmationEmailAction(Request $request)
    {
        
        $title="Renvoie d'email de confirmation";

        $task=array();
        $form = $this->createFormBuilder($task)
        ->add('email', EmailType::class)
        ->add('envoyer',SubmitType::class , array(
            'attr'=> array('class'=>'btn btn-primary form-control')))
        ->getForm();
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
           // var_dump($contact);
            //var_dump($form->getData('adresseMail'));
            $email=$form->getData('email');
            
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('email'=>$email));
            if(!$user)
            {
                $this->addFlash("danger", "cet email n'est pas reconnu");
            }   
            else
            {
                if($user && $user->getConfirmationToken()=== null)
                {
                    $this->addFlash('info','votre compte est déjà activé');
                }
                if ($user && $user->getConfirmationToken() != null)
                {
                    $url=$this->generateUrl('fos_user_registration_confirm',array('token' => $user->getConfirmationToken()), UrlGeneratorInterface::ABSOLUTE_URL);

                    $messageFeddback = (new \Swift_Message('Renvoie d\'activation'))
                    ->setFrom($this->getParameter('mailer_user'))
                    ->setTo($user->getEmail())
                    ->setBody('Cliquez sur ce lien ou copiez et collez le dans la barre d\'adresse de votre navigateur pour activer votre compte : '.$url);

                    $this->get('mailer')->send($messageFeddback);
                    

                    $this->addFlash("success", "Un lien d'activation vous a été envoyé");
                }
            }    
            return $this->redirectToRoute('homepage');
        }
        return $this->render('default/renvoieconfirmationemail.html.twig', array(
            'title' => $title,
            'form' => $form->createView(),
        ));
    }
}
