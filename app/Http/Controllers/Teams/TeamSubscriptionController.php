<?php

namespace App\Http\Controllers\Teams;

use App\Models\Plan;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamSubscriptionController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Team $team
     * @return void
     */
    public function index(Team $team)
    {
        $plans = Plan::teams()->get();

        return view('teams.subscriptions.index', compact('team', 'plans'));
    }
}
