<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'client' => new ClientResource($this->client),
            'responsible' => new EmployeeResource($this->responsible),
            'title' => $this->title,
            'status' => new StatusResource($this->status),
            'amount' => $this->amount,
            'expected_close_date' => $this->expected_close_date,
            'closed_at' => $this->closed_at,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
