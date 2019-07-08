<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamSwapSubscriptionController extends Controller
{
    /**
     * TeamSwapSubscriptionController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->middleware(['in_team:' . $request->team]);

        $this->middleware(['permission:manage team subscription,' . $request->team]);
    }

    /**
     * Store the new plan for the team.
     *
     * @param Team $team
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Team $team, Request $request)
    {
        $request->validate([
            'plan' => 'required|exists:plans,id',
        ]);

        $plan = Plan::find($request->plan);

        if (!$team->canDowngrade($plan)) {
            return back();
        }

        $team->currentSubscription()->swap($plan->provider_id);

        return back();
    }
}
