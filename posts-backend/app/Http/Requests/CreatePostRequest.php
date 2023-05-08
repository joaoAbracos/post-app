<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreatePostRequest extends FormRequest
{

    

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        
        return [
            'title' => 'string|required',
            'body' => 'string|required',
            'type' => Rule::in(['Frontend', 'Backend', 'FullStack'])
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'body.required' => 'The body field is required.',
            'title.string' => 'The title field must be an string.',
            'body.string' => 'The body field must be an string.',
            'type.in' => 'The type field must be one of: Frontend, Backend, FullStack.',
        ];
    }
}
