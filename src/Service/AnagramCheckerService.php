<?php
namespace App\Service;

use App\Interface\AnagramCheckerInterface;

// Service class for checking anagrams.
class AnagramCheckerService
{
    /**
     * @var AnagramCheckerInterface $anagramChecker Anagram checker instance.
     */
    private $anagramChecker;

    /**
     * AnagramCheckerService constructor.
     *
     * @param AnagramCheckerInterface $anagramChecker Anagram checker implementation.
     */
    public function __construct(AnagramCheckerInterface $anagramChecker)
    {
        $this->anagramChecker = $anagramChecker;
    }

    /**
     * Checks if two words are anagrams using the injected AnagramCheckerInterface implementation.
     *
     * @param string $word       The first word for comparison.
     * @param string $comparison The second word for comparison.
     *
     * @return bool True if the words are anagrams, false otherwise.
     */
    public function checkAnagram($word, $comparison): bool
    {
        return $this->anagramChecker->isAnagram($word, $comparison);
    }
}