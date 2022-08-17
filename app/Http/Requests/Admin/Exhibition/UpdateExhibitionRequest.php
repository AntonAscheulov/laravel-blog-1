<?php

namespace App\Http\Requests\Admin\Exhibition;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExhibitionRequest extends FormRequest
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
            'title' => 'string|max:255',
            'description' => 'string',
            'date_start' => 'date',
            'date_end' => 'date',
            'artist_id' => 'exists:artists,id',
            'image' => 'image',
        ];
    }
}
