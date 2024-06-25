<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getSidebar()
    {
        return response()->json([
            'status' => ResponseEnum::OK,
            'messages' => 'Get sidebar successfully!',
            'data' => __('sidebar.module')
        ], ResponseEnum::OK);
    }
}
