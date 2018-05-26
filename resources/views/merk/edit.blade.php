@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">{{-- panel --}}
            <div class="panel-heading">Edit Merk</div>

            <div class="panel-body">{{-- -body--}}
              <form action="{{ route('merk.update',$merk) }}" method="post">{{-- -form --}}
                {{ csrf_field() }}
                {{ method_field('PATCH')}}
                {{-- <div class="form-group"> --}}
                <div class="form-group  has-feedback{{ $errors->has('merk')?'has-error':''}}">
                  <label for="">Merk</label>
                  <input class="form-control" type="text" name="nama" placeholder="nama Merk" value="{{$merk->nama}}">
                  {{-- <input required class="form-control" type="text" name="keterangan" placeholder="keterangan Merk" value="{{old('keterangan')}}"> --}}
                  @if ($errors->has('nama'))
                    <span class="help-block">
                      <p>{{$errors->first('nama')}}</p>
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
