<?php

namespace App\Http\Controllers;

use App\Peserta;
use App\Program;
use App\User;

use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\PesertaRequest;
use App\Mail\PendaftaranProgram;
use Mail;

use App\Notifications\PendaftaranPeserta;

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
            'is_vegetarian'
        ]);

        return DataTables::of($query)
        ->addColumn('tindakan', function($item) {
            
            $programs = Program::pluck('name', 'id');
            return view('theme_peserta.template_tindakan', compact('item', 'programs'));
        })
        ->addIndexColumn()
        ->rawColumns(['tindakan', 'is_vegetarian'])
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

        $peserta = Peserta::create($data);

        # Hantar email notifikasi pendaftaran program kepada peserta
        Mail::to($peserta->email)->send(new PendaftaranProgram($peserta));

        # Hantar notifikasi pendaftaran peserta kepada semua admin
        $admins = User::where('role', '=', 'admin')->get();

        $data = [
            'nama_peserta' => $peserta->nama,
            'email_peserta' => $peserta->email,
            'nama_program' => $peserta->program->name,
            'tarikh_mula' => $peserta->program->tarikh_mula,
            'tarikh_akhir' => $peserta->program->tarikh_akhir,
            'lokasi' => $peserta->program->lokasi,
            'bantuan_phone' => '0123456789',
            'bantuan_email' => 'support@aturcara.com',
            'pengurusan' => 'Pihak Pengurusan KKMM',
            'nama_aplikasi' => config('app.name'),
            'link_aplikasi' => env('APP_URL')
        ];

        foreach ( $admins as $user )
        {
            $user->notify(new PendaftaranPeserta($data));
        }
        

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
