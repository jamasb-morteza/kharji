<?php

namespace App\Http\Actions\Team;

use App\Models\Team\Team;

class StoreTeamToDBAction
{
    public static function handle(array $data, $team_id = null)
    {
        $data = array_merge($data, [
            'user_id' => auth()->id(),
            'personal_team' => isset($data['personal_team']) && $data['personal_team'] == 1 ? 1 : 0,
        ]);
        unset($data['members']);
        if ($team_id) {
            return Team::where('id', $team_id)->limit(1)->update($data);
        }
        return Team::create($data);
    }
}
