<?php

namespace App\Form;

use App\Entity\Reponse;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReponseQuizzType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('response', EntityType::class,[
                'class' => Reponse::class,
                'query_builder' => function (EntityRepository $er) use($options) {
                    return $er->createQueryBuilder('r')
                    ->where('r.question = :question')
                    ->setParameter("question", $options["question_id"]);
                },
                'choice_label' => 'reponse',
                'multiple' => false,
                'expanded' => true,                
            ])
            ->add('Suivant', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "question_id" => null
        ]);
    }
}
