<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|max:200",
            "image"=> "file",
            "description"=> "required|max:5000",
            "link_repo"=> "required|max:1000",
            // "tech"=> "required|max:2000",
            "date_release"=> "required|date|max:10",
            "type_id"=> "required",
            
        ];
    }

    public function messages(): array {
        return [
            'required'=> 'Hai dimenticato di inserire :attribute',
            'max'=> 'Il valore inserito in :attribute ha superato il valore :max di caratteri',
            
        ];
    }

    public function attributes(): array{
        return [
            'name'=> 'Nome Progetto',
            'image'=> 'Immagine',
            'description'=>'Descrizione',
            'link_repo'=> 'Link del Documento',
            // 'tech'=> 'Linguaggi o Tecnologie',
            'date_release'=> 'Data di Pubblicazione',
            'type_id'=> 'Tipologia',
        ] ;
    }
}
