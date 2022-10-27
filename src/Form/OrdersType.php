<?php

namespace App\Form;

use App\Entity\Orders;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('coeffficient')
            ->add('reduction')
            ->add('deliveryAdress')
            ->add('deliveryZipcode')
            ->add('deliveryCity')
            ->add('deliveryCountry')
            ->add('billingAdress')
            ->add('billingZipcode')
            ->add('billingCity')
            ->add('billingCountry')
            ->add('methode')
            ->add('date')
            ->add('deleteDate')
            ->add('facturationNumber')
            ->add('buyer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
