<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcement extends Model
{
    use HasUuids;

    protected $fillable = ['title', 'body', 'status'];

    public const STATUSES = ['draft', 'published', 'archived'];

    public $incrementing = false;

    protected $keyType = 'string';

    public function attachments(): HasMany
    {
        return $this->hasMany(AnnouncementAttachment::class);
    }
}
