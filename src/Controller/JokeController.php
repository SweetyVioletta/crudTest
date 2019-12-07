<?php
namespace App\Controller;

use App\Form\JokeCategoryType;
use App\Message\Joke\JokeEmailMessage;
use App\Message\Joke\JokeFileMessage;
use App\Model\JokeCategory;
use App\Repository\JokeRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class JokeController
 * @Route("/joke", name="joke_")
 */
class JokeController extends AbstractController
{
    /**
     * @Route("/", name="form")
     */
    public function index(Request $request, MessageBusInterface $messageBus, JokeRepositoryInterface $jokeRepository)
    {
        $model = new JokeCategory();
        $form = $this->createForm(JokeCategoryType::class, $model);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $model = $form->getData();
            $joke = $jokeRepository->getJokeByCategory($model->getCategory());
            if (null === $joke) {
                $this->addFlash(
                    'warning',
                    'Joke is not found.'
                );
                return $this->render(
                    'joke/form.html.twig',
                    [
                        'form' => $form
                    ]
                );
            }
            $messageBus->dispatch(new JokeEmailMessage($joke, $model->getEmail()));
            $messageBus->dispatch(new JokeFileMessage($joke));
        }
        return $this->render(
            'joke/form.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
