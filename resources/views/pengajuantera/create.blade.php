@extends('layouts.app')


@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">{{-- panel --}}
              <div class="panel-heading">Tambah Pengajuan Tera </div>

              <div class="panel-body">{{-- -body--}}
                <form action="{{ route('pengajuantera.store') }}" method="post">
                  {{ csrf_field() }}

                  <input type="hidden" name="id_user" value="{{Auth::guard('web')->user('attributes')->id}}">
                  <div class="form-group">
                    <label for="">Alat Ukur</label>
                    <select required class="form-control" name="id_alatukur" id="id_alatukur">
                      <option value="">=== Pilih Alat Ukur ===</option>
                      @foreach ($alatukurs as $alatukur)
                        <option {{ old('id_alatukur')==$alatukur->id?'selected':'' }}
                          value="{{$alatukur->id}}">{{$alatukur->uttp}} |
                            {{$alatukur->kapasitas}} {{$alatukur->uom}} |
                            {{$alatukur->tipe}} |
                            {{$alatukur->no_seri}}
                          </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group has-feedback">
                    <label for="">No Agenda</label>
                    <input class="form-control" type="text" name="no_agenda" readonly value="{{$no_agenda}}">
                  </div>

                  {{-- <div class="form-group">
                    <label for="">Tanggal Tera ulang</label>
                    <input class="form-control" type="text" name="no_agenda" readonly value="">
                  </div>

                  <div class="form-group">
                    <label for="">Tanggal Expired</label>
                    <input class="form-control" type="text" name="tgl_expired" readonly value="">
                  </div> --}}


                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="save">
                  </div>
                </form>

              </div>
            </div>
        </div>
      </div>
    </div>

@endsection
