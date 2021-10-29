<?php

namespace App\Http\Actions\Team;

use Illuminate\Http\Request;

class ValidateTeamRequestForUpdateAction
{
    public static function handle(array $request)
    {
        return \Validator::validate($request, [
            'title' => 'required|min:5|max:64',
            'members' => 'array',
        ], [
            'title' => [
                'required' => 'عنوان الزامی',
                'min' => 'حداقل 5 حرف',
                'max' => 'حداکثر 6 حرف',
            ],
            'members' => [
                'اعضا نامعتبر'
            ]
        ]);
    }
}
