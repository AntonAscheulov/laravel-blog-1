<?php

namespace App\Http\Requests\Admin\Artist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtistRequest extends FormRequest
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
            'artist_name' => 'string|max:255',
            'artist_profession' => 'string|max:255',
            'artist_full_description' => 'string',
            'artist_short_description' => 'string',
            'artist_avatar' => 'image',
        ];
    }
}
