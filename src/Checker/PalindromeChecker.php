<?php 
// Define a namespace for the PalindromeChecker class within the App\Checker namespace.
namespace App\Checker;

// Import the PalindromeCheckerInterface to implement its methods.
use App\Interface\PalindromeCheckerInterface;

// Declare the PalindromeChecker class that implements the PalindromeCheckerInterface
class PalindromeChecker implements PalindromeCheckerInterface{
    /**
     * Check if a given word is a palindrome.
     *
     * @param string $word The word to be checked for palindrome.
     *
     * @return bool True if the word is a palindrome, false otherwise.
     */
    public function isPalindrome($word): bool
    {   
        // Convert the input word to lowercase for case-insensitive comparison.
        $word = strtolower($word);

        // Reverse the order of characters in the word.
        $reversed = strrev($word);
        
        // Check if the original word is the same as its reversed version
        return $word === $reversed;
    }
}