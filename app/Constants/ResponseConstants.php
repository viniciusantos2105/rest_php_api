<?php

namespace App\Constants;

class ResponseConstants
{
    const VALIDATION_ERROR_MESSAGE = "Seus dados de entrada contêm erros.";
    const VALIDATION_ERROR_STATUS = 422;

    public static function validationErrorResponse($validator)
    {
        return response()->json([
            'message' => self::VALIDATION_ERROR_MESSAGE,
            'errors' => $validator->errors()
        ], self::VALIDATION_ERROR_STATUS);
    }

    const MESSAGES = [
        'userName.required' => 'O campo nome de usuário é obrigatório.',
        'userEmail.required' => 'O campo e-mail é obrigatório.',
        'userEmail.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
        'userPassword.required' => 'O campo senha é obrigatório.',
        'userPassword.min' => 'A senha deve ter pelo menos 8 caracteres.',
    ];
}
