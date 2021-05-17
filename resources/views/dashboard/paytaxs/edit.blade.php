@extends('dashboard.base')

@section('content')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">

                            <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $inputs->id }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('inputs.update', $inputs->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">

                                    <label>เลขประจำตัวประชาชน</label>
                                    <input class="form-control" type="text" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('ใส่เลขบัตรประจำตัวประชาชน 13 หลัก') }}" name="card_id" value="{{ $inputs->card_id }}" required autofocus minlength="13" maxlength="13" readonly>
                                </div>
                                <div class="form-group row">
                                    <label>วันเกิด (วัน/เดือน/ปี)</label>
                                    <input class="form-control" type="text" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('ใส่วันเกิด เช่น 05072506') }}" name="birth_date" value="{{ $inputs->birth_date }}" required autofocus minlength="8" maxlength="8" readonly>
                                </div>

                                <div class="form-group row">
                                    <label>ชื่อเจ้าของทรัพย์สิน</label>
                                    <input class="form-control" type="text" placeholder="{{ __('ชื่อ') }}" value="{{$inputs->first_name}}" name="first_name" required autofocus readonly>
                                </div>
                                <div class="form-group row">
                                    <label>นามสกุล</label>
                                    <input class="form-control" type="text" placeholder="{{ __('นามสกุล') }}" value="{{$inputs->last_name}}" name="last_name" required autofocus readonly>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label>บ้านเลขที่</label>
                                        <input class="form-control" type="text" placeholder="{{ __('เลขที่') }}" value="{{$inputs->address_number}}" name="address_number" required autofocus readonly>
                                    </div>
                                    <div class="col">
                                        <label>หมู่ที่</label>
                                        <input class="form-control" type="text" placeholder="{{ __('หมู่ที่') }}" value="{{$inputs->moo}}" name="moo" readonly  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label>ซอย</label>
                                        <input class="form-control" type="text" placeholder="{{ __('ซอย') }}" value="{{$inputs->soi}}" name="soi" readonly >
                                    </div>
                                    <div class="col">
                                        <label>ถนน</label>
                                        <input class="form-control" type="text" placeholder="{{ __('ถนน') }}" value="{{$inputs->road}}" name="road" readonly >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>จังหวัด</label>
                                        <input class="form-control" type="text" value="{{ $inputs->province }}"  name="province" readonly >
                                    </div>

                                    <div class="col-4">
                                        <label>อำเภอ</label>
                                        <input class="form-control" type="text" value="{{ $inputs->amphoe }}"  name="amphoe" readonly >
                                    </div>
                                    <div class="col-4">
                                        <label>ตำบล</label>
                                        <input class="form-control" type="text" value="{{ $inputs->tambon }}"  name="tambon" readonly >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>หมู่บ้าน</label>
                                        <input class="form-control" type="text" placeholder="{{ __('หทู่บ้าน') }}" value="{{ $inputs->community }}" name="community" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>รหัสไปรษณีย์</label>
                                        <input class="form-control" type="text" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('รหัสไปรษณีย์') }}" value="{{ $inputs->zip_code }}" name="zip_code" required autofocus minlength="5" maxlength="5" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>โทรศัพท์</label>
                                        <input class="form-control" type="tel" placeholder="{{ __('เบอร์โทรศัพท์') }}" value="{{ $inputs->telephone }}"  name="telephone" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>โทรสาร</label>
                                        <input class="form-control" type="tel" placeholder="{{ __('โทรสาร') }}" value="{{ $inputs->fax }}" name="fax" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label>อีเมล์</label>
                                    <input class="form-control" type="email" placeholder="{{ __('อีเมล์') }}" value="{{ $inputs->email }}" name="email"  readonly>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label>Status</label>
                                        <select class="form-control" name="status_id">
                                            @foreach($statuses as $status)
                                                @if( $status->id == $inputs->status_id )
                                                    <option value="{{ $status->id }}" selected="true">{{ $status->name }}</option>
                                                @else
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('paytaxs.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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
