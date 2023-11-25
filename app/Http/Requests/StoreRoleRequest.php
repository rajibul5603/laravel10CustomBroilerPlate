<?php

namespace App\Http\Requests;

use App\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules(): array
    {
        return [
            'title'         => [ 'required'],
            'permissions.*' => [
                'integer'],
            'permissions'   => [
                'required',
                'array'],
        ];

    }
}
