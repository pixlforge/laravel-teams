<?php

namespace App\Http\Controllers\Teams;

use App\Teams\Roles;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * TeamController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->middleware(['in_team:' . $request->team])
            ->except(['index', 'store']);
        
        $this->middleware(['permission:delete team,' . $request->team])
            ->only(['delete', 'destroy']);
    }
    
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
     * Show the team delete confirmation view.
     *
     * @param Team $team
     * @return void
     */
    public function delete(Team $team)
    {
        return view('teams.delete', compact('team'));
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
