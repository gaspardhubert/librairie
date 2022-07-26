<?php

namespace App\Form;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('prenom', TextType::class, [
        'label' => 'Votre prénom :',
        'constraints' => new Length([
            'min' => 2,
            'max' => 30
        ]),
            'attr' => [
                'placeholder' => 'Merci de saisir votre prénom !'
            ]
        ])
        ->add('nom', TextType::class, [
            'label' => 'Votre nom :',
            'constraints' => new Length([
            'min' => 2,
            'max' => 30
        ]),
            'attr' => [
                'placeholder' => 'Merci de saisir votre nom !'
            ]
        ])
        ->add('email', EmailType::class, [
            'label' => 'Votre email :',
            'constraints' => new Length([
            'min' => 2,
            'max' => 30
        ]),
            'attr' => [
                'placeholder' => 'Merci de saisir votre adresse email !'
            ]
        ])
        
        
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'Le mot de passe et la confirmation doivent être identiques.',
            'required' => true,
            'mapped' => false,
            'first_options' => ['label' => 'Mot de passe',
            'attr' => [
                'placeholder' => 'Merci de saisir votre mot de passe !'
            ]
            ],
            'second_options' => ['label' => 'Confrimez votre mot de passe.',
            'attr' => [
                'placeholder' => 'Merci de confirmer votre mot de passe !'
            ]
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label' => "S'inscrire"
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}