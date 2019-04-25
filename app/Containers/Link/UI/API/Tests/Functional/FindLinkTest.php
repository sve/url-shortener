<?php

namespace App\Containers\Link\UI\API\Tests\Functional;

use App\Containers\Link\Models\Link;
use App\Containers\Link\UI\API\Transformers\LinkTransformer;
use App\Containers\User\Tests\ApiTestCase;

/**
 * Class FindLinkTest.
 *
 * @group link
 * @group api
 */
class FindLinkTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $endpoint = 'get@v1/links/{id}';

    public function testFindLink(): void
    {
        $link = factory(Link::class)->create();

        // send the HTTP request
        $response = $this->injectId($link->id, true)->makeCall();

        // assert response status is correct
        $response->assertStatus(200);

        $transformer = new LinkTransformer();
        $this->assertResponseContainKeyValue($transformer->transform($link));
    }

}
