<?php

namespace App\Service;

use App\Interface\PalindromeCheckerInterface;

// Service class for checking palindromes.
class PalindromeCheckerService
{
    /**
     * @var PalindromeCheckerInterface $palindromeChecker Palindrome checker instance.
     */
    private $palindromeChecker;

    /**
     * PalindromeCheckerService constructor.
     *
     * @param PalindromeCheckerInterface $palindromeChecker Palindrome checker implementation.
     */
    public function __construct(PalindromeCheckerInterface $palindromeChecker)
    {
        $this->palindromeChecker = $palindromeChecker;
    }

    /**
     * Checks if a word is a palindrome using the injected 
     * PalindromeCheckerInterface implementation.
     *
     * @param string $word The word to check for palindrome.
     *
     * @return bool True if the word is a palindrome, false otherwise.
     */
    public function checkPalindrome($word): bool
    {
        return $this->palindromeChecker->isPalindrome($word);
    }
}
