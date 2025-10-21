<?php

namespace App\Http\Requests;

use App\Models\Item;
use App\Traits\ResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ItemRequest extends FormRequest
{
    use ResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (request()->isMethod('put') || request()->isMethod('patch')) {
            $id = $this->route('items');
            return $id && Item::where('id', $id)->exists();
        }

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

    protected function failedAuthorization()
    {
        throw new HttpResponseException($this->errorResponse(__('item.itemnotfound'), 404));
    }
}
