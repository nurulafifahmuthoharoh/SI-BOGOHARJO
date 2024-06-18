<?php

namespace App\Http\Requests\SewaTratak;

use Illuminate\Foundation\Http\FormRequest;

class StoreSewaTratakRequest extends FormRequest
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
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
            'no_tujuan' => 'required|string',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'total_kursi' => 'required|integer|min:1',
            'total_tenda' => 'required|integer|min:1',
            'pembayaran' => 'nullable|integer',
            'status' => 'nullable|string',
        ];
    }
    
}
