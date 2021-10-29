<?php

namespace App\Http\Features\Team;

use App\Http\Actions\Team\AttachMemberToTeamAction;
use App\Http\Actions\Team\GenerateSlugAction;
use App\Http\Actions\Team\StoreTeamToDBAction;
use App\Http\Actions\Team\ValidateTeamRequestForStoreAction;
use Illuminate\Http\Request;

class StoreTeamFeature
{
    public static function handle(Request $request)
    {
        $validate = ValidateTeamRequestForStoreAction::handle($request->only(['title', 'members']));
        $slug = GenerateSlugAction::handle();
        $team = StoreTeamToDBAction::handle($request->merge(['slug' => $slug])->all());
        AttachMemberToTeamAction::handle($team->id, $request->members);
        return $team;
    }
}
