<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Constants\ResponseConstants;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'userName' => 'required|string',
            'userEmail' => 'required|string|email',
            'userPassword' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return ResponseConstants::MESSAGES;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ResponseConstants::validationErrorResponse($validator);

        throw new HttpResponseException($response);
    }

    public function userName(): string
    {
        return $this->get('userName');
    }

    public function userEmail(): string
    {
        return $this->get('userEmail');
    }

    public function userPassword(): string
    {
        return $this->get('userPassword');
    }
}
