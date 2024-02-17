<?php
// Define a namespace for the AnagramChecker class within the App\Checker namespace.
namespace App\Checker;

// Import the AnagramCheckerInterface to implement its methods.
use App\Interface\AnagramCheckerInterface;

// Declare the AnagramChecker class that implements the AnagramCheckerInterface.
class AnagramChecker implements AnagramCheckerInterface
{
    /**
     * Check if two words are anagrams.
     *
     * @param string $word       The first word to compare.
     * @param string $comparison The second word to compare.
     *
     * @return bool True if the words are anagrams, false otherwise.
     */
    public function isAnagram($word, $comparison): bool
    {
        // Remove spaces and convert both input strings to lowercase.
        $word = str_replace(' ', '', strtolower($word));
        $comparison = str_replace(' ', '', strtolower($comparison));

        // Convert the input strings into arrays of characters.
        $wordSorted = str_split($word);
        sort($wordSorted);

        $comparisonSorted = str_split($comparison);
        sort($comparisonSorted);

        // Check if the sorted arrays of characters are identical.
        return $wordSorted === $comparisonSorted;
    }

}