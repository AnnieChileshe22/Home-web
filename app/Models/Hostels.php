<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hostels extends Model
{
    use HasUuids;

    protected $fillable = ['name', 'gender', 'features', 'description', 'price'];

    protected function casts(): array
    {
        return ['features' => 'array', 'price' => 'decimal:2'];
    }

    public $incrementing = false;

    protected $keyType = 'string';

    public function images(): HasMany
    {
        return $this->hasMany(HostelImage::class, 'hostel_id');
    }
}
