<?php

namespace App\Http\Requests\SewaTratak;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSewaTratakRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:16',
            'alamat' => 'required|string|max:255',
            'no_tujuan' => 'required|string|max:255',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'total_kursi' => 'required|integer|min:1',
            'total_tenda' => 'required|integer|min:1',
            'pembayaran' => 'nullable|string',
            'status' => 'nullable|string',
            
        ];
    }
}
