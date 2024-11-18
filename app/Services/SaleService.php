<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Sale\Sale;
use App\Repositories\SaleRepository;
use Illuminate\Database\Eloquent\Collection;

class SaleService
{
    public function __construct(
        private readonly SaleRepository $saleRepository
    ) {
    }

    public function getSalesByDate(string $soldAt): Collection
    {
        return $this->saleRepository->getSalesByDate($soldAt);
    }

    public function getTopSaleByDate(string $soldAt): ?Sale
    {
        return $this->saleRepository->getTopSaleByDate($soldAt);
    }
}
