<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pickup extends Model
{

    use HasFactory, HasUuids;
    protected $fillable = [
        'user_id',
        'address',
        'pickupDate',
        'pickupTime',
        'additionalNote'
    ];

    public function wasteItems(): BelongsToMany
    {
        return $this->belongsToMany(WasteItem::class);
    }
}
