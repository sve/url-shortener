<?php

namespace App\Ship\Parents\Requests;

use Apiato\Core\Abstracts\Requests\Request as AbstractRequest;
use App\Ship\Transporters\DataTransporter;

/**
 * Class Request
 *
 * @author Mahmoud Zalt  <mahmoud@zalt.me>
 */
abstract class Request extends AbstractRequest
{

    /**
     * If no custom Transporter is set on the child this will be default.
     *
     * @var string
     */
    protected $transporter = DataTransporter::class;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();
}
