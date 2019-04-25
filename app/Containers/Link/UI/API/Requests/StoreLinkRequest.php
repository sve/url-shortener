<?php
declare(strict_types=1);

namespace App\Containers\Link\UI\API\Requests;

use App\Ship\Parents\Requests\ApiRequest;

final class StoreLinkRequest extends ApiRequest
{
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
            'url' => ['required', 'url'],
        ];
    }
}

