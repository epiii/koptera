@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <p>Tera Ulang SPBU</p>
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No Agenda</th>
                <th>UTTP</th>
                <th>Perusahaan</th>
                <th>Rekanan</th>
                <th>Tgl Tera</th>
                <th>Tgl Expired</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
{{-- {{  dd($teraspbus[0])}} --}}
            <tbody>
              @foreach ($teraspbus as $teraspbu)
              <tr>
                <td>{{$teraspbu->no_agenda}}</td>
                <td>{{$teraspbu->uttp}}</td>
                <td>{{$teraspbu->perusahaan}} </td>
                <td>{{$teraspbu->rekanan}} </td>
                <td>{{$teraspbu->tgl_tera}}</td>
                <td>{{$teraspbu->tgl_expired}}</td>
                <td>
                  @if ($teraspbu->status==0)
                    <label class="label label-default">New</label>
                  @else
                    <label class="label label-success">Done</label>
                  @endif
                </td>
                <td>
                  {{-- @if ($teraspbu->status==0) --}}
                    <a href="{{route('teraspbu.edit',$teraspbu->id_pengajuantera)}}" class="btn btn-sm btn-info">
                      Ubah
                    </a>
                    {{-- <form action="{{ route('teraspbu.destroy',$teraspbu->id) }}"  method="post"> --}}
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

          {{ $teraspbus->render()}}
        </div>
      </div>
  </div>

@endsection
