<?php

namespace Zorbus\SymfonyBootstrapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BootstrapType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', null, array('label' => 'Project name'))
                ->add('description', null, array('label' => 'Project description'))
                ->add('author', null, array('label' => 'Author name'))
                ->add('email', null, array('label' => 'Author e-mail'))
                ->add('symfony', 'choice', array(
                    'label' => 'Symfony version',
                    'choices' => array('2.1.*-dev' => '2.1.*-dev', '2.1.2' => '2.1.2')
                ))
                ->add('bundles', 'entity', array(
                    'multiple' => true,
                    'expanded' => true,
                    'class' => 'Zorbus\SymfonyBootstrapBundle\Entity\Bundle',
                    'query_builder' => function($em){
                        return $em->getQueryBuilder();
                    },
                    'property' => 'html'
                ))
                ->add('repositories', 'entity', array(
                    'multiple' => true,
                    'expanded' => true,
                    'class' => 'Zorbus\SymfonyBootstrapBundle\Entity\Repository',
                    'query_builder' => function($em){
                        return $em->getQueryBuilder();
                    }
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zorbus\SymfonyBootstrapBundle\Entity\Project'
        ));
    }

    public function getName()
    {
        return 'zorbus_symfonybootstrapbundle_projecttype';
    }

}
