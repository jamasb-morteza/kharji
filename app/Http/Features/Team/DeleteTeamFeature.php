<?php

namespace App\Http\Features\Team;

use App\Models\Team\Team;

class DeleteTeamFeature
{
    public static function handle($team_id)
    {
        $team = Team::findOrFail($team_id);
        if ($team) {
            $team->members()->detach();
            $team->delete();
        }
        return true;
    }
}
