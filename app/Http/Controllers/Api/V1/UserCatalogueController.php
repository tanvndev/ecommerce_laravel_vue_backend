<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserCatalogue\StoreUserCatalogueRequest;
use App\Http\Requests\V1\UserCatalogue\UpdateUserCatalogueRequest;
use Illuminate\Http\Request;

class UserCatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserCatalogueRequest $request)
    {
        dd($request->all());
        return response()->json([
            'status' => ResponseEnum::OK,
            'messages' => ['Thanh cong'],
            'data' => []
        ], ResponseEnum::OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserCatalogueRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
