<?php

namespace App\Http\Controllers\Admin;

use App\Services\DashboardService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $dashboardService) {}

    public function getDashboardPage() : View {
        $data = $this->dashboardService->getDashboardData();
        return view('admin.dashboard', $data);
    }
}
