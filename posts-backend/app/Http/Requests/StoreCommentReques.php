<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class StoreCommentRequest extends FormRequest
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
            'post_id' => 'required|integer',
            'comment' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'post_id.integer' => 'The post_id field must be an integer.',
            'post_id.required' => 'The post_id field is required.',
            'comment.required' => 'The comment field is required.',
        ];
    }
}
