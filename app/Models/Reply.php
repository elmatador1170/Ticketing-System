<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*
     * Foreign Key
     *
     */
    public function ticket() : BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
