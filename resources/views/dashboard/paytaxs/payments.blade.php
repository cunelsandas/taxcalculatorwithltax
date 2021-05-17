@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                        <div class="card-header" style="text-decoration: underline"><h4>หลักฐานการโอนผ่านธนาคาร</h4></div>
                    <div class="card-body">
                        @foreach(File::glob(public_path('images').'/*') as $path)
                            <img src="{{ str_replace(public_path(), '', $path) }}" width="300">
                        @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

