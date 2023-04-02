<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'author_id'
    ];

    public function author() :BelongsTo {
        return $this->belongsTo(Author::class);
    }

    public function category() :BelongsTo {
        return $this->belongsTo(Category::class);
    }


    public function ratings() :HasMany {
        return $this->hasMany(Rating::class);
    }

    public function votersRatingCount() : int {
        return count($this->ratings) ?? 0;
    }

    public function avarageRatingSummary() :float {
        return number_format($this->ratings()->avg('rating') ?? 0, 2, '.', ',');
    }


}
