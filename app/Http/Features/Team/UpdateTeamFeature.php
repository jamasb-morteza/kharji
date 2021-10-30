<?php

namespace App\Http\Features\Team;

use App\Http\Actions\Team\AttachMemberToTeamAction;
use App\Http\Actions\Team\StoreTeamToDBAction;
use App\Http\Actions\Team\ValidateTeamRequestForStoreAction;
use App\Models\Team\Team;
use Illuminate\Http\Request;

class UpdateTeamFeature
{
    public static function handle($team_id, Request $request)
    {
        $team = Team::findOrFail($team_id);
        if ($team) {
            $team->update([$request->all()]);
            $validate = ValidateTeamRequestForStoreAction::handle($request->only(['title', 'members']));
            $team = StoreTeamToDBAction::handle($request->except(['_token', '_method', 'members']), $team->id);
            AttachMemberToTeamAction::handle($team->id, $request->members);
        }
        return $team;
    }
}
