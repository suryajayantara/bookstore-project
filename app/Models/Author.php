<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'name',
        'gender'
    ];

    public function books() : HasMany{
        return $this->hasMany(Book::class);
    }

    public function votersCount() : int {
        return count($this->books->votersRatingCount);
    }
}
