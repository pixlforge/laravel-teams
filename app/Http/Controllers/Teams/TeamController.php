<?php

namespace App\Http\Controllers\Teams;

use App\Teams\Roles;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(Request $request)
    {
        $teams = $request->user()->teams;

        return view('teams.index', compact('teams'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user = $request->user();

        $team = $user->teams()->create($request->only('name'));

        $user->attachRole(Roles::$roleWhenCreatingTeam, $team->id);

        return redirect(route('teams.index'));
    }

    /**
     * Undocumented function
     *
     * @param Team $team
     * @return void
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect(route('teams.index'));
    }
}
