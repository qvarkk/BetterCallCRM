<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : AnonymousResourceCollection
    {
        $clients = Client::all();

        return ClientResource::collection($clients)
            ->additional([
                'count' => $clients->count(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : JsonResponse
    {
        $data = $request->validated();
        Client::create($data);

        return response()->json([
                'code' => 201,
                'message' => 'Client created successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client) : JsonResource
    {
        return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Client $client) : JsonResource
    {
        $data = $request->validated();
        $client->update($data);

        return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client) : JsonResponse
    {
        $client->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Client deleted successfully.'
        ]);
    }
}
