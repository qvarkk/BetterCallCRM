<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\BaseApiRequest;

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
            'name' => ['string' ,'required', 'max:255'],
            'email' => ['email', 'max:255'],
            'phone' => ['string', 'max:255'],
            'company' => ['string', 'max:255'],
            'vat_number' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'address' => ['string', 'max:255'],
            'notes' => ['string', 'max:2048'],
        ];
    }
}
