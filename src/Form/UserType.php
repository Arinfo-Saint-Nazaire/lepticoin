<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Administrateur' => User::ROLE_ADMIN,
                    'Utilisateur' => User::ROLE_USER,
                ],
                'multiple' => true,
                'expanded' => true,
                'required' => true,
            ])
            ->add('firstNameUser')
            ->add('lastNameUser')
            ->add('photoUser', FileType::class, [
                'label' => 'Photo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document valide t\'es nul ou quoi?',
                    ])
                ],
            ])
            ->add('birthdayDateUser')
            ->add('phoneUser')
            ->add('adressUser')
            ->add('cityUser')
            ->add('postalCodeUser')
            ->add('civilityUser')
            ->add('pseudoUser')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
