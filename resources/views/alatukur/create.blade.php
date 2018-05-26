@extends('layouts.app')


@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">{{-- panel --}}
              <div class="panel-heading">Tambah UTTP </div>

{{-- {{dd(Auth::guard('web')->user('attributes')->id) }} --}}
{{-- {{dd(Auth::guard('web')->user('attributes')->name) }} --}}
              <div class="panel-body">{{-- -body--}}
                <form action="{{ route('alatukur.store') }}" method="post">
                  {{ csrf_field() }}
                  {{-- {{ Form::hidden('invisible', 'secret') }} --}}
                  <input type="hidden" name="id_user" value="{{Auth::guard('web')->user('attributes')->id}}">
                  <div class="form-group">
                    <label for="">Jenis UTTP</label>
                    <select required xonchange="uttpList(this.value);" class="form-control" name="id_jenisuttp" id="id_jenisuttp">
                      <option value="">=== Pilih Jenis Uttp ===</option>
                      @foreach ($jenisuttps as $jenisuttp)
                        <option {{ old('id_jenisuttp')==$jenisuttp->id?'selected':'' }} value="{{$jenisuttp->id}}">{{$jenisuttp->nama}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">UTTP</label>
                    <select required class="form-control" name="id_uttp" id="id_uttp">
                      <option value="">=== Pilih Jenis UTTP dahulu ===</option>
                      {{-- @foreach ($uttps as $uttp) --}}
                        {{-- <option value="{{$uttp->id}}">{{$uttp->nama}}</option> --}}
                      {{-- @endforeach --}}
                    </select>
                  </div>

                  <div  style="display:none;" class="form-group nonspbu has-feedback{{ $errors->has('kapasitas')?'has-error':''}}">
                    <label for="">Kapasitas</label>
                    <input class="form-control" type="text" name="kapasitas" placeholder="kapasitas alatukur" value="{{old('kapasitas')}}">
                    @if ($errors->has('kapasitas'))
                      <span class="help-block text-white label-danger">
                        <p>{{$errors->first('kapasitas')}}</p>
                      </span>
                    @endif
                  </div>
                  
                  <div  style="display:none;" class="form-group nonspbu">
                    <label for="">Satuan Pengukuran (UoM)</label>
                    <select class="form-control" name="id_uom">
                      <option value="">=== Pilih Uom ===</option>
                      @foreach ($uoms as $uom)
                        <option value="{{$uom->id}}">{{$uom->nama}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div style="display:none;" class="form-group  nonspbu">
                    <label for="">Merk</label>
                    <select class="form-control" name="id_merk">
                      <option value="" >=== Pilih Jenis Merk ===</option>
                      @foreach ($merks as $merk)
                        <option value="{{$merk->id}}">{{$merk->nama}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div  style="display:none;" class="form-group  nonspbu has-feedback{{ $errors->has('tipe')?'has-error':''}}">
                    <label for="">Tipe</label>
                    <input class="form-control" type="text" name="tipe" placeholder="tipe alatukur" value="{{old('tipe')}}">
                    @if ($errors->has('tipe'))
                      <span class="help-block text-white label-danger">
                        <p>{{$errors->first('tipe')}}</p>
                      </span>
                    @endif
                  </div>

                  <div  style="display:none;" class="form-group nonspbu has-feedback{{ $errors->has('no_seri')?'has-error':''}}">
                    <label for="">No. Seri</label>
                    <input class="form-control" type="text" name="no_seri" placeholder="no seri" value="{{old('no_seri')}}">
                    @if ($errors->has('no_seri'))
                      <span class="help-block text-white label-danger">
                        <p>{{$errors->first('no_seri')}}</p>
                      </span>
                    @endif
                  </div>

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
