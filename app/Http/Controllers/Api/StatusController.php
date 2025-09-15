<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : AnonymousResourceCollection
    {
        return StatusResource::collection(Status::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status) : JsonResource
    {
        return new StatusResource($status);
    }
}
