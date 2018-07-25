<?php

namespace App\Form;

use App\Entity\Product;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category')
            ->add('tags')
            ->add('translations', TranslationsType::class, [
                'locales' => ['en', 'fr', 'es', 'de'],
                'fields' => [
                    'description' => [
                        'field_type' => CKEditorType::class,
                    ]
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
