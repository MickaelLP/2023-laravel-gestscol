<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        // $formations = Formation::all();
        // return view('formation.index', ['formations' => $formations]);
        return view('formation.index');
    }

    public function show(Formation $formation)
    {
        return view('formation.show', ['formation' => $formation]);
    }
}
