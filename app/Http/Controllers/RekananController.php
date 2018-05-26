<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekanan;

class RekananController extends Controller{

  // read
  public function index()  {
    // $rekanans=Rekanan::latest()->paginate(env(PER_PAGE));
    // $rekanans = Rekanan::all();
    $rekanans=Rekanan::latest()->paginate(5);
    return view('rekanan.index',compact('rekanans'));
  }

  // create : form
  public function create(){
    return view('rekanan.create');
  }

  // create : process
  public function store(){
      $this->validate(request(),[
        'nama'=>'required',
        'alamat'=>'required',
      ]);
      Rekanan::create([
        'nama'=>request('nama'),
        'alamat'=>request('alamat')
      ]);
      return redirect()->route('rekanan.index')->withSuccess('data has been added');
      // return redirect()->route('rekanan.index')->with('success','data has been added');
  }

  // edit : form
  // public function edit($id)  {
  public function edit(Rekanan $rekanan)  {
    // $rekanan = Rekanan::find($id);
    return view('rekanan.edit',compact('rekanan'));
  }

  // edit : process
  // public function update($id)  {
  public function update(Rekanan $rekanan)  {
    // $rekanan=Rekanan::find($id);
    $this->validate(request(),[
      'nama'=>'required',
      'alamat'=>'required',
    ]);
  $rekanan->update([
      'nama'=>request('nama'),
      'alamat'=>request('alamat'),
    ]);
    return redirect()->route('rekanan.index')->withInfo('data has been edited');
    // return redirect()->route('rekanan.index')->with('info','data has been edited');
  }

  public function destroy(Rekanan $rekanan)  {
    $rekanan->delete();
    return redirect()->route('rekanan.index')->withDanger('data has been deleted');
    // return redirect()->route('rekanan.index')->with('danger','data has been deleted');
  }
}
