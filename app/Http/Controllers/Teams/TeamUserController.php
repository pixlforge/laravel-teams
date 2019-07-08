<?php

namespace App\Http\Controllers\Teams;

use App\Models\User;
use App\Teams\Roles;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamUserController extends Controller
{
    /**
     * TeamUserController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->middleware(['in_team:' . $request->team])
            ->except(['store']);

        $this->middleware(['permission:add users,' . $request->team])
            ->only(['store']);

        $this->middleware(['permission:delete users,' . $request->team])
            ->only(['remove', 'destroy']);
    }

    /**
     * Undocumented function
     *
     * @param Team $team
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Team $team)
    {
        $team->load('users');

        return view('teams.users.index', compact('team'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Team $team
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Team $team)
    {
        $request->validate([
            'email' => 'required|exists:users,email'
        ]);

        abort_if($team->hasReachedMemberLimit(), 403, "Your team is full.");

        $team->users()->syncWithoutDetaching(
            $user = User::where('email', $request->email)->first()
        );

        $user->attachRole(Roles::$roleWhenJoiningTeam, $team->id);

        return back();
    }

    /**
     * Show the user delete confirmation view.
     *
     * @param Team $team
     * @param User $user
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function remove(Team $team, User $user)
    {
        $this->permissionToDelete($team, $user);

        return view('teams.users.delete', compact('team', 'user'));
    }

    /**
     * Remove a user from a team.
     *
     * @param Team $team
     * @param User $user
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Team $team, User $user)
    {
        $this->permissionToDelete($team, $user);

        $team->users()->detach($user);

        $user->detachRoles([], $team->id);

        return redirect(route('teams.users.index', $team));
    }

    /**
     * Checks if user can be removed from the team.
     *
     * @param Team $team
     * @param User $user
     * @return void
     */
    protected function permissionToDelete(Team $team, User $user)
    {
        $team->hasUser($user);

        abort_if($user->isOnlyAdminInTeam($team), 403, "A team needs at least one admin.");

        abort_if($team->users->count() === 1, 403, "A team needs to have at lease one user.");
    }
}
