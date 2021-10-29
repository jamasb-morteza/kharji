<?php

namespace App\Http\Actions\Team;

use App\Models\Team\Membership;
use Carbon\Carbon;

class AttachMemberToTeamAction
{
    public static function handle($team_id, $members)
    {
        Membership::where('team_id', $team_id)
            ->whereNotIn('user_id', $members)->delete();

        foreach ($members as $member) {
            $data[] = [
                'team_id' => $team_id,
                'user_id' => $member,
                'confirmed' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        array_unshift($data, [
            'team_id' => $team_id,
            'user_id' => auth()->id(),
            'confirmed' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return Membership::query()->insertOrIgnore($data);
    }
}
