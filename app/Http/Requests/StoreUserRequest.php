<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules(): array
    {
        return [
            'name'     => [
                'required'],
            'email'    => [
                'required',
                'unique:users'],
            'password' => [
                'required'],
            'roles.*'  => [
                'integer'],
            'roles'    => [
                'required',
                'array'],
        ];

    }
}
