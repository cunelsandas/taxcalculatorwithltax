@extends('dashboard.authBase')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>กรอกรหัสบัตรประชาชน</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                        </svg>
                      </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('รหัสบัตรประชาชน 13 หลัก') }}" name="Citizen" required autofocus>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@section('javascript')

@endsection
