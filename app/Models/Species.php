<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function breed(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Breed::class);
    }
}
