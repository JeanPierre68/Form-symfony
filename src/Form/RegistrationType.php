<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',
                TextType::class, 
                $this->getConfiguration("Prénom", "Saisir le prénom ...")
            )
            ->add('lastName',
                TextType::class,
                $this->getConfiguration("Nom", "Saisir le nom de famille ...")
            )
            ->add('email',
                EmailType::class, 
                $this->getConfiguration("Email", "Saisir votre adresse email ...")
            )
            ->add('picture', 
                UrlType::class, 
                $this->getConfiguration("Photo de profil", "URL de votre avatar ...")
            )
            ->add('hash', 
                PasswordType::class, 
                $this->getConfiguration("Mot de passe", "Saisir un mot de passe ...")
            )
            ->add('passwordConfirm',
                PasswordType::class,
                $this->getConfiguration("Confirmation de mot de passe", "Veuillez confirmer votre mot de passe ...")
            )
            ->add('introduction', 
                TextType::class, 
                $this->getConfiguration("Introduction", "Présentez vous en qulques mots ...")
            )
            ->add('description', 
                TextareaType::class, 
                $this->getConfiguration("Description détaillée", "C'est le moment de vous présenter en détaille ...")
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
