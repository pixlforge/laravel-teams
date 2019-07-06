<?php

namespace App\Http\Controllers\Teams;

use App\Models\User;
use App\Teams\Roles;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamUserController extends Controller
{
    public function __construct(Request $request)
    {
        return $this->middleware(['permission:add users,' . $request->team])
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

        $team->users()->syncWithoutDetaching(
            $user = User::where('email', $request->email)->first()
        );

        $user->attachRole(Roles::$roleWhenJoiningTeam, $team->id);

        return back();
    }
}
