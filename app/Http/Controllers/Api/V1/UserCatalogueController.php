<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserCatalogue\StoreUserCatalogueRequest;
use App\Http\Requests\V1\UserCatalogue\UpdateUserCatalogueRequest;
use App\Services\Interfaces\User\UserCatalogueServiceInterface;

use Illuminate\Http\Request;

class UserCatalogueController extends Controller
{
    protected $userCatalogueService;
    public function __construct(
        UserCatalogueServiceInterface $userCatalogueService
    ) {
        $this->userCatalogueService = $userCatalogueService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->userCatalogueService->paginate();
        $statusCode = $response['status'] == 'success' ? ResponseEnum::OK : ResponseEnum::INTERNAL_SERVER_ERROR;
        return response()->json($response, $statusCode);
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
        $response = $this->userCatalogueService->create();
        $statusCode = $response['status'] == 'success' ? ResponseEnum::OK : ResponseEnum::INTERNAL_SERVER_ERROR;
        return response()->json($response, $statusCode);
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
