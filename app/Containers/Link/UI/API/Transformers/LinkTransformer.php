<?php

namespace App\Containers\Link\UI\API\Transformers;

use App\Containers\Link\Models\Link as LinkModel;
use App\Ship\Parents\Transformers\Transformer;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\URL;

/**
 * Class LinkTransformer.
 */
class LinkTransformer extends Transformer
{
    /**
     * @var array
     */
    protected $availableIncludes = [
    ];

    /**
     * @var array
     */
    protected $defaultIncludes = [
    ];

    /**
     * @param LinkModel $link
     *
     * @return array
     */
    public function transform(LinkModel $link): array
    {
        URL::forceRootUrl(env('APP_URL'));
        $response = [
            'object' => 'Link',
            'uid'    => $link->uid,
            'url'    => $link->url,
            'link'   => route('redirect', ['uid' => $link->uid])
        ];

        if ($link->created_at instanceof DateTime) {
            $response['created_at'] = $link->created_at->format(\DateTime::ATOM);
        }

        if ($link->updated_at instanceof DateTime) {
            $response['updated_at'] = $link->created_at->format(\DateTime::ATOM);
        }

        if ($link->id) {
            $response['id'] = $link->id;
        }

        return $response;
    }
}
