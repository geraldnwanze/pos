<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role === RoleEnum::ADMIN || auth()->user()->role === RoleEnum::OWNER ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'barcode' => 'sometimes|nullable|max:255',
            'name' => 'required|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric'
        ];
    }
}
