<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'userName' => 'sometimes|string',
            'userEmail' => 'sometimes|string|email',
            'userPassword' => 'sometimes|string|min:8',
        ];
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
