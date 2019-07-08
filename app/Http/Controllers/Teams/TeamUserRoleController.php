<?php

namespace App\Http\Controllers\Teams;

use App\Models\User;
use App\Models\Team;
use App\Teams\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamUserRoleController extends Controller
{
    /**
     * TeamUserRoleController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->middleware(['permission:change user roles,' . $request->team])
            ->only(['edit', 'update']);
    }

    /**
     * Show the edit user role page.
     *
     * @param Team $team
     * @param User $user
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Team $team, User $user)
    {
        $this->permissionToChangeRole($team, $user);

        $roles = Roles::$roles;

        return view('teams.users.roles.edit', compact('team', 'user', 'roles'));
    }

    /**
     * Update a user's role for the given team.
     *
     * @param Team $team
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Team $team, User $user, Request $request)
    {
        $request->validate([
            'role' => 'required|exists:roles,name'
        ]);

        $this->permissionToChangeRole($team, $user);

        $user->syncRoles([$request->role], $team->id);

        return redirect(route('teams.users.index', $team));
    }

    /**
     * Checks if a user's role in a team may be changed.
     *
     * @param Team $team
     * @param User $user
     * @return void
     */
    protected function permissionToChangeRole(Team $team, User $user)
    {
        $team->hasUser($user);

        abort_if($user->isOnlyAdminInTeam($team), 403, "A team needs at least one admin.");
    }
}
