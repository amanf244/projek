@extends('layouts.master')
@section('title', 'Profil')
@section('konten')
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
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
      </div>

      <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

      <p class="text-muted text-center">Software Engineer</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
          <b>email</b> <a class="float-right">{{ Auth::user()->email }}</a>
        </li>
        <li class="list-group-item">
          <b>Dibuat pada</b> <a class="float-right">{{ Auth::user()->created_at->diffForHumans() }}</a>
        </li>
        <li class="list-group-item">
          <b>Diubah pada</b> <a class="float-right">{{ Auth::user()->updated_at->diffForHumans() }}</a>
        </li>
      </ul>

      <a href="{{ Route('dashbord.edit.profil') }}" class="btn btn-primary btn-block"><b>{{ __('Edit') }}</b></a>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
