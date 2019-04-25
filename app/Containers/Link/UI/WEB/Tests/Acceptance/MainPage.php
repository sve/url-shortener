<?php

namespace App\Containers\Link\UI\WEB\Tests\Acceptance;

use App\Ship\Parents\Tests\PhpUnit\TestCase;

/**
 * Class MainPage.
 *
 * @group welcome
 * @group web
 */
class MainPage extends TestCase
{
    /**
     * @var string
     */
    private $page = '/';

    /**
     * @return void
     */
    public function testDisplayMainPage(): void
    {
        $this->visit($this->page)
            ->see('shortener');
    }
}
