<?php

namespace App\Containers\Link\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class FindByIdRequest.
 */
class FindByIdRequest extends Request
{

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var array
     */
    protected $decode = [
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var array
     */
    protected $urlParameters = [
        'id',
    ];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:links,id'
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
