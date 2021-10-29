<?php

namespace App\Http\Actions\Team;

use App\Models\Team\Team;

class GenerateSlugAction
{
    public static function handle()
    {
        $slug = \Str::random(8);
        while (Team::where('slug', $slug)->first()) {
            $slug = \Str::random(8);
        }
        return $slug;
    }
}
