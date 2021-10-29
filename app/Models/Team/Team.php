<?php

namespace App\Models\Team;

use App\Models\Expend;
use App\Models\User;
use App\Traits\HasJalaliDates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory, HasJalaliDates;

    protected $jalali_dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'personal_team',
        'description',
        'team_profile',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function spends()
    {
        return $this->hasMany(Expend::class);
    }
}
