<?php

namespace App\Form;


// use App\Entity\SearchCodex;
use App\Entity\Codex\SearchCodex;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchCodexType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // $currentDate = new DateTime();
        // $debutStatusDate = $currentDate->sub(new DateInterval('P1M'));
        $builder
            ->add('denomination', TextType::class, [
                'required' => false,
                // 'attr' => ['class' => 'chpRq'],
            ])
            ->add('dci', TextType::class, [
                'required' => false,
                // 'attr' => ['class' => 'chpRq'],
            ])
            ->add(
                'recherche',
                SubmitType::class,
                [
                    'attr' => ['class' => 'btn btn-primary m-2'],
                    'label' => 'Rechercher',
                    'row_attr' => ['id' => 'recherche'],
                ]
            )
            ->add(
                'reset',
                // ResetType::class,
                SubmitType::class,
                [
                    'attr' => ['class' => 'btn btn-primary m-2'],
                    'label' => 'Reset',
                    'row_attr' => ['id' => 'reset'],
                ]
            );
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchCodex::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}
