<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\BaseApiRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseApiRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'sku' => [
                'string',
                'max:1024',
                Rule::unique('products')->ignore($this->sku, 'sku')
            ],
            'price' => ['decimal:0,2', 'min:0', 'max:9999999999.99'],
            'description' => ['string', 'max:2048'],
            'is_active' => ['boolean'],
        ];
    }
}
