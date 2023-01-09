<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role === RoleEnum::ADMIN ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "role" => "required|in:admin,owner,staff",
            "name" => "required|max:255",
            "email" => "sometimes|nullable|unique:users",
            "phone" => "required|numeric|digits:11",
            "username" => "required|unique:users"
        ];
    }
}
