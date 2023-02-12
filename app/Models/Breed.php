<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'species_id'
    ];
    public function adverts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Advert::class);
    }
    public function species(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Species::class);
    }
}
