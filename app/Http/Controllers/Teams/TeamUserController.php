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
    }

    /**
     * Undocumented function
     *
     * @param Team $team
     * @return void
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
     * @return void
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
}
