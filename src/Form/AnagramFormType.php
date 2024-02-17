<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnagramFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Word',TextType::class,['attr'=>["class"=>"p-[5px] border-[2px]"
            ,"placeholder"=>"Word"]])
            ->add('Comparison',TextType::class,['attr'=>["class"=>"p-[5px] border-[2px] mt-[10px]",
            "placeholder"=>"Comparison"]])
            ->add("Submit", SubmitType::class,["label"=> "Check",'attr'=>[
                'class'=>"bg-blue-500 p-[3px] text-center rounded-md shadow-md flex justify-center items-center"]]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
