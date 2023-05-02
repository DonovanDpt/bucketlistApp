<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Wish;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'attr' => [
                    "class" => "formAjout"
                ]
            ])
            ->add('author', null, [
                'attr' => [
                    "class" => "formAjout"
                ]
            ])
            ->add('description', null, [
                'attr' => [
                    "class" => "formAjout"
                ]
            ])

            ->add('Category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name'
                ])
            ->add('Ajouter', SubmitType::class,
                ['label' => 'Ajouter une nouvelle idée']
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wish::class,
        ]);
    }
}
