<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;
use DataTables;

use App\Http\Requests\ProgramRequest;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme_programs/template_index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
        $query = Program::select([
            'id',
            'name',
            'tarikh_mula',
            'tarikh_akhir',
            'lokasi',
            'jumlah_peserta'
        ]);

        return DataTables::of($query)
        ->addColumn('tindakan', function($item) {
            return view('theme_programs/template_tindakan', compact('item'));
        })
        ->rawColumns(['tindakan'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme_programs/template_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        $request->validated();

        $data = $request->all();

        Program::create($data);

        return redirect()->route('programs.index')->with('alert-success', 'Rekod telah berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('theme_programs/template_edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, Program $program)
    {
        $request->validated();

        $data = $request->all();

        $program->update($data);

        return redirect()->back()->with('alert-success', 'Rekod telah berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->back()->with('alert-success', 'Rekod telah berjaya dihapuskan!');
    }
}
