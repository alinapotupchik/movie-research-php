<?php

namespace App\Repositories;

use App\Models\Sale\Sale;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SaleRepository
{
    public function getSalesByDate(string $soldAt): Collection
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $soldAt);

        $startOfDay = $carbonDate->copy()->startOfDay()->timestamp;
        $endOfDay = $carbonDate->copy()->endOfDay()->timestamp;

        return Sale::query()
            ->select('theaters.name', DB::raw('SUM(amount) as total_tickets'))
            ->join('theaters', 'sales.theater_id', '=', 'theaters.id')
            ->whereBetween('sales.sold_at', [$startOfDay, $endOfDay])
            ->groupBy('sales.theater_id', 'theaters.name')
            ->orderByDesc('total_tickets')
            ->get();

    }

    public function getTopSaleByDate(string $soldAt): ?Sale
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $soldAt);

        $startOfDay = $carbonDate->copy()->startOfDay()->timestamp;
        $endOfDay = $carbonDate->copy()->endOfDay()->timestamp;

        return Sale::query()
            ->select('theaters.name', DB::raw('SUM(amount) as total_tickets'))
            ->join('theaters', 'sales.theater_id', '=', 'theaters.id')
            ->whereBetween('sales.sold_at', [$startOfDay, $endOfDay])
            ->groupBy('sales.theater_id', 'theaters.name')
            ->orderByDesc('total_tickets')
            ->first();
    }
}
