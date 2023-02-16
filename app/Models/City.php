<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'voievodeship_id'
    ];
    public function adverts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Advert::class);
    }
    public function voievodeships(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Voievodeship::class);
    }
}
