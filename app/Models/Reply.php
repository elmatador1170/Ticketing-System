<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;

    /*
     * Foreign Key
     *
     */
    public function ticket() : BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
