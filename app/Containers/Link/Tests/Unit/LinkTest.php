<?php

namespace App\Containers\Link\Tests\Unit;

use App\Containers\Link\Actions\MakeLinkModelAndEnqueue;
use App\Containers\Link\Jobs\SaveLink;
use App\Containers\Link\Models\Link;
use App\Containers\Link\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Queue;

/**
 * Class LinkTest.
 *
 * @group Link
 * @group unit
 */
class LinkTest extends TestCase
{
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

        Queue::fake();

        $this->data = [
            'url' => 'http://google.com',
        ];
    }

    /**
     * @return void
     */
    public function testMakeLinkModel(): void
    {
        $transporter = new DataTransporter($this->data);
        $action = App::make(MakeLinkModelAndEnqueue::class);
        $link = $action->run($transporter);

        $this->assertInstanceOf(Link::class, $link);

        $this->assertEquals($link->url, $this->data['url']);
        $this->assertArrayHasKey('uid', $link);
    }

    /**
     * @return void
     */
    public function testPushSaveLinkJob(): void
    {
        $transporter = new DataTransporter($this->data);
        $action = App::make(MakeLinkModelAndEnqueue::class);
        $action->run($transporter);

        Queue::assertPushed(
            SaveLink::class, function ($job) use ($transporter) {
                return $job->link->url === $transporter->url;
            }
        );
    }
}
