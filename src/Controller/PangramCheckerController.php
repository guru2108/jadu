<?php

namespace App\Controller;

use App\Form\PangramFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\PangramCheckerService;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controller for handling pangram checking functionality.
 */
class PangramCheckerController extends AbstractController
{
	/**
	 * @var PangramCheckerService $pangramCheckerService Service for checking pangrams.
	 */
	private $pangramCheckerService;

	/**
	 * PangramCheckerController constructor.
	 *
	 * @param PangramCheckerService $pangramCheckerService Pangram checking service.
	 */
	public function __construct(PangramCheckerService $pangramCheckerService)
	{
		$this->pangramCheckerService = $pangramCheckerService;
	}

	/**
	 * Handles the pangram checking route.
	 *
	 * @param Request $request Symfony request object.
	 *
	 * @return Response The Symfony response object.
	 *
	 * @Route('/pangram', name='pangram_checker')
	 */
	#[Route('/pangram', name: 'pangram_checker')]
	public function index(Request $request): Response
	{
		// Create a form for pangram checking
		$form = $this->createForm(PangramFormType::class);
		$form->handleRequest($request);

		// Handle form submission
		if ($form->isSubmitted() && $form->isValid()) {
			// Retrieve the phrase from the form
			$phrase = $form->get('Phrase')->getData();

			// Check if the phrase is a pangram using the service
			$result = $this->pangramCheckerService->checkPangram($phrase);

			// Render the view with the form and result message
			return $this->render(
				'pangram_checker/index.html.twig',
				[
					'form' => $form->createView(),
					"message" => $result
				]
			);
		}
		// Render the view with the form if no submission or invalid form data
		return $this->render(
			'pangram_checker/index.html.twig'
			,
			['form' => $form->createView()]
		);
	}
}
