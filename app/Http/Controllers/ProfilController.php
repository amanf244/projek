<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function myprofile()
   {
    return view('admin.v_profil');
   }
   public function editprofil(Request $request)
   {
    return view('admin.v_editprofil', [
        'user' => $request->user()
    ]);
   }
   public function updateprofil(Request $request)
{
    if (Request()->foto_admin <> "") {
    $file = $request->foto_admin;
    $fileName =$request->email.'.'.$file->extension();
    $file->move(public_path('foto_admin'),$fileName);
    $request->user()->update([
    'name'=>$request->name,
    'email'=>$request->email,
    'foto_admin'=>$fileName,
    'password' => Hash::make($request->password),
    ]);
}else {
    $request->user()->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'password' => Hash::make($request->password),
        ]);
}

    return redirect()->route('dashboard.profil');
}
}
