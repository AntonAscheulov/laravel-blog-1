<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
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
            'content' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'artist_id' => 'required|exists:artists,id',
            'image' => 'required|image',
            'photos' => 'required|array',
            'tags' => 'required|array',
            'tags.*' => 'required|exists:tags,id',
            'user_id' => 'required',
            'is_published' => 'required|nullable',
            'is_recommended' => 'required|nullable',
        ];
    }


    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::user()->id,
            'is_published' => $this->exists('is_published') ? true : false,
            'is_recommended' => $this->exists('is_recommended') ? true : false,
        ]);
    }
}
