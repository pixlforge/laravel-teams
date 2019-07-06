<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team;
use App\Http\Controllers\Controller;

class TeamDeleteConfirmationController extends Controller
{
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
