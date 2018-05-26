@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          {{-- @foreach ($perusahaans as $i =>$v) --}}
          {{-- {{dd(is_null($perusahaan->id_perusahaan))}} --}}
          {{-- {{dd(Auth::user()->id)}} --}}
          {{-- {{dd(Auth::guard()->user())}} --}}
{{redirect()->route('perusahaan.create')}}
          // {{-- {{dd(is_null($perusahaan->id_perusahaan))}} --}}
          <table class="table table- table-hover ">
              <tr class="info">
                <th colspan="2">Akun</th>
              </tr>
              <tr>
                <td>Nama</td>
                <td>: {{Auth::guard('web')->user('attributes')->name}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>: {{Auth::guard('web')->user('attributes')->email}}</td>
              </tr>
              <tr class="info">
                <th colspan="2">Biodata</th>
              </tr>
              <tr>
                <td>Perusahaan</td>
                <td>: {{$perusahaan->perusahaan}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>: {{$perusahaan->alamat}}</td>
              </tr>
              <tr>
                <td colspan="2">
                  <a href="{{route('perusahaan.edit',$perusahaan->id_perusahaan) }}" class="pull-right btn btn-sm btn-info">
                    Ubah
                  </a>
                </td>
              </tr>
          </table>

        </div>
      </div>
  </div>

@endsection
