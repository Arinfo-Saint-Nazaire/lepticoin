<?php

namespace App\Form;

use App\Entity\Notice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NoticeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleNotice', TextType::class,['label' => 'Titre'])
            ->add('priceNotice', TextType::class,['label' => 'Prix'])
            ->add('descriptionNotice', TextType::class,['label' => 'Description'])
            ->add('locationNotice', TextType::class,['label' => 'Localisation'])
            ->add('photoOneNotice', TextType::class,['label' => 'Photo 1'])
            ->add('photoTwoNotice', TextType::class,['label' => 'Photo 2'])
            ->add('photoThreeNotice', TextType::class,['label' => 'Photo 3'])
            // ->add('dateNotice')
            ->add('categoryProfessionnalNotice', TextType::class,['label' => 'Catégorie professionnelle'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Notice::class,
        ]);
    }
}
