<?php

namespace App\Form;

use App\Entity\Main\CoPiloteDS;
use App\Entity\Main\DMM;
use App\Entity\Main\PiloteDS;
use App\Entity\Main\PoleDS;
use App\Entity\Main\SourceSignal;
use App\Entity\Main\StatutEmetteur;
use App\Entity\Main\StatutSignal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SignalDescType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('id',HiddenType::class, ['required' => false])
        ->add('dateCreation',DateType::class, ['required' => false, 'format' => 'dd-MM-yyyy', 'disabled' => true])
        ->add('description',TextType::class, ['required' => false])
        ->add('indication',TextType::class, ['required' => false])
        ->add('contexte',TextType::class, ['required' => false])
        ->add('niveauRisqueInitial',TextType::class, ['required' => false])
        ->add('niveauRisqueFinal',HiddenType::class, ['required' => false])
        ->add('anaRisqueComment',TextType::class, ['required' => false])
        ->add('proposReducRisque',HiddenType::class, ['required' => false])
        ->add('refSignal',TextType::class, ['required' => false])
        ->add('identifiantSource',TextType::class, ['required' => false, 'label' => 'Identifiant source du signal(id cas marquant...)'])
        ->add('sourceSignal', EntityType::class, [
            'class' => SourceSignal::class,
            'choice_label' => 'Libelle',
        ])
        ->add('poleDS', EntityType::class, [
            'class' => PoleDS::class,
            'choice_label' => 'Libelle',
        ])
        ->add('dmm', EntityType::class, [
            'class' => DMM::class,
            'choice_label' => 'Libelle',
        ])
        ->add('statutSignal', EntityType::class, [
            'class' => StatutSignal::class,
            'choice_label' => 'Libelle',
        ])
        ->add('statutEmetteur', EntityType::class, [
            'class' => StatutEmetteur::class,
            'choice_label' => 'Libelle',
        ])
        ->add('submit', SubmitType::class, ['label' => 'Enregistrer']);
    }

    public function getBlockPrefix()
    {
        return 'Signal_desc_form';
    }
}