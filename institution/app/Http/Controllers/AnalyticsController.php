<?php

namespace App\Http\Controllers;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $visits = Visit::selectRaw('MONTH(visited_at) as month, COUNT(*) as count')
                        ->whereYear('visited_at', Carbon::now()->year)
                        ->groupBy('month')
                        ->pluck('count', 'month')
                        ->toArray();

        $monthlyVisits = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyVisits[] = $visits[$i] ?? 0;
        }

        return view('admin.analytics', compact('monthlyVisits'));
    }
}
