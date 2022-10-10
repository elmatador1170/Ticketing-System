<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Builder
 */
class Ticket extends Model
{
    use HasFactory;


    protected $guarded = [
        "id"
    ];

    /**
     * Foreign Key for Ticket
     *
     */
    public function area() : BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Foreign Key for Ticket
     *
     */
    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Foreign Key for Ticket
     *
     */
    public function replies() : HasMany
    {
        return $this->hasMany(Reply::class);
    }

}
