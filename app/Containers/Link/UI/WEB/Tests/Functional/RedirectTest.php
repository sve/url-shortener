<?php

namespace App\Containers\Link\UI\WEB\Tests\Functional;

use App\Containers\Link\Models\Link;
use App\Containers\Link\Tests\ApiTestCase;

/**
 * Class RedirectTest.
 *
 * @group Link
 * @group api
 */
class RedirectTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $endpoint = 'get@/{uid}';

    /**
     * @var array
     */
    private $data;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->data = [
            'url' => 'http://nasa.gov',
        ];
    }

    /**
     * @return void
     */
    public function testCreateLink(): void
    {
        $link = factory(Link::class)->create($this->data);

        // send the HTTP request
        $response = $this->injectId($link->uid, true, '{uid}')->makeCall();

        // assert response status is correct
        $response->assertStatus(301);

        // assert headers contain location
        $this->assertArrayHasKey('location', $response->headers->all(), 'Location header must be present in response.');

        // assert urls equals
        $this->assertEquals($this->data['url'], $response->headers->get('location'), 'Destination and stored urls are not equals.');
    }

}
