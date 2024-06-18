<?php

namespace App\Http\Requests\LumbungPadi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLumbungPadiRequest extends FormRequest
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
        'no_ktp' => 'required|string|max:16',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date',
        'total_pinjam' => 'required|integer|min:1',
        'denda' => 'nullable|integer',
        'status' => 'nullable|string',
        ];
    }
}
