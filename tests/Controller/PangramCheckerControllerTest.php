<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Unit test for PangramCheckerController.
 */
class PangramCheckerControllerTest extends TestCase
{
    /**
     * Test for accessing the Pangram Checker page.
     */
    public function testPanagramCheckerPage()
    {
        // Create a Symfony HTTP client
        $client = HttpClient::create();

        // Make a request to the Palindrome Checker page
        $response = $client->request('GET', 'http://localhost:8000/pangram');

        // Get the HTTP status code from the response
        $status = $response->getStatusCode();

        // Assert that the response is successful (HTTP status code 200)
        $this->assertEquals(
            200,
            $status,
            "PangramCheckerControllerTest error: The status code is {$status}.
            Make sure you have entered the correct URL and the server is running."
        );
    }
}
