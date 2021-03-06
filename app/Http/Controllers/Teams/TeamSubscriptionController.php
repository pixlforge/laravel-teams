<?php

namespace App\Http\Controllers\Teams;

use App\Models\Plan;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamSubscriptionController extends Controller
{
    /**
     * TeamSubscriptionController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->middleware(['permission:manage team subscription,' . $request->team]);
    }
    
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
            'token' => 'required',
            'plan' => 'required|exists:plans,id',
        ]);

        $plan = Plan::find($request->plan);

        $team->newSubscription('main', $plan->provider_id)
            ->create($request->token);

        return back();
    }
}
