<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserDeviceHistory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'is_admin',
        'unit_id',
        'device_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Get the device associated with the user.
    */
    public function device()
    {
        return $this->hasOne(Device::class);
    }

    /**
    * Get the users who don't have any device
    */
    public static function withoutDevice()
    {
        return (new static)::whereNull('device_id')->where('is_active', 1)->get();
    }

    
    /**
    * Get the current user note
    */
    public function noteCurrent()
    {
        return $this->historyCurrent() ?? null;
    }

    /**
    * Get the current user history
    */
    public function historyCurrent()
    {
        return $this->history()->whereNull('updated_at')->latest()->first();
    }

    /**
    * Get the user history
    */
    public function history()
    {
        return $this->hasMany(UserDeviceHistory::class);
    }
}
