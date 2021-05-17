@extends('dashboard.authBase')

@section('content')

    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <div class="row" style="float:right;margin-top: -5%">
                                <div class="col-12">
                                    <a href="/inputs"><button type="submit" class="btn btn-warning" ><span class="cil-settings btn-icon mr-2"></span>ผู้ดูแลระบบ</button></a>
                                </div>
                            </div>
                            <h1>ระบบตรวจสอบภาษี</h1>

                            <form action="{{url('dashboardmy')}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                        </svg>
                      </span>
                                    </div>


                                    <input class="form-control col-12" type="text" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('ใส่เลขบัตรประจำตัวประชาชน 13 หลัก') }}" name="card_id" required autofocus minlength="13" maxlength="13">

                                    <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                        </svg>
                      </span>

                                    <input class="form-control" type="password" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('วันเกิด (ววดดปปปป) เช่น 05072506') }}" name="birth_date" required autofocus minlength="8" maxlength="8">


                                    </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12" style="display: flex;justify-content: center;">
                                        <button type="submit" id="submitButton" class="btn btn-primary" value="card_id"><span class="cil-search btn-icon mr-2"></span>ตรวจสอบภาษี</button>
                                    </div>
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
