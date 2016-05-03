<?php

namespace Potogan\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvents;
use symfony\Component\Form\FormEvent;
use Potogan\TestBundle\Form\AvatarType;

class ConferenceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',       'text')
            ->add('prenom',    'text')
            ->add('email',     'text')
            ->add('mobile',    'text')
            ->add('pseudonyme','text')
            ->add('twitter',   'text')
            ->add('facebook',  'text')
            ->add('avatar',        new AvatarType(), array('required' => false))
            ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Potogan\TestBundle\Entity\Conference'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'potogan_testbundle_conference';
    }
}