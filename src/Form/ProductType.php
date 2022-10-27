<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('shortLib')
            ->add('longLib')
            ->add('reference')
            ->add('price')
            ->add('picture')
            ->add('stock')
            ->add('stockMax')
            ->add('stockAlert')
            ->add('priceIncludedTaxes')
            ->add('supplier')
            ->add('subcategory')
            ->add('composedBy')
            ->add('prepared')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
