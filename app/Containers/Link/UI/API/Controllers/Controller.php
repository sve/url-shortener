<?php

namespace App\Containers\Link\UI\API\Controllers;

use App\Containers\Link\Actions\FindLinkByUidAction;
use App\Containers\Link\Actions\FindLinkByIdAction;
use App\Containers\Link\Actions\MakeLinkModelAndEnqueue;
use App\Containers\Link\UI\API\Requests\FindByIdRequest;
use App\Containers\Link\UI\API\Requests\FindByUidRequest;
use App\Containers\Link\UI\API\Transformers\LinkTransformer;
use App\Ship\Parents\Controllers\ApiController;
use App\Containers\Link\UI\API\Requests\StoreLinkRequest;
use App\Ship\Transporters\DataTransporter;

/**
 * Class Controller.
 */
class Controller extends ApiController
{
    /**
     * @var LinkTransformer
     */
    protected $linkTransformer;

    public function __construct(LinkTransformer $linkTransformer)
    {
        $this->linkTransformer = $linkTransformer;
    }

    /**
     * @param  StoreLinkRequest $request
     * @return array
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function store(StoreLinkRequest $request): array
    {
        $link = $this->call(MakeLinkModelAndEnqueue::class, [new DataTransporter($request)]);

        return $this->transform($link, $this->linkTransformer);
    }

    /**
     * @param  \App\Containers\Link\UI\API\Requests\FindByIdRequest $request
     * @return array
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function show(FindByIdRequest $request): array
    {
        $link = $this->call(FindLinkByIdAction::class, [new DataTransporter($request)]);

        return $this->transform($link, $this->linkTransformer);
    }

    /**
     * @param  FindByUidRequest $request
     * @return array
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function findByUid(FindByUidRequest $request): array
    {
        $link = $this->call(FindLinkByUidAction::class, [new DataTransporter($request)]);

        return $this->transform($link, $this->linkTransformer);
    }

}
