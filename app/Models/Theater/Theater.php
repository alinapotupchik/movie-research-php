<?php declare(strict_types=1);

namespace App\Models\Theater;

use App\Models\{AbstractModel, Sale\Sale};
use Illuminate\Database\Eloquent\{Collection, Relations\HasMany};

/**
 * @property integer $id
 * @property string $name
 * @property string $location
 * @property-read Sale[]|Collection $sales
 */
class Theater extends AbstractModel
{
    protected $fillable = [
        'name',
        'location',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
