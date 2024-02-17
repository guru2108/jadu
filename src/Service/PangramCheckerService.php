<?php

namespace App\Service;

use App\Interface\PangramCheckerInterface;

// Service class for checking Pangrams.
class PangramCheckerService
{
    /**
     * @var PangramCheckerInterface $pangramChecker Pangram checker instance.
     */
    private $pangramChecker;

    /**
     * PangramCheckerService constructor.
     *
     * @param PangramCheckerInterface $pangramChecker Pangram checker implementation.
     */
    public function __construct(PangramCheckerInterface $pangramChecker)
    {
        $this->pangramChecker = $pangramChecker;
    }

    /**
     * Checks if a phrase is a Pangram using the injected 
     * PangramCheckerInterface implementation.
     *
     * @param string $phrase The phrase to check for being a Pangram.
     *
     * @return bool True if the phrase is a Pangram, false otherwise.
     */
    public function checkPangram($phrase): bool
    {
        return $this->pangramChecker->isPangram($phrase);
    }
}
