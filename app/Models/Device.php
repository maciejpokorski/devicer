<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the user that owns the device.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the devices which doesn't belong to any user
     */
    public static function notInUse()
    {
        return (new static)::whereNull('user_id')->where('is_accesable', 1)->get();
    }
}
