<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5'],
            'url' => ['string', 'url'],
            'description' => [],
            'type' => ['required', 'integer', Rule::in([1, 2, 3, 4, 5])],
        ];
    }
}
