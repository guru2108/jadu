<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Checker\PalindromeChecker;
use App\Interface\PalindromeCheckerInterface;
use App\Service\PalindromeCheckerService;

// Unit tests for the PalindromeCheckerService.
class PalindromeCheckerServiceTest extends TestCase
{
    /**
     * @var PalindromeChecker $palindromeChecker Palindrome checker instance for direct testing.
     */
    private $palindromeChecker;

    /**
     * @var PalindromeCheckerService $palindromeCheckerService PalindromeCheckerService instance for testing.
     */
    private $palindromeCheckerService;

    // Set up before each test by creating instances of PalindromeChecker and PalindromeCheckerService.
    protected function setUp(): void
    {
        $this->palindromeChecker = new PalindromeChecker();
        $this->palindromeCheckerService = new PalindromeCheckerService($this->palindromeChecker);
    }

    // Test the isPalindrome method with positive and negative cases using PalindromeChecker.
    public function testIsPalindrome(): void
    {
        $this->assertTrue(
            $this->palindromeChecker->isPalindrome('madam'),
            'Expected "madam" to be a palindrome using PalindromeChecker.'
        );
        $this->assertFalse(
            $this->palindromeChecker->isPalindrome('hello'),
            'Expected "hello" not to be a palindrome using PalindromeChecker.'
        );
    }

    // Test the checkPalindrome method using PalindromeCheckerService with positive and negative cases.
    public function testCheckPalindrome(): void
    {
        $this->assertTrue(
            $this->palindromeCheckerService->checkPalindrome('madam'),
            'Expected "madam" to be a palindrome using PalindromeCheckerService.'
        );
        $this->assertFalse(
            $this->palindromeCheckerService->checkPalindrome('hello'),
            'Expected "hello" not to be a palindrome using PalindromeCheckerService.'
        );
    }
}
