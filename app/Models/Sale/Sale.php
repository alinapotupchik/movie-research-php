<?php declare(strict_types=1);

namespace App\Models\Sale;

use App\Models\{AbstractModel, Movie\Movie, Theater\Theater};
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $theater_id
 * @property integer $movie_id
 * @property integer $amount
 * @property-read Theater $theater
 * @property-read Movie $movie
 */
class Sale extends AbstractModel
{
    protected $fillable = [
        'theater_id',
        'movie_id',
        'sold_at',
        'amount',
    ];

    public function theater(): BelongsTo
    {
        return $this->belongsTo(Theater::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
