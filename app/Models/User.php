<?php

namespace App\Models;

use App\Models\Team\Team;
use App\Traits\HasJalaliDates;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Morilog\Jalali\Jalalian;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasJalaliDates, Notifiable;

    public $jalali_dates = ['created_at', 'updated_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'google_id',
        'avatar',
        'avatar_original',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function spends()
    {
        return $this->hasMany(Expend::class);
    }

    public function getDefaultProfileAttribute()
    {
        return !empty($this->avatar) ? $this->avatar : asset('assets/img/avatars/avatar1.png');
    }

    public function getJalaliCreatedAtAttribute()
    {
        return $this->created_at ? Jalalian::fromDateTime($this->created_at) : null;
    }

    public function getJalaliUpdatedAtAttribute()
    {
        return $this->created_at ? Jalalian::fromDateTime($this->created_at) : null;
    }

    public function scopeNotSelf(Builder $query)
    {
        return $query->where('user_id', '!=', auth()->id());
    }

}
