<?php

namespace App\Http\Requests\AirBersih;

use Illuminate\Foundation\Http\FormRequest;

class StoreAirBersihRequest extends FormRequest
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
            'id_pelanggan' => 'required|string|max:16',
            'nama' => 'required|string',
            'no_telepon' => 'required|string',
            'alamat' => 'required|string',
            'batas_pembayaran' => 'required|date',
            'total_pemakaian' => 'required|integer|min:1',
            'tagihan' => 'nullable|integer',
            'status' => 'nullable|string',
        ];
    }
    
}
