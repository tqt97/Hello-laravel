<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'string|min:3|max:255',
            'slug' => 'unique:posts',
            'description' => 'string|nullable',
            'category_id' => 'required|integer',
            'user_id' => 'integer',
            'active' => 'required|boolean|sometimes',
            'feature' => 'required|boolean|sometimes',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }
}
