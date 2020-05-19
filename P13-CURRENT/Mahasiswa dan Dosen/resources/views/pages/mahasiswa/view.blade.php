@extends('layout.default')

@section('title', 'List Mahasiswa')

@section('content')
    <div class="bg-indigo-700 text-white py-4 sm:px-4 flex flex-col sm:flex-row">
        <div class='w-100 sm:w-1/2 sm:inline-block'>
            <h1 class='text-2xl sm:p-0 p-2'>List Mahasiswa</h1>
        </div>
        <div class='w-100 sm:w-1/2 text-right'>
            <div
                class="
                    p-2
                    bg-indigo-600
                    items-center
                    text-indigo-100
                    leading-none
                    sm:rounded-full
                    flex
                    sm:inline-flex
                "
            >
                <a
                    href='{{ route('student.create') }}'
                    class="
                        font-semibold
                        ml-1
                        mr-2
                        text-left
                        flex-auto
                        hover:shadow-2xl
                    "
                >
                    Tambah Data Mahasiswa
                </a>

                <!-- icon -->
                <svg
                    class="fill-current opacity-75 h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                        <path
                            d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"
                        />
                </svg>
            </div>
        </div>
    </div>

    <div class='px-4 py-2'>
        <table width=100%>
            <thead>
                <tr>
                    <th class="px-4 py-2">NPM</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">jenis Kelamin</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($student_data)
                    @foreach ($student_data as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row['npm'] }}</td>
                            <td class="border px-4 py-2">{{ $row['name'] }}</td>
                            <td class="border px-4 py-2">{{ $row['gender'] }}</td>
                            <td class="px-4 py-2">
                                @component('components.button')
                                    @slot('href', route('student.edit', $row['id']))
                                    @slot('name', 'Edit')
                                @endcomponent
                                @component('components.button')
                                    @slot('href', route('student.destroy', $row['id']))
                                    @slot('color', 'red')
                                    @slot('name', 'Hapus')
                                    @slot('method', 'POST')
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
