<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDeviceHistory;

class Note extends Model
{
    use HasFactory;

    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the history that this note was added.
     */
    public function history()
    {
        return $this->belongsTo(UserDeviceHistory::class);
    }

}
