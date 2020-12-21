<?php
namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest
{
    /**
     * Override Response
     *
     * @param Validator $validator
     * @return Response
     */
    protected function failedValidation(Validator $validator)
    {
        $errors  = $validator->errors()->toArray();

        throw new ValidationException(json_encode($errors));
    }
}
