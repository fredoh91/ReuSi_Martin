<?php

namespace App\Form;

use App\Entity\Main\Mesure;
use App\Entity\Main\PassageCTP;
use App\Entity\Main\PassageRSS;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('dateReuSig',DateType::class, ['required' => false])
        ->add('niveauRisque',TextType::class, ['required' => false])
        ->add('infoAvis',TextType::class, ['required' => false])
        ->add('passageCTP', EntityType::class, [
            'class' => PassageCTP::class,
            'choice_label' => 'Libelle',
        ])
        ->add('passageRSS', EntityType::class, [
            'class' => PassageRSS::class,
            'choice_label' => 'Libelle',
        ])
        ->add('mesures', CollectionType::class, [
            'entry_type' => MesureType::class,
            'allow_add' => true,
            'by_reference' => false
        ])
        ->add('submit', SubmitType::class, ['label' => 'Enregistrer']);
    }


    public function getBlockPrefix()
    {
        return 'Releve_form';
    }
}