<?php

namespace App\Models;

use App\Mail\OTPMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;


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

    public function OTP(){
        
        return  Cache::get($this->OTPkey());
    }

    public function OTPkey()
    {

        return "OTP_for_{$this->id}";
    }


    public function cacheTheOTP()
    {
        $OTP=rand(100000, 9999999);
        Cache::put([$this->OTPkey=>$OTP], now()->addSeconds(20));
        return $OTP;
    }

    public function sendOTP()
    {
     Mail::to('omidioraemmanuel@gmail.com')->send(new OTPMail($this->cacheTheOTP()));
    }
}
