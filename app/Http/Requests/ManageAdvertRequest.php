<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageAdvertRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:500',
            'description' => 'required|max:1500',
            'gender' => 'required',
            'age' => 'required|integer|min:0|max:30',
            'vaccinated' => 'required',
            'sterilized' => 'required',
            'weight' => 'required|integer|min:0|max:500',
            'height' => 'required|integer|min:0|max:200',
            'image' => 'image|mimes:jpg,png',
            'breed_id' =>  'nullable|integer|min:1',
            'species_id' =>  'nullable|integer|min:1',
            'city_id' =>  'nullable|integer|min:1',
            'voievodeship_id' =>  'nullable|integer|min:1'
        ];
    }
}
