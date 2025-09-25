<?php

namespace App\Http\Requests;

use App\Rules\MaxTagNumbers;
use App\Rules\MinTagNumbers;
use Illuminate\Foundation\Http\FormRequest;

class BlogEditRequest extends FormRequest
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
            'id'  => 'required|exists:blogs',
            'title'  => 'required|max:100',
            'short_description'  => 'required',
            'description'  => 'required',
            'identifier'  => 'required|max:100',
            'tags'  =>  ['required', new MaxTagNumbers(), new MinTagNumbers()],
            'slug'  => 'required|alpha_dash|unique:blogs,slug,'.$this->id,
            'status'  => 'required|in:published,pending,draft,rejected',
            'type'  => 'required|in:main-listing,tool-details,static-page',
            'category_id'  => 'nullable|exists:categories',
        ];
    }
}
