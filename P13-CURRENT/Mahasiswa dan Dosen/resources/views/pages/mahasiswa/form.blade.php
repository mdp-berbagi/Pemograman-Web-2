@extends('layout.default')

@section('title', 'Form Mahasiswa')

@section('content')
    <div>
        <form action="{{ route('student.store') }}" class="content-inputs">
            <div>
                <vs-input />
            </div>
        </form>
    </div>
@endsection
