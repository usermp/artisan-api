<?php

namespace Usermp\ArtisanApi\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'  => 'Error',
            'message' => 'The given data is invalid.',
            'data'    => $validator->errors()
        ], 422));
    }
}
