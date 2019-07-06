<?php

namespace App\Teams;

class Roles
{
    /**
     * The default role when creating a team.
     *
     * @var string
     */
    public static $roleWhenCreatingTeam = 'team_admin';

    /**
     * The default role when joining an existing team.
     *
     * @var string
     */
    public static $roleWhenJoiningTeam = 'team_member';

    /**
     * The roles that can be attributed to users.
     *
     * @var array
     */
    public static $roles = [
        'team_admin' => [
            'name' => 'Admin',
            'permissions' => [
                'view team dashboard',
                'manage team subscription',
                'delete team',
                'delete users',
                'change user roles',
                'add users',
            ]
        ],

        'team_member' => [
            'name' => 'Member',
            'permissions' => [
                'view team dashboard',
            ]
        ]
    ];
}
