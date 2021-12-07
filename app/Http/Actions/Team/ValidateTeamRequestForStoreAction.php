<?php

namespace App\Http\Actions\Team;

class ValidateTeamRequestForStoreAction
{
    public static function handle(array $request)
    {
        return \Validator::validate($request, [
            'title' => 'required|min:3|max:64',
            'members' => 'array',
        ], [
            'title' => [
                'required' => 'عنوان الزامی',
                'min' => 'حداقل 3 حرف',
                'max' => 'حداکثر 64 حرف',
            ],
            'members' => [
                'اعضا نامعتبر'
            ]
        ]);
    }
}
