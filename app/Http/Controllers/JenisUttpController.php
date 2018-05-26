<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisUttp;

class JenisUttpController extends Controller{

  // read
  public function index()  {
    // $uoms = Uom::all();
    $jenisuttps=JenisUttp::latest()->paginate(5);
    return view('jenisuttp.index',compact('jenisuttps'));
  }

  // create : form
  public function create(){
    return view('jenisuttp.create');
  }

  // create : process
  public function store(){
      $this->validate(request(),[
        'nama'=>'required',
        'keterangan'=>'required',
      ]);
      JenisUttp::create([
        'nama'=>request('nama'),
        'keterangan'=>request('keterangan')
      ]);
      return redirect()->route('jenisuttp.index')->withSuccess('data has been added');
      // return redirect()->route('jenisuttp.index')->with('success','data has been added');
  }

  // edit : form
  // public function edit($id)  {
  public function edit(JenisUttp $jenisuttp)  {
    // $uom = Uom::find($id);
    return view('jenisuttp.edit',compact('jenisuttp'));
  }

  // edit : process
  // public function update($id)  {
  public function update(JenisUttp $jenisuttp)  {
    // $uom=Uom::find($id);
    $this->validate(request(),[
      'nama'=>'required',
      'keterangan'=>'required',
    ]);
  $jenisuttp->update([
      'nama'=>request('nama'),
      'keterangan'=>request('keterangan'),
    ]);
    return redirect()->route('jenisuttp.index')->withInfo('data has been edited');
    // return redirect()->route('jenisuttp.index')->with('info','data has been edited');
  }

  public function destroy(JenisUttp $jenisuttp)  {
    $jenisuttp->delete();
    return redirect()->route('jenisuttp.index')->withDanger('data has been deleted');
    // return redirect()->route('uom.index')->with('danger','data has been deleted');
  }
}
