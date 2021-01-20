<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDeviceHistory extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'device_id',
        'millage_old'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_devices_history';

    /**
    * Get the phone associated with the user.
    */
    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }

    /**
    * Get the phone associated with the user.
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
