@extends('dashboard.base')

@section('content')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('บันทึกข้อมูลผู้ชำระภาษี') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('inputs.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label>เลขประจำตัวประชาชน</label>
                                <input class="form-control" type="text" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('ใส่เลขบัตรประจำตัวประชาชน 13 หลัก') }}" name="card_id" required autofocus minlength="13" maxlength="13">
                            </div>
                            <div class="form-group row">
                                <label>วันเกิด (วัน/เดือน/ปี) ตัวอย่าง : เกิดวันที่ 5 กรกฎาคม พ.ศ.2506 ให้กรอก 05072506</label>
                                <input class="form-control" type="text" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('ใส่วันเกิด เช่น 05072506') }}" name="birth_date" required autofocus minlength="8" maxlength="8">
                            </div>

                            <div class="form-group row">
                                <label>ประเภทบุคคล</label>
                                <select class="form-control" name="owner_types">
                                    @foreach($owner_typeses as $owner_types)
                                        <option value="{{ $owner_types->name }}">{{ $owner_types->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label>คำนำหน้าชื่อ/หน่วยงาน</label>
                                <select class="form-control" name="name_titles">
                                    @foreach($name_titleses as $name_titles)
                                        <option value="{{ $name_titles->name }}">{{ $name_titles->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label>ชื่อเจ้าของทรัพย์สิน</label>
                                <input class="form-control" type="text" placeholder="{{ __('ชื่อ') }}" name="first_name" required autofocus>
                            </div>
                            <div class="form-group row">
                                <label>นามสกุล</label>
                                <input class="form-control" type="text" placeholder="{{ __('นามสกุล') }}" name="last_name" required autofocus>
                            </div>


                            <div class="form-group row">
                                <div class="col">
                                <label>บ้านเลขที่</label>
                                <input class="form-control" type="text" placeholder="{{ __('เลขที่') }}" name="address_number" required autofocus>
                                </div>
                                <div class="col">
                                <label>หมู่ที่</label>
                                <input class="form-control" type="text" placeholder="{{ __('หมู่ที่') }}" name="moo"  >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                <label>ซอย</label>
                                <input class="form-control" type="text" placeholder="{{ __('ซอย') }}" name="soi"  >
                                </div>
                                <div class="col">
                                <label>ถนน</label>
                                <input class="form-control" type="text" placeholder="{{ __('ถนน') }}" name="road"  >
                            </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-4">
                                    <label>จังหวัด</label>
                                    <select class="form-control" name="province" id="province">
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->name_th }}">{{ $province->name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label>อำเภอ</label>
{{--                                    <select class="form-control" name="amphoe">--}}
{{--                                        @foreach($amphoes as $amphoe)--}}
{{--                                            <option value="{{ $amphoe->name }}">{{ $amphoe->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
                                    <input class="form-control" type="text" placeholder="{{ __('อำเภอ') }}" name="amphoe"  >
                                </div>
                                <div class="col-4">
                                    <label>ตำบล</label>
{{--                                    <select class="form-control" name="tambon">--}}
{{--                                        @foreach($tambons as $tambon)--}}
{{--                                            <option value="{{ $tambon->name }}">{{ $tambon->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
                                    <input class="form-control" type="text" placeholder="{{ __('ตำบล') }}" name="tambon"  >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <label>หมู่บ้าน</label>
                                    <input class="form-control" type="text" placeholder="{{ __('หมู่บ้าน') }}"  name="community" >
                                </div>
                                <div class="col-6">
                                    <label>รหัสไปรษณีย์</label>
                                    <input class="form-control" type="text" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('รหัสไปรษณีย์') }}" name="zip_code" required autofocus minlength="5" maxlength="5">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <label>โทรศัพท์</label>
                                    <input class="form-control" type="tel" placeholder="{{ __('เบอร์โทรศัพท์') }}"  name="telephone" >
                                </div>
                                <div class="col-6">
                                    <label>โทรสาร</label>
                                    <input class="form-control" type="tel" placeholder="{{ __('โทรสาร') }}" name="fax">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label>อีเมล์</label>
                                <input class="form-control" type="email" placeholder="{{ __('อีเมล์') }}" name="email"  >
                            </div>


{{--                            <div class="form-group row">--}}
{{--                                <label>Title</label>--}}
{{--                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>--}}
{{--                            </div>--}}



{{--                            <div class="form-group row">--}}
{{--                                <label>Content</label>--}}
{{--                                <textarea class="form-control" id="textarea-input" name="content" rows="9" placeholder="{{ __('Content..') }}" required></textarea>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label>Applies to date</label>--}}
{{--                                <input type="date" class="form-control" name="applies_to_date" required/>--}}
{{--                            </div>--}}

                            <div class="form-group row" hidden>
                                <label>Status</label>
                                <select class="form-control" name="status_id">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label>Note type</label>--}}
{{--                                <input class="form-control" type="text" placeholder="{{ __('Note type') }}" name="note_type" required>--}}
{{--                            </div>--}}

                            <button class="btn btn-block btn-success" type="submit" onclick="alert('เพิ่มข้อมูลผู้ชำระภาษีเรียบร้อยแล้ว')">{{ __('เพิ่มข้อมูลผู้ชำระภาษี') }}</button>
                            <a href="{{ route('inputs.index') }}" class="btn btn-block btn-primary">{{ __('ย้อนกลับ') }}</a>
                        </form>
{{--                    </div>--}}
{{--                </div>--}}
{{--              </div>--}}
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection
