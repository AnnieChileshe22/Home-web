<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Profile extends Model
{
    use HasUuids;

    protected $fillable = ['title', 'first_name', 'middle_name', 'last_name', 'management_role', 'profile_pic', 'biography'];

    public $incrementing = false;

    protected $keyType = 'string';

    public function getFullNameAttribute(): string
    {
        return trim(implode(' ', array_filter([$this->title, $this->first_name, $this->middle_name, $this->last_name])));
    }
}
