<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Checker\AnagramChecker;
use App\Service\AnagramCheckerService;

// Unit tests for the AnagramCheckerService.
class AnagramCheckerServiceTest extends TestCase
{
    /**
     * @var AnagramChecker $anagramChecker Anagram checker instance for testing.
     */
    private AnagramChecker $anagramChecker;

    /**
     * @var AnagramCheckerService $anagramCheckerService AnagramCheckerService instance for testing.
     */
    private AnagramCheckerService $anagramCheckerService;


    // Creating instances of AnagramChecker and AnagramCheckerService.
    protected function setUp(): void
    {
        $this->anagramChecker = new AnagramChecker();
        $this->anagramCheckerService = new AnagramCheckerService($this->anagramChecker);
    }


    // Test the isAnagram method with positive and negative cases.
    public function testIsAnagram(): void
    {
        $this->assertTrue(
            $this->anagramChecker->isAnagram('listen', 'silent'),
            'Expected "listen" and "silent" to be anagrams.'
        );
        $this->assertFalse(
            $this->anagramChecker->isAnagram('hello', 'world'),
            'Expected "hello" and "world" not to be anagrams.'
        );
    }

    /**
     * Test the checkAnagram method using AnagramCheckerService with positive and negative cases.
     */
    public function testCheckAnagram(): void
    {
        $this->assertTrue(
            $this->anagramCheckerService->checkAnagram('listen', 'silent'),
            'Expected "listen" and "silent" to be anagrams using AnagramCheckerService.'
        );
        $this->assertFalse(
            $this->anagramCheckerService->checkAnagram('hello', 'world'),
            'Expected "hello" and "world" not to be anagrams using AnagramCheckerService.'
        );
    }
}
