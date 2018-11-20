<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ArticlesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
        ->add('description')
        ->add('image')
        ->add('other')
        ->add('video')
        ->add('updatedAt')
        ->add('category', EntityType::class,array('class'=>Category::class))
        ->add('userId', EntityType::class, array(
            'class' => \AppBundle\Entity\User::class,
            'choice_label' => 'username',
            'choice_value' => $this->getUser()->getId())
            );
        // ->add('une')->add('blog')->add('bilan')
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Articles',
            'empty_data' => function (FormInterface $form) {
                return new Articles($form->get('userId')->getData($this->getUser()->getId()));
            },
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_articles';
    }


}
