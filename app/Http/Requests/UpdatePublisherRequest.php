<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePublisherRequest extends FormRequest
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
            'id_penerbit' => 'required|string',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'telepon' => 'required|string',
        ];
    }
}