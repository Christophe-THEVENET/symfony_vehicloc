<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('monthly_price', MoneyType::class, [
                'label' => 'Prix mensuel €',
                'currency' => 'EUR',
                'currency' => false, // Ajoutez ceci pour masquer le symbole €
            ])
            ->add('daily_price', MoneyType::class, [
                'label' => 'Prix journalier €',
                'currency' => 'EUR',
            'currency' => false, // Ajoutez ceci pour masquer le symbole €
        ])
            ->add('number_of_places', ChoiceType::class, [
            'label' => 'Nombre de places',
            'choices' => array_combine(range(2, 9), range(2, 9)),
            'placeholder' => 'Sélectionnez',
            ])
            ->add('manual_gearbox', ChoiceType::class, [
            'label' => 'Type de boîte de vitesses',
            'choices' => [
                'Manuelle' => 1,
                'Automatique' => 0,
            ],
            'expanded' => false, // select dropdown
            'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
