<?php declare(strict_types=1);

namespace App\Http\Controllers\Sale;

use App\Http\{Controllers\Controller, Requests\FetchSaleRequest};
use App\Services\SaleService;
use Illuminate\Contracts\{Foundation\Application, View\Factory, View\View};
use Illuminate\Http\RedirectResponse;

class SaleController extends Controller
{
    public function __construct(
      private readonly SaleService $saleService
    ) {
    }

    public function showForm(): Factory|View|Application
    {
        return view('sale.form');
    }


    public function getTopSaleByDate(FetchSaleRequest $request): View|Factory|Application|RedirectResponse
    {
        $data = $request->getData();
        $soldAt = $data['sold_at'];

        $theaterSales = $this->saleService->getSalesByDate($soldAt);

        if ($theaterSales->isEmpty()) {
            return redirect()->route('sale.form')
                ->with('error', 'No sales data found for the selected date.')
                ->withInput();
        }

        $topTheater = $this->saleService->getTopSaleByDate($soldAt);

        return view('sale.result', [
            'theaterSales' => $theaterSales,
            'topTheater' => $topTheater,
            'soldAt' => $soldAt,
        ]);
    }
}
