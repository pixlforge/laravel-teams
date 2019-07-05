<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamUserController extends Controller
{
    public function index(Team $team)
    {
        $team->load('users');

        return view('teams.users.index', compact('team'));
    }
}
