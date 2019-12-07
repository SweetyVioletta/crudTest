<?php

namespace src\Form;
use src\Model\IcnDbApi;
use src\Model\JokeCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class JokeCategoryType
 * @package src\Form
 */
class JokeCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('category', ChoiceType::class, [
                'choices'  => [],
            ])
            ->add('send', SubmitType::class);
    }
}
