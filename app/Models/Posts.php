<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posts extends Model
{
    use HasUuids;

    protected $fillable = ['title', 'body', 'category', 'status'];

    public const CATEGORIES = ['news', 'event'];
    public const STATUSES = ['draft', 'published', 'archived'];

    public $incrementing = false;

    protected $keyType = 'string';

    public function images(): HasMany
    {
        return $this->hasMany(PostImage::class, 'post_id');
    }
}
