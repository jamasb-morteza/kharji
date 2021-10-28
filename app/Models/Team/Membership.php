<?php

namespace App\Models\Team;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Membership extends Pivot
{
    protected $table = 'team_user';
    public $incrementing = true;
}
