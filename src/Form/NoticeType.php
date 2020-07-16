<?php

namespace App\Form;

use App\Entity\Notice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoticeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleNotice')
            ->add('priceNotice')
            ->add('descriptionNotice')
            ->add('locationNotice')
            ->add('photoOneNotice')
            ->add('photoTwoNotice')
            ->add('photoThreeNotice')
            // ->add('dateNotice')
            ->add('categoryProfessionnalNotice')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Notice::class,
        ]);
    }
}
