@extends('layouts.app')


@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">{{-- panel --}}
              <div class="panel-heading">Ubah Tera SPBU</div>

              <div class="panel-body">{{-- -body--}}
                <form action="{{ route('teraspbu.update',$teraspbu) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('PATCH')}}

                  {{-- <input type="hidden" name="id_user" value="{{Auth::guard('web')->user('attributes')->id}}"> --}}

                  <div class="form-group nonspbu has-feedback">
                    <label for="">No Agenda</label>
                    <input class="form-control" type="text" name="no_agenda" placeholder="no_agenda teraspbu" value="{{old('no_agenda')}}">
                    @if ($errors->has('no_agenda'))
                      <span class="help-block text-white label-danger">
                        <p>{{$errors->first('no_agenda')}}</p>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="">Jenis UTTP</label>
                    <select required class="form-control" name="id_jenisuttp" id="id_jenisuttp">
                      <option value="">=== Pilih Jenis Uttp ===</option>
                      @foreach ($jenisuttps as $jenisuttp)
                        <option {{$id_jenisuttp==$jenisuttp->id?'selected':''}} {{ old('id_jenisuttp')==$jenisuttp->id?'selected':'' }} value="{{$jenisuttp->id}}">{{$jenisuttp->nama}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">UTTP</label>
                    <select required class="form-control" name="id_uttp" id="id_uttp">
                      <option value="">=== Pilih Jenis UTTP dahulu ===</option>
                      @foreach ($uttps as $uttp)
                        <option {{$teraspbu->id_uttp==$uttp->id?'selected':''}} {{ old('id_uttp')==$uttp->id?'selected':'' }} value="{{$uttp->id}}">{{$uttp->nama}}</option>
                      @endforeach
                    </select>
                  </div>

             {{-- {{dd($id_jenisuttp)}} --}}
{{-- {{dd(is_nan($id_jenisuttp))}} --}}
                  <div class="form-group  nonspbu has-feedback{{ $errors->has('tipe')?'has-error':''}}">
                    <label for="">Tipe</label>
                    <input class="form-control" type="text" name="tipe" placeholder="tipe teraspbu" value="{{old('tipe')}}">
                    @if ($errors->has('tipe'))
                      <span class="help-block text-white label-danger">
                        <p>{{$errors->first('tipe')}}</p>
                      </span>
                    @endif
                  </div>

                  <div  class="form-group  nonspbu">
                    <label for="">Merk</label>
                    <select class="form-control" name="id_merk">
                      <option value="" >=== Pilih Jenis Merk ===</option>
                      @foreach ($merks as $merk)
                        <option value="{{$merk->id}}">{{$merk->nama}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group nonspbu has-feedback{{ $errors->has('no_seri')?'has-error':''}}">
                    <label for="">No. Seri</label>
                    <input class="form-control" type="text" name="no_seri" placeholder="no seri" value="{{old('no_seri')}}">
                    @if ($errors->has('no_seri'))
                      <span class="help-block text-white label-danger">
                        <p>{{$errors->first('no_seri')}}</p>
                      </span>
                    @endif
                  </div>



                  <div class="form-group nonspbu">
                    <label for="">Satuan Pengukuran (UoM)</label>
                    <select class="form-control" name="id_uom">
                      <option value="">=== Pilih Uom ===</option>
                      @foreach ($uoms as $uom)
                        <option value="{{$uom->id}}">{{$uom->nama}}</option>
                      @endforeach
                    </select>
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
