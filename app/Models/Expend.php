<?php

namespace App\Models;

use App\Traits\HasJalaliDates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expend extends Model
{
    use HasFactory, HasJalaliDates;

    public $dates = ['created_at', 'updated_at', 'spend_at'];
    public $jalali_dates = ['created_at', 'updated_at', 'spend_at'];
    protected $fillable = ['user_id', 'title', 'price', 'description', 'spend_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
