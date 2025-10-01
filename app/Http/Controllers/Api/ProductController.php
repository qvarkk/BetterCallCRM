<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : AnonymousResourceCollection
    {
        $perPage = request('per_page', 5);
        $page = request('page', 1);

        $products = Product::paginate($perPage, ['*'], 'page', $page);

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : JsonResponse
    {
        $data = $request->validated();

        $imageFile = $request->file('image');
        $imageFilename = rand(1, 10000) . '_' . $imageFile->getClientOriginalName();

        try {
            $path = Storage::disk('s3')->putFileAs('product_images', $imageFile, $imageFilename);
            $imageUrl = Storage::disk('s3')->url($path);
        }
        catch (\Exception $e) {
            return response()->json([
               'code' => 500,
               'message' => 'Error uploading image',
            ], 500);
        }

        unset($data['image']);
        $data['image_url'] = $imageUrl;
        Product::create($data);

        return response()->json([
                'code' => 201,
                'message' => 'Product created successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) : JsonResource
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product) : JsonResource
    {
        $data = $request->validated();
        $product->update($data);

        return new ProductResource($product->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) : JsonResponse
    {
        $product->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Product deleted successfully.'
        ]);
    }
}
