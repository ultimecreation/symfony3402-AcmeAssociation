<?php

namespace AppBundle\Form;

use AppBundle\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\DateTimeType;

class CommentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('commentBody')
                ->add('approuved')
                ->add('createdAt',DateTimeType::class, array('data' => new \DateTime('now')))
                ->add('updatedAt',DateTimeType::class, array('data' => new \DateTime('now')))
                ->add('user')
                ->add('article', EntityType::class, array(
                                                    'class' => \AppBundle\Entity\Articles::class,
                                                    'choice_label' => 'titre',
                                                    'choice_value' => 'articleId')
                    );
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Comment',
            'createdAt'=> new \DateTime('now'),
            'updatedAt'=> new \DateTime('now')
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_comment';
    }


}
