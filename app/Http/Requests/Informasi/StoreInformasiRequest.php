<?php

namespace App\Http\Requests\Informasi;

use Illuminate\Foundation\Http\FormRequest;

class StoreInformasiRequest extends FormRequest
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
            'judul' => 'required|string|max:200',
            'keterangan' => 'nullable',
            'tanggal_publish' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2000'
            
        ];
    }
    
}
