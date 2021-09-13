<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'url' => ['string', 'url'],
            'description' => [],
            'type' => ['required', 'integer', Rule::in([1, 2, 3, 4, 5])],
        ];
    }
}
