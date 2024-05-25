<?php

namespace Usermp\ArtisanApi\app\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Usermp\ArtisanApi\app\Http\Requests\BaseRequest;

class ArtisanRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "command"    => "required|string"
        ];
    }
}