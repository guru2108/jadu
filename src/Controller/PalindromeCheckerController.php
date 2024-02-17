<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\PalindromeCheckerService;
use App\Form\PalindromeFormType;

/**
 * Controller for handling palindrome checking functionality.
 */
class PalindromeCheckerController extends AbstractController
{
    /**
     * @var PalindromeCheckerService $palindromeCheckerService Service for checking palindromes.
     */
    private $palindromeCheckerService;

    /**
     * PalindromeCheckerController constructor.
     *
     * @param PalindromeCheckerService $palindromeCheckerService Palindrome checking service.
     */
    public function __construct(PalindromeCheckerService $palindromeCheckerService)
    {
        $this->palindromeCheckerService = $palindromeCheckerService;
    }

    /**
     * Handles the index route for palindrome checking.
     *
     * @param Request $request Symfony request object.
     *
     * @return Response The Symfony response object.
     *
     * @Route(path="/", name="palindrome_checker")
     */
    #[Route(path: "/", name: "palindrome_checker")]
    public function index(Request $request): Response
    {

        // Create a form for palindrome checking
        $form = $this->createForm(PalindromeFormType::class);
        $form->handleRequest($request);

        // Handle form submission
        if ($form->isSubmitted() && $form->isValid()) {
            // Retrieve the input value from the form
            $inputFieldValue = $form->get('EnterAStringToCheck')->getData();

            // Check if the input is a palindrome using the service            
            $result = $this->palindromeCheckerService->checkPalindrome($inputFieldValue);

            // Render the view with the form, result message, and input value
            return $this->render(
                'palindrome_checker/index.html.twig',
                [
                    'form' => $form->createView(),
                    "message" => $result,
                    "input" => $inputFieldValue
                ]
            );
        }

        // Render the view with the form if no submission or form data is invalid
        return $this->render('palindrome_checker/index.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}