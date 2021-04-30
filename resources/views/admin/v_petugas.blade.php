@extends('layouts.master')
@section('title','Data Petugas')
@section('konten')
<livewire:petugas-post>
<livewire:petugas-list>
    {{-- @include('auth.register') --}}
@endsection
