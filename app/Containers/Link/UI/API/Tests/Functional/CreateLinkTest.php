<?php

namespace App\Containers\Link\UI\API\Tests\Functional;

use App\Containers\Link\Models\Link;
use App\Containers\Link\Tests\ApiTestCase;

/**
 * Class CreateLinkTest.
 *
 * @group Link
 * @group api
 */
class CreateLinkTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $endpoint = 'post@v1/links';

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
            'url' => 'http://google.com',
        ];
    }

    /**
     * @return void
     */
    public function testCreateLink(): void
    {
        // send the HTTP request
        $response = $this->makeCall($this->data);

        // assert response status is correct
        $response->assertStatus(200);

        // assert response contain url
        $this->assertResponseContainKeyValue(
            [
            'url' => $this->data['url'],
            ]
        );

        // assert response contain keys
        $this->assertResponseContainKeys(
            [
            'url',
            'uid',
            ]
        );

        $uid = $response->json('data.uid');

        // assert the data is stored in the database
        $this->assertDatabaseHas('links', ['uid' => $uid]);

        $link = Link::where(['uid' => $uid])->first();

        $this->assertEquals($this->data['url'], $link->url);
    }

}
