<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\BaseApiRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends BaseApiRequest
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
            'name' => ['string', 'required', 'max:255'],
            'sku' => ['string', 'unique:products,sku', 'max:1024'],
            'price' => ['decimal:0,2', 'min:0', 'max:9999999999.99'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10240'],
            'description' => ['string', 'max:2048'],
            'is_active' => ['boolean'],
        ];
    }
}
