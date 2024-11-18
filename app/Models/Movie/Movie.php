<?php declare(strict_types=1);

namespace App\Models\Movie;

use App\Models\{AbstractModel, Sale\Sale};
use Illuminate\Database\Eloquent\{Collection, Relations\HasMany};

/**
 * @property integer $id
 * @property string $title
 * @property string $genre
 * @property-read Sale[]|Collection $sales
 */
class Movie extends AbstractModel
{
    protected $fillable = [
        'title',
        'genre',
        'released_at',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
