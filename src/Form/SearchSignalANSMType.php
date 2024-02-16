<?php

namespace App\Form;

use App\Entity\DMM;
use App\Entity\PoleDS;
use App\Entity\PiloteDS;
use App\Entity\CoPiloteDS;
use App\Entity\SourceSignal;
use App\Entity\StatutSignal;
use App\Entity\StatutEmetteur;
use App\Entity\SearchSignalANSM;
use App\Entity\NiveauRisqueFinal;
// use App\Entity\SignalANSM;
use Doctrine\ORM\EntityRepository;
use App\Entity\NiveauRisqueInitial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SearchSignalANSMType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', IntegerType::class, [
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('debutDateCreation', DateType::class, [
                'widget' => 'single_text',
                'label' => 'début date de création : ',
                'format' => 'yyyy-MM-dd',
                // 'input' => 'string',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
                // 'empty_data' => $debutStatusDate
                ])
            ->add('finDateCreation', DateType::class, [
                'widget' => 'single_text',
                'label' => 'fin date de création : ',
                'format' => 'yyyy-MM-dd',
                // 'input' => 'string',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
                // 'empty_data' => $debutStatusDate
                ])
            ->add('Description', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('DenoDCI', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('Indication', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('Contexte', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('ProposReducRisque', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('RefSignal', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('IdentifiantSource', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('NiveauRisqueInitial', EntityType::class, [
                'class' => NiveauRisqueInitial::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->where('n.Actif = 1')
                        ->orderBy('n.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('NiveauRisqueFinal', EntityType::class, [
                'class' => NiveauRisqueFinal::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->where('n.Actif = 1')
                        ->orderBy('n.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('AnaRisqueComment')
            ->add('SourceSignal', EntityType::class, [
                'class' => SourceSignal::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->where('s.Actif = 1')
                        ->orderBy('s.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('PoleDS', EntityType::class, [
                'class' => PoleDS::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.Actif = 1')
                        ->orderBy('p.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('DMM', EntityType::class, [
                'class' => DMM::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->where('d.Actif = 1')
                        ->orderBy('d.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('PiloteDS', EntityType::class, [
                'class' => PiloteDS::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.Actif = 1')
                        ->orderBy('p.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('CoPiloteDS', EntityType::class, [
                'class' => CoPiloteDS::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->where('c.Actif = 1')
                        ->orderBy('c.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('StatutSignal', EntityType::class, [
                'class' => StatutSignal::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->where('s.Actif = 1')
                        ->orderBy('s.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add('StatutEmetteur', EntityType::class, [
                'class' => StatutEmetteur::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('se')
                        ->where('se.Actif = 1')
                        ->orderBy('se.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'required' => false,
                'attr' => ['class' => 'chpRq'],
            ])
            ->add(
                'Recherche',
                SubmitType::class,
                [
                    // 'attr' => ['class' => 'btn btn-primary m-2'],
                    'attr' => ['class' => 'btn-envoi m-2'],
                    'label' => 'Rechercher',
                    'row_attr' => ['id' => 'recherche'],
                ]
            )
            ->add(
                'Reset',
                // ResetType::class,
                SubmitType::class,
                [
                    // 'attr' => ['class' => 'btn btn-primary m-2'],
                    'attr' => ['class' => 'btn-envoi m-2'],
                    'label' => 'Reset',
                    'row_attr' => ['id' => 'reset'],
                ]
            )
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchSignalANSM::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
    // public function configureOptions(OptionsResolver $resolver): void
    // {
    //     $resolver->setDefaults([
    //         'data_class' => SignalANSM::class,
    //     ]);
    // }
}
