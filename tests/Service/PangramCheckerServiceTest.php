<?php

namespace App\Tests\Service;

use App\Checker\PangramChecker;
use App\Service\PangramCheckerService;
use PHPUnit\Framework\TestCase;

// Unit tests for the PangramCheckerService.
class PangramCheckerServiceTest extends TestCase
{
    /**
     * @var PangramChecker $pangramChecker Pangram checker instance for testing.
     */
    private PangramChecker $pangramChecker;

    /**
     * @var PangramCheckerService $pangramCheckerService PangramCheckerService instance for testing.
     */
    private PangramCheckerService $pangramCheckerService;

    // Set up before each test by creating instances of PangramChecker and PangramCheckerService.
    protected function setUp(): void
    {
        $this->pangramChecker = new PangramChecker();
        $this->pangramCheckerService = new PangramCheckerService($this->pangramChecker);
    }

    // Test the isPangram method with positive and negative cases using PangramChecker.
    public function testIsPangram(): void
    {
        $this->assertTrue(
            $this->pangramChecker->isPangram('The quick brown fox jumps over the lazy dog'),
            'Expected "The quick brown fox jumps over the lazy dog" to be a pangram using PangramChecker.'
        );
        $this->assertFalse(
            $this->pangramChecker->isPangram('Hello, World!'),
            'Expected "Hello, World!" not to be a pangram using PangramChecker.'
        );
    }

    // Test the checkPangram method using PangramCheckerService with positive and negative cases.
    public function testCheckPangram(): void
    {
        $this->assertTrue(
            $this->pangramCheckerService->checkPangram('The quick brown fox jumps over the lazy dog'),
            'Expected "The quick brown fox jumps over the lazy dog" to be a pangram using PangramCheckerService.'
        );
        $this->assertFalse(
            $this->pangramCheckerService->checkPangram('Hello, World!'),
            'Expected "Hello, World!" not to be a pangram using PangramCheckerService.'
        );
    }
}
