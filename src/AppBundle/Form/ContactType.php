<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('civilite',ChoiceType::class,array('choices'=>array(
                                                            'Mr'=>'Mr',
                                                            'Mme'=>'Mme',
                                                            'Mlle'=>'Mlle'
        ),
        'expanded'=>true,
        'attr'=>array( 
                        'class'=>'d-flex justify-content-around')
        ))
        ->add('prenom')
        ->add('nom')
        ->add('telephone')
        ->add('adresseMail')
        ->add('sujet')
        ->add('message')
        ->add('Envoyer mon message',SubmitType::class,array(
                                            'attr'=>array( 
                                                        'class'=>'btn btn-primary form-control')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
