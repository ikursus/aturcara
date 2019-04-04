<?php

namespace App\Http\Controllers;

use App\Peserta;
use App\Program;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\PesertaRequest;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme_peserta/template_index');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
        $query = Peserta::with('program')
        ->select([
            'id',
            'program_id',
            'nama',
            'jabatan',
            'jawatan',
            'email',
            'status',
            'is_vegeterian'
        ]);

        return DataTables::of($query)
        ->addColumn('tindakan', function($item) {
            
            $programs = Program::pluck('name', 'id');
            return view('theme_peserta.template_tindakan', compact('item', 'programs'));
        })
        ->addIndexColumn()
        ->rawColumns(['tindakan', 'is_vegeterian'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::pluck('name', 'id');

        return view('theme_peserta.template_create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesertaRequest $request)
    {
        $request->validated();

        $data = $request->all();

        Peserta::create($data);

        return redirect()
        ->route('peserta.index')
        ->with('alert-success', 'Rekod berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $peserta)
    {
        $programs = Program::pluck('name', 'id');

        return view('theme_peserta/template_edit', compact('peserta', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(PesertaRequest $request, Peserta $peserta)
    {
        $request->validated();

        $data = $request->all();

        $peserta->update($data);

        return redirect()
        ->route('peserta.index')
        ->with('alert-success', 'Rekod berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()
        ->route('peserta.index')
        ->with('alert-success', 'Rekod berjaya dihapuskan!');
    }
}
