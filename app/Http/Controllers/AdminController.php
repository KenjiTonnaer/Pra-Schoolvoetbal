<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class AdminController extends Controller
{
    public function index()
    {

        $teams = Team::with('players')->get();

        return view('admin.index', compact('teams'));
    }

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('admin.index');
    }
}
