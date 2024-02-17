<?php

// tests/Controller/PalindromeCheckerControllerTest.php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Unit test for PalindromeCheckerController.
 */
class PalindromeCheckerControllerTest extends TestCase
{
    /**
     * Test for accessing the Palindrome Checker page.
     */
    public function testPalindromeCheckerPage()
    {
        // Create a Symfony HTTP client
        $client = HttpClient::create();

        // Make a request to the Palindrome Checker page
        $response = $client->request('GET', 'http://localhost:8000/');

        // Get the HTTP status code from the response
        $status = $response->getStatusCode();

        // Assert that the response status code is 200
        $this->assertEquals(
            200,
            $status,
            "PalindromeCheckerControllerTest error: The status code is {$status}. 
            Make sure you have entered the correct URL and the server is running."
        );
    }
}
