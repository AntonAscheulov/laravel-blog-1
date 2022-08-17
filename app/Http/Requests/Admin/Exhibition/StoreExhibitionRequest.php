<?php

namespace App\Http\Requests\Admin\Exhibition;

use Illuminate\Foundation\Http\FormRequest;

class StoreExhibitionRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'artist_id' => 'required|exists:artists,id',
            'image' => 'required|image',
        ];
    }
}
