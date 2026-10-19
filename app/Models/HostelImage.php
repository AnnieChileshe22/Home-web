<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HostelImage extends Model
{
    protected $fillable = ['path', 'alt_text'];

    public function hostel(): BelongsTo
    {
        return $this->belongsTo(Hostels::class, 'hostel_id');
    }
}
