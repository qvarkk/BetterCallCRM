<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Deal\StoreRequest;
use App\Http\Requests\Deal\UpdateRequest;
use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : AnonymousResourceCollection
    {
        $deals = Deal::all();

        return DealResource::collection($deals)
            ->additional([
                'count' => $deals->count(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : JsonResponse
    {
        $data = $request->validated();
        Deal::create($data);

        return response()->json([
                'code' => 201,
                'message' => 'Deal created successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deal $deal) : JsonResource
    {
        return new DealResource($deal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Deal $deal) : JsonResource
    {
        $data = $request->validated();
        $deal->update($data);

        return new DealResource($deal->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal) : JsonResponse
    {
        $deal->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Deal deleted successfully.'
        ]);
    }
}
