<?php
declare(strict_types=1);

namespace App\Containers\Link\UI\API\Requests;

use App\Ship\Parents\Requests\ApiRequest;

final class FindByUidRequest extends ApiRequest
{

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var array
     */
    protected $urlParameters = [
        'uid',
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'uid' => ['required', 'exists:links,uid'],
        ];
    }
}

