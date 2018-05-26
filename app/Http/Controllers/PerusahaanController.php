<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use Auth;
use Illuminate\Support\Facades\DB;

class PerusahaanController extends Controller{
  // read
  public function index()  {
    // $perusahaans=Perusahaan::latest()->paginate(env(PER_PAGE));
    // $perusahaans = Perusahaan::all();

    $perusahaan = DB::table('users')
                ->select('perusahaans.id as id_perusahaan',
                        'perusahaans.nama as perusahaan',
                        'users.name as nama',
                        'users.id as id_user',
                        'users.email',
                        'perusahaans.alamat'
                        )
                ->leftJoin('perusahaans', 'perusahaans.id_user', '=', 'users.id')
                ->where('users.id','=',Auth::user()->id)
                ->get()
                ->first();
    // dd(is_null($perusahaan->id_perusahaan));
    if (is_null($perusahaan->id_perusahaan) ) {
      return redirect()->route('perusahaan.create')->header('Cache-Control', 'no-store, no-cache, must-revalidate');
      // return view('perusahaan.create')->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }else{
      return view('perusahaan.index',compact('perusahaan'));
    }
  }

  // create : form
  public function create(){
    return view('perusahaan.create');
  }

  // create : process
  public function store(){
      $this->validate(request(),[
        'perusahaan'=>'required',
        'alamat'=>'required',
      ]);
      Perusahaan::create([
        'nama'=>request('perusahaan'),
        'id_user'=>Auth::user()->id,
        'alamat'=>request('alamat')
      ]);
      // return redirect()->route('perusahaan.index')->with('success','data has been added');
      return redirect()->route('perusahaan.index')->withSuccess('data has been added');
  }

  // edit : form
  // public function edit($id)  {
  public function edit(Perusahaan $perusahaan)  {
    // $perusahaan = Perusahaan::find($id);
    // dd($perusahaan);
    return view('perusahaan.edit',compact('perusahaan'));
  }

  // edit : process
  // public function update($id)  {
  public function update(Perusahaan $perusahaan)  {
    // $perusahaan=Perusahaan::find($id);
    $this->validate(request(),[
      'nama'=>'required',
      'alamat'=>'required',
    ]);
  $perusahaan->update([
      'nama'=>request('nama'),
      'alamat'=>request('alamat'),
    ]);
    return redirect()->route('perusahaan.index')->withInfo('data has been edited');
    // return redirect()->route('perusahaan.index')->with('info','data has been edited');
  }

  public function destroy(Perusahaan $perusahaan)  {
    $perusahaan->delete();
    return redirect()->route('perusahaan.index')->withDanger('data has been deleted');
    // return redirect()->route('perusahaan.index')->with('danger','data has been deleted');
  }
}
