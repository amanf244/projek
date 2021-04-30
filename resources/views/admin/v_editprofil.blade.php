@extends('layouts.master')
@section('title', 'Edit Profil')
@section('konten')
<form action="{{ Route('dashboard.update.profil') }}" method="POST"  enctype="multipart/form-data">

    @csrf
    <div class="content">
      <div class="row-sm">
        <div class="col-sm-6">
          <div class="form-group">
          </div>
          <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input name="email" class="form-control" value="{{ old('email', $user->email) }}" readonly>
              <div class="text-danger">
        @error ('email')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            @if (Auth::user()->foto_admin == null)
          <img class="profile-user-img img-fluid img-circle"
          {{-- src="{{ asset('template') }}/dist/img/user2-160x160.jpg" --}}
             src="{{ asset('foto_admin/kosong.png') }}"
             alt="User profile picture">
         @else
        <img class="profile-user-img img-fluid img-circle"
             src="{{ url('foto_admin/'.Auth::user()->foto_admin) }}"
             alt="User profile picture">
             @endif
            <label for="foto">{{ __('Foto') }}</label>
            <input name="foto_admin" type="file" class="form-control" value="{{ old('foto_admin', $user->foto_admin) }}">
              <div class="text-danger">
        @error ('foto')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input name="name" class="form-control" value="{{ old('name', $user->name) }}">
              <div class="text-danger">
        @error ('name')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input name="password" class="form-control" }}>
              <div class="text-danger">
        @error ('password')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm">SIMPAN</button>
          </div>

        </div>
      </div>
    </div>
  </form>
@endsection
