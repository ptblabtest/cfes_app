<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\StatusService;

class StatusController extends Controller
{
    public function index(StatusService $statusService)
    {
        $statuses = $statusService->getApprovalStatuses();
        return response()->json($statuses);
    }
}
