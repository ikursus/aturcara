<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use DB;
use DataTables;
use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme_users/template_index');
    }

    public function datatables()
    {
        $query = User::select([
            'id',
            'name',
            'email',
            'role',
            'jabatan',
            'jawatan'
        ]);

        return DataTables::of($query)
        ->addColumn('tindakan', function($item) {
            return view('theme_users/template_tindakan', compact('item'));
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
        return view('theme_users/template_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        $request->validated();

        # Dapatkan semua data dari borang KECUALI password
        $data = $request->except('password');
        # Attachkan rekod password yang telah di-encrypt ke array $data
        $data['password'] = bcrypt($request->input('password'));
        # Simpan rekod ke dalam table users
        User::create($data);

        return redirect()
        ->route('users.index')
        ->with('alert-success', 'Rekod user baru berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('theme_users/template_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, User $user)
    {
        $request->validated();

        # Dapatkan semua data KECUALI password
        $data = $request->except('password');
        # Semak jika wujud field password dan field tersebut tidak kosong (yakni mengandungi data)
        if ($request->has('password') && !empty($request->input('password')))
        {
            $data['password'] = bcrypt( $request->input('password') );
        }
        # Kemaskini data ke dalam table user
        $user->update($data);
        # Redirect pengguna ke halaman sebelumnya
        return redirect()->back()->with('alert-success', 'Rekod telah berjaya dikemaskini!');
        # return redirect()->route('users.index');
        # return redirect()->away('https://google.com');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
        ->back()
        ->with('alert-success', 'Rekod berjaya dihapuskan!');
    }

    // Method @ Function untuk export rekod users
    public function export()
    {
        $file_name = date('Y-m-d');

        return Excel::download(new UsersExport, $file_name . '-users.xlsx');
    }
}
