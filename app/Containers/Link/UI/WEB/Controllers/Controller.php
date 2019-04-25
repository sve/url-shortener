<?php

namespace App\Containers\Link\UI\WEB\Controllers;

use App\Containers\Link\Actions\FindLinkUrlByUidAction;
use App\Containers\Link\UI\WEB\Requests\RedirectRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Routing\ResponseFactory;

/**
 * Class Controller
 */
class Controller extends WebController
{
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @param ResponseFactory $responseFactory
     */
    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('link::index-page');
    }

    /**
     * @param  \App\Containers\Link\UI\WEB\Requests\RedirectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function redirect(RedirectRequest $request): RedirectResponse
    {
        $url = $this->call(FindLinkUrlByUidAction::class, [new DataTransporter($request)]);

        return $this->responseFactory->redirectTo($url, Response::HTTP_MOVED_PERMANENTLY)
            ->withHeaders(
                [
                'Referrer-Policy' => 'unsafe-url',
                ]
            );
    }
}
