@extends('layouts.dashboard')
@section('content')
    @if (Auth()->user()->hasRole('admin'))
    {{-- memnuculkan baris khusus admin --}}
    @elseif (Auth()->user()->hasRole('wakil kurikulum'))
    {{-- baris kode khusus wakur --}}
    @elseif (Auth()->user()->hasRole('guru mapel'))
    {{-- baris kode khusus guru mapel --}}
    @elseif (Auth()->user()->hasRole('guru piket'))
    {{-- baris kode khusus guru piket --}}
    @endif
@endsection