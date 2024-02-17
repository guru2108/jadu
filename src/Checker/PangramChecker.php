<?php 
// Define a namespace for the PangramChecker class within the App\Checker namespace.
namespace App\Checker;

// Import the PangramCheckerInterface to implement its methods.
use App\Interface\PangramCheckerInterface;

class PangramChecker implements PangramCheckerInterface{

    /**
     * Check if a given phrase is a pangram.
     *
     * @param string $phrase The phrase to check for pangram status.
     *
     * @return bool True if the phrase is a pangram, false otherwise.
     */
    public function isPangram($phrase): bool
    {   
        // Convert the entire phrase to lowercase for consistent comparison
        $phrase = strtolower($phrase);

        // Generate an array representing the English alphabet.
        $alphabet = range('a', 'z');
        
        // Iterate through each letter in the alphabet.
        foreach ($alphabet as $letter) {
            // Check if the current letter is present in the phrase.
            // If not found, the phrase is not a pangram.
            if (strpos($phrase, $letter) === false) {
                return false;
            }
        }
        // If all letters in the alphabet are found in the phrase, it is a pangram.
        return true;
    }
}