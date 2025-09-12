<?php

namespace App\Http\Requests\Employee;

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
            'user_id' => ['int', 'exists:users,id', 'unique:employees'],
            'phone' => ['string', 'max:32'],
            'position' => ['string', 'max:255'],
            'is_active' => ['boolean'],
        ];
    }
}
