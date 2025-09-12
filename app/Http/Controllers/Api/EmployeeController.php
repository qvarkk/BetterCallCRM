<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : AnonymousResourceCollection
    {
        return EmployeeResource::collection(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : JsonResponse
    {
        $data = $request->validated();
        Employee::create($data);

        return response()->json([
                'code' => 201,
                'message' => 'Employee created successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee) : JsonResource
    {
        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Employee $employee) : JsonResource
    {
        $data = $request->validated();
        $employee->update($data);

        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee) : JsonResponse
    {
        $employee->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Employee deleted successfully.'
        ]);
    }
}
