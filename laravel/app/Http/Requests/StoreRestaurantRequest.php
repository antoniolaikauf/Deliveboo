<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'=>'required|string|min:5|max:128',
            'description'=>'required|string|min:10|max:200',
            'price'=>'required|numeric|min:0',
            'available' => 'nullable',
        ];
    }

    public function messages(){

        return[
            'name.min'=>'Il Nome non deve essere minore di 5 caratteri',
            'name.max'=>'Il Nome non deve essere maggiore di 5 caratteri',
            'name.required' => 'Il campo Nome è obbligatorio.',
            'name.max' => 'Il campo Nome non può superare i 128 caratteri.',
            'description.required' => 'Il campo Descrizione è obbligatorio.',
            'description.min' => 'Il campo Descrizione non deve essere minore di 10 caratteri.',
            'description.max' => 'Il campo Descrizione non deve essere maggiore di 200 caratteri.',
            'price.required' => 'Il campo Prezzo è obbligatorio.',
            'price.numeric' => 'Il campo Prezzo deve essere un numero.',
            'price.min' => 'il prezzo deve essere maggiore di 0.',
            'available.boolean' => 'Il campo Disponibile deve essere vero o falso.',
        ];

    }
}
