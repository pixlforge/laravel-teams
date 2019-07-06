<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamDeleteConfirmationController extends Controller
{
    /**
     * TeamDeleteConfirmationController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        return $this->middleware(['permission:delete team,' . $request->team]);
    }

    /**
     * Undocumented function
     *
     * @param Team $team
     * @return void
     */
    public function __invoke(Team $team)
    {
        return view('teams.delete.confirmation', compact('team'));
    }
}
