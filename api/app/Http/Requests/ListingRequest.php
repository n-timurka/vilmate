<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
            'title' => 'required|min:4|max:255',
            'area' => 'required|regex:/^([0-9.]+)$/',
            'price' => 'required|regex:/^([0-9.]+)$/',
            'country' => 'required|string',
            'city' => 'required|regex:/^([a-zA-Z\- ]+)$/',
            'postal' => 'nullable|numeric',
            'address' => 'required|regex:/([a-zA-Z0-9, ]+)$/',
            'lng' => 'nullable|regex:/([0-9. ]+)$/',
            'lat' => 'nullable|regex:/([0-9. ]+)$/',
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|regex:/^([0-9+() ]+)$/',
            'file' => 'nullable|file|image',
        ];
    }
}
