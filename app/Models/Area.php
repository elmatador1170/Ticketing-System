<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Builder
 */
class Area extends Model
{
    use HasFactory;

    /**
     * Many-to-many relationship with User
     *
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Foreign Key for Ticket
     *
     */
    public function tickets() : HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
