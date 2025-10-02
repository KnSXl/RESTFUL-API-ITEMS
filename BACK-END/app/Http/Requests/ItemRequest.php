<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('post')) {
            $rules = [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'description' => [
                    'string',
                ],
            ];
        } elseif (request()->isMethod('put') || request()->isMethod('patch')) {
            $rules = [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'description' => [
                    'string',
                ],
            ];
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required'      => __('item.thenamefieldisrequired'),
            'name.string'        => __('item.thenamefieldmustbeastring'),
            'name.max'           => __('item.thenamefieldmustnotbegreaterthan255characters'),
            'description.string' => __('item.thedescriptionfieldmustbeastring'),
        ];
    }
}
