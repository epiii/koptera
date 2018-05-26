<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uom;

class UomController extends Controller{

  // read
  public function index()  {
    // $uoms=Uom::latest()->paginate(env(PER_PAGE));
    $uoms=Uom::latest()->paginate(5);
    // $uoms = Uom::all();
    return view('uom.index',compact('uoms'));
  }

  // create : form
  public function create(){
    return view('uom.create');
  }

  // create : process
  public function store(){
      $this->validate(request(),[
        'nama'=>'required',
        'keterangan'=>'required',
      ]);
      Uom::create([
        'nama'=>request('nama'),
        'keterangan'=>request('keterangan')
      ]);
      return redirect()->route('uom.index')->withSuccess('data has been added');
      // return redirect()->route('uom.index')->with('success','data has been added');
  }

  // edit : form
  // public function edit($id)  {
  public function edit(Uom $uom)  {
    // $uom = Uom::find($id);
    return view('uom.edit',compact('uom'));
  }

  // edit : process
  // public function update($id)  {
  public function update(Uom $uom)  {
    // $uom=Uom::find($id);
    $this->validate(request(),[
      'nama'=>'required',
      'keterangan'=>'required',
    ]);
  $uom->update([
      'nama'=>request('nama'),
      'keterangan'=>request('keterangan'),
    ]);
    return redirect()->route('uom.index')->withInfo('data has been edited');
    // return redirect()->route('uom.index')->with('info','data has been edited');
  }

  public function destroy(Uom $uom)  {
    $uom->delete();
    return redirect()->route('uom.index')->withDanger('data has been deleted');
    // return redirect()->route('uom.index')->with('danger','data has been deleted');
  }
}
