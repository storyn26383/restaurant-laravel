<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'tel',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
