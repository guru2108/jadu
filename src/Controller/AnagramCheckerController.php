<?php

namespace App\Controller;

use App\Form\AnagramFormType;
use App\Service\AnagramCheckerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


/**
 * Class AnagramCheckerController
 *
 * This controller handles the Anagram Checker functionality.
 */
class AnagramCheckerController extends AbstractController
{
    /**
     * @var AnagramCheckerService $anagramCheckerService
     */
    private $anagramCheckerService;

    /**
     * AnagramCheckerController constructor.
     *
     * @param AnagramCheckerService $anagramCheckerService An instance of AnagramCheckerService.
     */
    public function __construct(AnagramCheckerService $anagramCheckerService)
    {
        $this->anagramCheckerService = $anagramCheckerService;
    }

    /**
     * Display the Anagram Checker form and handle form submission.
     *
     * @param Request $request The incoming request object.
     *
     * @return Response The response to be rendered.
     * 
     * @Route(path="/anagram", name="anagram_checker")
     */
    #[Route('/anagram', name: 'anagram_checker')]
    public function index(Request $request): Response
    {
        // Create an instance of the AnagramFormType.
        $form = $this->createForm(AnagramFormType::class);

        // Handle form submission and validation.
        $form->handleRequest($request);

        // Check if form is submitted and valid.
        if ($form->isSubmitted() && $form->isValid()) {

            // Retrieve word and comparison values from the form.
            $word = $form->get('Word')->getData();
            $comparison = $form->get('Comparison')->getData();

            // Use AnagramCheckerService to check if the words are anagrams.
            $result = $this->anagramCheckerService->checkAnagram($word, $comparison);

            // Render the result along with the form.
            return $this->render(
                'anagram_checker/index.html.twig',
                [
                    'form' => $form->createView(),
                    "message" => $result,
                    "word" => $word,
                    "comparison" => $comparison
                ]
            );
        }

        // Render the form for initial display.
        return $this->render('anagram_checker/index.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
