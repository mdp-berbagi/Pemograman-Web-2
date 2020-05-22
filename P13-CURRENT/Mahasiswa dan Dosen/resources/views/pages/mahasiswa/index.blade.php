@extends('layout.default')

@section('title', 'List Mahasiswa')

@section('content')
    @component('components.pageheader')
        @slot('title', 'List Mahasiswa')
        @slot('extends')
            @component('components.button')
                @slot('href', route('student.create') )
                @slot('name', 'Tambah Data Mahasiswa')
            @endcomponent
        @endslot
    @endcomponent

    @if(session('msg'))
        <div class="max-w rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    {{ session('msg')['title'] }}
                </div>
                <p class="text-gray-700 text-base">
                    {{ session('msg')['desc'] }}
                </p>
            </div>
        </div>
    @endif

    <div class='container mx-auto px-4 py-2'>
        <table>
            <thead>
                <tr>
                    <th class="px-4 py-2">NPM</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jenis Kelamin</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($student_data)
                    @foreach ($student_data as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row->npm }}</td>
                            <td class="border px-4 py-2">{{ $row->name }}</td>
                            <td class="border px-4 py-2">{{ $row->gender }}</td>
                            <td class="px-4 py-2">
                                @component('components.button')
                                    @slot('href', route('student.edit', $row->id))
                                    @slot('name', 'Edit')
                                @endcomponent
                                 @component('components.button')
                                    @slot('href', route('student.show', $row->id))
                                    @slot('name', 'Detail')
                                @endcomponent
                                @component('components.button')
                                    @slot('href', route('student.destroy', $row->id))
                                    @slot('color', 'red')
                                    @slot('name', 'Hapus')
                                    @slot('method', 'DELETE')
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
