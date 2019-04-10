<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;

class StatistikController extends Controller
{
    public function index()
    {
        $programs = Program::select('id')->get();

        foreach ( $programs as $program )
        {
            $data[] = $program->totalPeserta->count();
            $bgcolor[] = 'rgba('.rand(0,255).','.rand(0,255).','.rand(0,255).')';
        }

        $labels = Program::pluck('name');

        return view('theme_statistik/template_index', compact('labels', 'data', 'bgcolor'));
    }
}
