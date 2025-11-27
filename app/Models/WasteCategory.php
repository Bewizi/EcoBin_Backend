<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WasteCategory extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['name', 'slug'];

    public function wasteItems(): HasMany
    {
        return $this->hasMany(WasteItem::class);
    }
}
