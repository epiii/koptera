<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merk;

class MerkController extends Controller{

  // read
  public function index()  {
    // $merks=Merk::latest()->paginate(env(PER_PAGE));
    $merks=Merk::latest()->paginate(5);
    // dd(Merk::latest()->sortBy('nama'));
    return view('merk.index',compact('merks'));
  }

  // create : form
  public function create(){
    return view('merk.create');
  }

  // create : process
  public function store(){
      $this->validate(request(),[
        'nama'=>'required',
      ]);
      Merk::create([
        'nama'=>request('nama'),
      ]);
      return redirect()->route('merk.index')->withSuccess('data has been added');
  }

  // edit : form
  // public function edit($id)  {
  public function edit(Merk $merk)  {
    // $merk = Merk::find($id);
    return view('merk.edit',compact('merk'));
  }

  // edit : process
  // public function update($id)  {
  public function update(Merk $merk)  {
    // $merk=Merk::find($id);
    $this->validate(request(),[
      'nama'=>'required',
    ]);
    $merk->update([
      'nama'=>request('nama'),
    ]);
    return redirect()->route('merk.index')->withInfo('data has been edited');
    // return redirect()->route('merk.index')->with('info','data has been edited');
  }

  public function destroy(Merk $merk)  {
    $merk->delete();
    return redirect()->route('merk.index')->withDanger('data has been deleted');
    // return redirect()->route('merk.index')->with('danger','data has been deleted');
  }
}
