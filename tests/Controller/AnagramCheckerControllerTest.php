<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Unit test for AnagramCheckerController.
 */
class AnagramCheckerControllerTest extends TestCase
{
    /**
     * Test for accessing the Anagram Checker page.
     */
    public function testAnagramCheckerPage()
    {
        // Create a Symfony HTTP client
        $client = HttpClient::create();

        // Make a request to the Anagram Checker page
        $response = $client->request('GET', 'http://localhost:8000/anagram');

        // Get the HTTP status code from the response
        $status = $response->getStatusCode();

        // Assert that the response status code is 200
        $this->assertEquals(
            200,
            $status,
            "AnagramCheckerControllerTest error: The status code is {$status}. 
            Make sure you have entered the correct URL and the server is running."
        );
    }
}
