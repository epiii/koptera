@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">{{-- panel --}}
            <div class="panel-heading">Edit  UTTP</div>
            <div class="panel-body">{{-- -body--}}
              <form action="{{ route('uttp.update',$uttp) }}" method="post">{{-- -form --}}
                {{ csrf_field() }}
                {{ method_field('PATCH')}}
                {{-- <div class="form-group"> --}}
                <div class="form-group  has-feedback{{ $errors->has('uttp')?'has-error':''}}">
                  <label for=""> UTTP </label>
                  <input class="form-control" type="text" name="nama" placeholder="nama uttp" value="{{$uttp->nama}}">
                  {{-- <input required class="form-control" type="text" name="keterangan" placeholder="keterangan uttp" value="{{old('keterangan')}}"> --}}
                  @if ($errors->has('keterangan'))
                    <span class="help-block">
                      <p>{{$errors->first('keterangan')}}</p>
                    </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="">jenis UTTP</label>
                  <select class="form-control" name="id_jenisuttp">
                    @foreach ($jenisuttps as $jenisuttp)
                      <option
                      @if ($jenisuttp->id===$uttp->id_jenisuttp)
                        selected
                      @endif
                       value="{{$jenisuttp->id}}">{{$jenisuttp->nama}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="">keterangan</label>
                  <input class="form-control" type="text" name="keterangan" placeholder="keterangan uttp" value="{{$uttp->keterangan}}">
                  {{-- <input required class="form-control" type="text" name="keterangan" placeholder="keterangan uttp" value="{{old('keterangan')}}"> --}}
                  @if ($errors->has('keterangan'))
                    <span class="help-block">
                      <p>{{$errors->first('keterangan')}}</p>
                    </span>
                  @endif

                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="" value="save">
                </div>
              </form>{{-- -form --}}
            </div>{{-- body --}}
          </div>{{-- panel --}}
      </div>
    </div>
  </div>

@endsection
