<?php

namespace App\Http\Requests\Deal;

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
            'client_id' => ['int', 'exists:clients,id'],
            'responsible_employee_id' => ['int', 'exists:employees,id'],
            'title' => ['string', 'required', 'max:1028'],
            'status_id' => ['int', 'exists:statuses,id'],
            'amount' => ['decimal:0,2', 'min:0', 'max:9999999999.99'],
            'expected_close_date' => ['date'],
            'closed_at' => ['date'],
            'notes' => ['string', 'max:2048'],
        ];
    }
}
