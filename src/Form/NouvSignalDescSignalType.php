<?php

namespace App\Form;

use App\Entity\DMM;
use App\Entity\Suivi;
use App\Entity\PoleDS;
use App\Entity\PiloteDS;
use App\Entity\CoPiloteDS;
use App\Entity\SignalANSM;
use App\Entity\SourceSignal;
use App\Entity\StatutSignal;
use App\Entity\StatutEmetteur;
use App\Entity\NiveauRisqueFinal;
use App\Form\NouvSignalSuiviType;
use Doctrine\ORM\EntityRepository;
use App\Entity\NiveauRisqueInitial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class NouvSignalDescSignalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', HiddenType::class, ['required' => false])
            ->add('dateCreation', DateType::class, [                
                // 'input' => 'string',
                'widget' => 'single_text',
                'required' => false, 
                // 'format' => 'dd-MM-yyyy', 
                'disabled' => false, 
                'label' => 'Date de création : '])
            ->add('description', TextareaType::class, ['required' => false, 'label' => 'Description du signal : '])
            ->add('indication', TextareaType::class, ['required' => false, 'label' => 'Indication : '])
            ->add('contexte', TextareaType::class, ['required' => false, 'label' => 'Contexte : '])
            // ->add('niveauRisqueInitial', TextType::class, ['required' => false, 'label' => 'Niveau de risque initial : '])
            ->add('niveauRisqueInitial', EntityType::class, [
                'class' => NiveauRisqueInitial::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                    ->where('d.Actif = 1')
                    ->orderBy('d.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'label' => 'Niveau risque initial :',
                'required' => false,
            ])
            // ->add('niveauRisqueFinal', HiddenType::class, ['required' => false, 'label' => 'Niveau de risque final : '])
            ->add('niveauRisqueFinal', EntityType::class, [
                'class' => NiveauRisqueFinal::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                    ->where('d.Actif = 1')
                    ->orderBy('d.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'label' => 'Niveau risque final :',
                'required' => false,
            ])
            ->add('anaRisqueComment', TextareaType::class, ['required' => false, 'label' => 'Commentaire de l\'analyse de risque du signal : '])
            ->add('proposReducRisque', HiddenType::class, ['required' => false, 'label' => 'Proposition de réduction de risque : '])
            ->add('refSignal', TextType::class, ['required' => false, 'label' => 'Référence du signal : '])
            ->add('identifiantSource', TextType::class, ['required' => false, 'label' => 'Identifiant source du signal (id cas marquant...) : '])
            ->add(  'sourceSignal', 
                    EntityType::class, 
                    [
                        'class' => SourceSignal::class,
                        'query_builder' => function (EntityRepository $er) {
                            return $er->createQueryBuilder('s')
                            ->where('s.Actif = 1')
                            ->orderBy('s.id', 'ASC');
                        },
                        'choice_label' => 'Libelle',
                        'label' => 'Source du signal :',
                        'required' => false,
                ])
            ->add('poleDS', EntityType::class, [
                'class' => PoleDS::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->where('p.Actif = 1')
                    ->orderBy('p.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'label' => 'Pôle DS :',
                'required' => false,
            ])
            ->add('dmm', EntityType::class, [
                'class' => DMM::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                    ->where('d.Actif = 1')
                    ->orderBy('d.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'label' => 'DMM/Pôle :',
                'required' => false,
            ])
            ->add('PiloteDS', EntityType::class, [
                'class' => StatutEmetteur::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->where('p.Actif = 1')
                    ->orderBy('p.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'label' => 'Pilote DS :',
                'required' => false,
            ])
            ->add('CoPiloteDS', EntityType::class, [
                'class' => StatutEmetteur::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                    ->where('c.Actif = 1')
                    ->orderBy('c.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'label' => 'Co-Pilote DS :',
                'required' => false,
            ])
            ->add('statutSignal', EntityType::class, [
                'class' => StatutSignal::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                    ->where('s.Actif = 1')
                    ->orderBy('s.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'label' => 'Statut du signal :',
                'required' => false,
            ])
            ->add('statutEmetteur', EntityType::class, [
                'class' => StatutEmetteur::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                    ->where('s.Actif = 1')
                    ->orderBy('s.id', 'ASC');
                },
                'choice_label' => 'Libelle',
                'label' => 'Statut de l\'émetteur : ',
                'required' => false,
            ])
            ->add('suivis', CollectionType::class, [
                'entry_type' => NouvSignalSuiviType::class,
                'entry_options' => ['label' => false],
                'by_reference'=> false,
                'allow_add'=> true,
                'allow_delete'=> true,
                // 'label'=> 'Suivi(s) :',
            // ->add('suivis', EntityType::class, [
            //     'label' => "Ajouter des suivis",
            //     'class' => Suivi::class,
            //     'multiple' => true
                // 'data_class' => Suivi::class, 
            ])
            ->add('AjoutProduit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary m-2'],
                'label' => 'Ajouter un produit']
            )
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary m-2'],
                'label' => 'Enregistrer']
            )
            // ->add('submit', SubmitType::class, ['label' => 'Enregistrer'])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SignalANSM::class,
        ]);
    }
    public function getBlockPrefix()
    {
        return 'Signal_desc_form';
    }
}
