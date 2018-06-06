<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'manufacterer_id' => 'required|exists:manufacterers,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'purchase_price' => [
                'required',
                'regex:/^\d+(\d{3})*(\,\d{1,2})?$/'
            ],
            'selling_price' => [
                'required',
                'regex:/^\d+(\d{3})*(\,\d{1,2})?$/'
            ]
        ];
    }
}
