<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nama'          => 'required|string|max:100',
            'harga'    => 'required|string|max:100',
            'qty'    => 'required|string|max:100',
            'category_id'      => 'required',
            'foto'          => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500',
        ];
    }
}
