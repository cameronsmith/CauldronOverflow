<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
{
    /**
     * @Route("/")
     */
    public function homepage(): Response
    {
        return new Response('What a great controller we have created!');
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function show(string $slug): Response
    {
        return new Response(sprintf(
            'Future page to show question "%s"',
            ucwords(str_replace('-', ' ', $slug))
        ));
    }
}