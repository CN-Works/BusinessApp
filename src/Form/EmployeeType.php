<?php

namespace App\Form;

use App\Entity\Society;
use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('lastname', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('dateofbirth', DateType::class, [
                "widget" => "single_text",
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('datehired', DateType::class, [
                "widget" => "single_text",
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('city', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('society', EntityType::class, [
                "class" => Society::class,
                "attr" => [
                    "class" => "form-select"
                ]
            ])
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
