<?php

namespace App\Form;

use Doctrine\DBAL\Types\DateType as TypesDateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MesureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('description',TextType::class, ['required' => false])
        ->add('datePrev',DateType::class, ['required' => false])
        ->add('dateRealisation',DateType::class, ['required' => false]);
    }


    public function getBlockPrefix()
    {
        return 'Mesure_form';
    }
}