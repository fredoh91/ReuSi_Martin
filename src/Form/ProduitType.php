<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\SignalANSM;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Denomination')
            ->add('DCI')
            ->add('Dosage')
            ->add('Voie')
            ->add('PrescriptionDelivrance')
            ->add('TypeProcedure')
            ->add('CodeCIS')
            ->add('CodeVU', HiddenType::class)
            ->add('CodeDossier')
            ->add('NomVU', HiddenType::class)
            // ->add('Codex')
            ->add('Laboratoire')
            ->add('idLaboratoire', HiddenType::class)
            ->add('Adresse')
            ->add('AdresseComplExpl')
            ->add('CodePostExpl')
            ->add('NomVilleExpl')
            ->add('Tel')
            ->add('Fax')
            // ->add('Complement')
            ->add('Titulaire')
            ->add('idTitulaire', HiddenType::class)
            ->add('AdresseContact')
            ->add('AdresseCompl')
            ->add('CodePost')
            ->add('NomVille')
            ->add('TelContact')
            ->add('FaxContact')
            ->add('CodeATC')
            ->add('LibATC')
            // ->add('DP')
//             ->add('ProduitSignal', EntityType::class, [
//                 'class' => SignalANSM::class,
// 'choice_label' => 'id',
//             ])
            ->add('submit', SubmitType::class, [
                // 'attr' => ['class' => 'btn btn-primary m-2'],
                'attr' => ['class' => 'btn-envoi m-2'],
                'label' => 'Enregistrer']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
