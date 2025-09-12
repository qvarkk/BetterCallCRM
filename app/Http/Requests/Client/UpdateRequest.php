<?php

namespace App\Http\Requests\Client;

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
            'name' => ['string' , 'max:255'],
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
