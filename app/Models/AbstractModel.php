<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    use HasFactory;

    public const string|null CREATED_AT = 'createdAt';
    public const string|null UPDATED_AT = 'updatedAt';

    protected $dateFormat = 'U';
    protected $connection = 'mysql';
}
