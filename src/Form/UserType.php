<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', emailType::class, ['label' => 'E-mail'])
            ->add(
                'roles',
                ChoiceType::class,
                [
                    'choices' => [
                        'Administrateur' => User::ROLE_ADMIN,
                        'Utilisateur' => User::ROLE_USER,
                    ],
                    'multiple' => true,
                    'expanded' => true,
                    'required' => true,
                ],
                TextType::class,
                ['label' => 'Rôle']
            )
            ->add('firstNameUser', TextType::class,['label' => 'Prénom'])
            ->add('lastNameUser', TextType::class,['label' => 'Nom'])
            ->add('photoUser', FileType::class, [
                'label' => 'Photo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '6000k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document valide',
                    ])
                ],
            ])
            ->add('birthdayDateUser', BirthdayType::class,['label' => 'Date d\'anniverssaire'])
            ->add('phoneUser', TelType::class,['label' => 'Téléphone'])
            ->add('adressUser', TextType::class,['label' => 'Adresse'])
            ->add('cityUser', TextType::class,['label' => 'Ville'])
            ->add('postalCodeUser', TextType::class,['label' => 'Code postal'])
            ->add('civilityUser', checkboxType::class,['label' => 'Civilité'])
            ->add('pseudoUser', TextType::class,['label' => 'Pseudo']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
