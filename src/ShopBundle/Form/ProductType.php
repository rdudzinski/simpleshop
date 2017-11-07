<?php

namespace ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Enter name'
                )
            ))
            ->add('description', null, array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Enter description'
                )
            ))
            ->add('price', null, array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Enter price'
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ShopBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'shopbundle_product';
    }
}
