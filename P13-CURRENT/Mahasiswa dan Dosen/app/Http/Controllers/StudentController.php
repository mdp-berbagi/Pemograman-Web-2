<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_data = Student::all();

        return view("pages.mahasiswa.index", [
            'student_data' => $student_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.mahasiswa.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            "name" => "string",
            "gender" => "in:0,1",
            "birthday" => "date",
            "start_study" => "date",
            "major_id" => "exists:majors,number_code",
            "register_id" => "numeric"
        ]);

        $result = Student::create($input);

        return redirect()
            ->route('student.index')
            ->with('msg', [
                'title' => 'Mahasiswa Berhasil Dibuat !',
                'desc'  => "Sukses menambahkan {$result->name} dengan npm {$result->npm}"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view("pages.mahasiswa.form");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view("pages.mahasiswa.form", [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        return redirect()
            ->route('student.index')
            ->with('msg', [
                'title' => "Mahasiswa berhasil di pebaharui",
                'desc'  => "Mahasiswa bernama {$student->name} NPM {$student->npm} telah di perbaharui..."
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        return redirect()
            ->route('student.index')
            ->with('msg', [
                'title' => "Mahasiswa berhasil di hapus",
                'desc'  => "Mahasiswa bernama {$student->name} NPM {$student->npm} telah di hapus..."
            ]);
    }
}
