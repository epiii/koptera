@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <p><a href="{{route('pengajuantera.create')}}" class=" btn btn-sm btn-info">Tambah</a></p>

          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>UTTP</th>
                <th>Kapasitas</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Tgl Tera</th>
                <th>Tgl Expired</th>
                <th>No Urut Agenda</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
{{-- {{  dd($pengajuanteras[0])}} --}}
            <tbody>
              @foreach ($pengajuanteras as $pengajuantera)
              <tr>
                <td>{{$pengajuantera->uttp}}</td>
                <td>{{$pengajuantera->kapasitas}} {{$pengajuantera->uom}}</td>
                <td>{{$pengajuantera->merk}} </td>
                <td>{{$pengajuantera->tipe}} </td>
                <td>{{$pengajuantera->tgl_tera}}</td>
                <td>{{$pengajuantera->tgl_expired}}</td>
                <td>
                  <label class="label label-info">
                    {{str_pad($pengajuantera->no_agenda, 4, "0",STR_PAD_LEFT)}}
                  </label>
                </td>
                <td>
                  @if ($pengajuantera->status==0)
                    <label class="label label-default">Pending</label>
                  @else
                    <label class="label label-success">Done</label>
                  @endif
                </td>
                <td>
                  @if ($pengajuantera->status==0)
                    {{-- <a href="{{route('pengajuantera.edit',$pengajuantera->id)}}" class="btn btn-sm btn-info">
                      Ubah
                    </a> --}}
                    <form action="{{ route('pengajuantera.destroy',$pengajuantera->id) }}"  method="post">
                      {{-- @csrf --}}
                      {{-- @method('delete') --}}
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-sm btn-danger">
                        {{-- <i class="glyphicon glyphicon-remove"></i> --}}
                        Hapus
                      </button>
                  @endif

                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

          {{ $pengajuanteras->render()}}
        </div>
      </div>
  </div>

@endsection
