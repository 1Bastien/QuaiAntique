<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', null, [
                'label' => 'Prénom', 'constraints' => [
                    new NotBlank([
                        'message' => "Merci d'entrer votre prénom.",
                    ])
                ]
            ])
            ->add('lastName', null, [
                'label' => 'Nom de famille', 'constraints' => [
                    new NotBlank([
                        'message' => "Merci d'entrer votre nom.",
                    ])
                ]
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Mail', 'constraints' => [
                    new NotBlank([
                        'message' => "Merci d'entrer votre mail.",
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
