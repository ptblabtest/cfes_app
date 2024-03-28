<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SidebarItem;
use Illuminate\Support\Facades\Cache;

class SidebarController extends Controller
{
    public function getSidebar()
    {
        $sidebarItems = Cache::remember('sidebar_items', 60, function () {
            return SidebarItem::with('children')->whereNull('parent_id')->get();
        });
    
        return response()->json($sidebarItems);
    }
}