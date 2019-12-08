<?php

namespace App\Form;
use App\Repository\JokeRepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class JokeCategoryType
 */
class JokeCategoryType extends AbstractType
{
    /**
     * @var JokeRepositoryInterface
     */
    protected $jokeRepository;

    /**
     * JokeCategoryType constructor.
     *
     * @param JokeRepositoryInterface $jokeRepository
     */
    public function __construct(JokeRepositoryInterface $jokeRepository)
    {
        $this->jokeRepository = $jokeRepository;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
            ])
            ->add('category', ChoiceType::class, [
                'choices'  => $this->jokeRepository->getCategories(),
                'required' => true,
            ])
            ->add('send', SubmitType::class);
    }
}
