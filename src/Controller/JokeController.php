<?php

namespace src\Controller;

use src\Form\JokeCategoryType;
use src\Model\JokeCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class JokeController
 * @Route("/joke", name="joke_")
 */
class JokeController extends AbstractController
{
    /**
     * @Route("/", name="form")
     */
    public function index(Request $request)
    {
        $model = new JokeCategory();
        $form = $this->createForm(JokeCategoryType::class, $model);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $model = $form->getData();
            return $this->redirectToRoute('task_success');
        }

        return $this->render('joke/form.html.twig',
            [
                'form' => $form
            ]);
    }
}
