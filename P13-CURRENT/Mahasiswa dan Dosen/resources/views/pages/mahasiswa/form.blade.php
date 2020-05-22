@extends('layout.default')

@section('title', 'Form Mahasiswa')

@php
    $is_update = isset($student)
@endphp

@section('content')
    @component('components.pageheader')
        @slot('color', 'blue')
        @slot('title', $is_update ? "Edit Mahasiswa - {$student->npm}" : "Tambah Mahasiswa")
    @endcomponent
    <div class='container mx-auto'>
        <form action="{{ $is_update ? route('student.update', $student->id) : route('student.store') }}" method="POST">
            @csrf
            @method($is_update ? 'PUT' : 'POST')

            <div class="flex flex-wrap  p-4">
                <div class='p-2'>
                    @component('components.input')
                        @slot('attrs', [
                            'name' => 'name',
                            'label' => 'Nama Lengkap',
                            'type' => 'text',
                            'required' => true,
                            'placeholder' => 'Namanya siapa ?',
                            'value' => ($student->name ?? '')
                        ])
                    @endcomponent
                </div>

                <div class='p-2'>
                    @component('components.input')
                        @slot('attrs', [
                            'name' => 'gender',
                            'label' => 'Jenis Kelamin',
                            'type' => 'select',
                            'placeholder' => 'Pria atau wanita ?',
                            'required'=> true,
                            'value' => ($student->gender ?? '')
                        ])

                        @slot('options', [
                            '0' => 'Pria',
                            '1' => 'Wanita'
                        ])
                    @endcomponent
                </div>

                <div class='p-2'>
                    @component('components.input')
                        @slot('attrs', [
                            'name' => 'birthday',
                            'label' => 'Tanggal Lahinya',
                            'type' => 'date',
                            'required' => true,
                            'value' => ($student->birthday ?? '')
                        ])
                    @endcomponent
                </div>

                <div class='p-2'>
                    @component('components.input')
                        @slot('attrs', [
                            'name' => 'start_study',
                            'label' => 'Mulai Kuliah',
                            'type' => 'date',
                            'required' => true,
                            'value' => ($student->start_study ?? '')
                        ])
                    @endcomponent
                </div>

                <div class='p-2'>
                    @component('components.input')
                        @slot('attrs', [
                            'name' => 'major_id',
                            'label' => 'Jurusan',
                            'type' => 'select',
                            'placeholder' => 'TI atau SI ?',
                            'required'=> true,
                            'value' => ($student->major_id ?? '')
                        ])

                        @slot('options', [
                            '24' => 'Sistem Informasi',
                            '25' => 'Teknik Informatika'
                        ])
                    @endcomponent
                </div>

                <div class='p-2'>
                    @component('components.input')
                        @slot('attrs', [
                            'name' => 'register_id',
                            'label' => 'Nomor Urut',
                            'type' => 'number',
                            'min' => '1',
                            'required'=> true,
                            'value' => ($student->register_id ?? '')
                        ]);
                    @endcomponent
                </div>
            </div>

            <div class='sm:pl-5'>
                @component('components.button')
                    @slot('name', $is_update ? 'Edit Data' : 'Buat Data Baru')
                @endcomponent

                @component('components.button')
                    @slot('name', 'Kembali')
                    @slot('color', 'red')
                    @slot('href', 'javascript: window.history.go(-1);')
                @endcomponent
            </div>
        </form>
    </div>
@endsection
