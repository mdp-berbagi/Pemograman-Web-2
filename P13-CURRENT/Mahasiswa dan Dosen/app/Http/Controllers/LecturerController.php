<?php

namespace App\Http\Controllers;

use App\Lecturer;
use Illuminate\Http\Request;

/**
 * Controller untuk Dosen
 *
 */
class LecturerController extends Controller
{
    /**
     * Menampilkan list dosen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dosen.view');
    }

    /**
     * Menampilkan form pembuatan baru
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Proses input dari form dalam pembuatan data dosen baru
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Menampilkan data dosen tertentu
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Menampilkan form edit data dosen
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Proses form edit data dosen
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Menghapus beberapa data dosen
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
