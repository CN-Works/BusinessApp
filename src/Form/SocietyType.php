<?php

namespace App\Form;

use App\Entity\Society;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SocietyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('creationdate', DateType::class, [
                "widget" => "single_text",
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('adress', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('postalcode', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('city', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('submit', SubmitType::class,[
                "attr" => [
                    "class" => "btn btn-primary"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Society::class,
        ]);
    }
}
