@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-12 ">
        {{-- <div class="col-md-8 col-md-offset-2"> --}}
          <p>Tera Ulang non SPBU</p>
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No Agenda</th>
                <th>UTTP</th>
                <th>Kapasitas</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>No Seri</th>
                <th>Perusahaan</th>
                <th>Rekanan</th>
                <th>Tgl Tera</th>
                <th>Tgl Expired</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
{{-- {{  dd($teranonspbus[0])}} --}}
            <tbody>
              @foreach ($teranonspbus as $teranonspbu)
              <tr>
                <td>{{$teranonspbu->no_agenda}}</td>
                <td>{{$teranonspbu->uttp}}</td>
                <td>{{$teranonspbu->kapasitas}}</td>
                <td>{{$teranonspbu->merk}}</td>
                <td>{{$teranonspbu->tipe}}</td>
                <td>{{$teranonspbu->no_seri}}</td>
                <td>{{$teranonspbu->perusahaan}} </td>
                <td>{{$teranonspbu->rekanan}} </td>
                <td>{{$teranonspbu->tgl_tera}}</td>
                <td>{{$teranonspbu->tgl_expired}}</td>
                <td>
                  @if ($teranonspbu->status==0)
                    <label class="label label-default">New</label>
                  @else
                    <label class="label label-success">Done</label>
                  @endif
                </td>
                <td>
                  {{-- @if ($teranonspbu->status==0) --}}
                    <a href="{{route('teranonspbu.edit',$teranonspbu->id_pengajuantera)}}" class="btn btn-sm btn-info">
                      Ubah
                    </a>
                    {{-- <form action="{{ route('teranonspbu.destroy',$teranonspbu->id) }}"  method="post"> --}}
                      {{-- @csrf --}}
                      {{-- @method('delete') --}}
                      {{-- {{ csrf_field() }} --}}
                      {{-- {{ method_field('DELETE') }} --}}
                      {{-- <button type="submit" class="btn btn-sm btn-danger"> --}}
                        {{-- <i class="glyphicon glyphicon-remove"></i> --}}
                        {{-- Hapus --}}
                      {{-- </button> --}}
                  {{-- @endif --}}

                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

          {{ $teranonspbus->render()}}
        </div>
      </div>
  </div>

@endsection
