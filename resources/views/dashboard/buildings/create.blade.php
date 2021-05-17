@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            {{--                      <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $land->title }}</div>--}}
                            <div class="card-body">
                                @foreach ($inputs as $input)
                                    {{ $input->title }}
                                @endforeach
                                <div class="form-group row">
                                    <label><strong>ชื่อเจ้าของทรัพย์สิน:</strong>  {{$input->name_titles}} {{$input->first_name}} {{$input->last_name}} </label>
                                </div>
                                <div class="form-group row">
                                    <label><strong>เลขประจำตัวประชาชน:</strong> {{ $input->card_id }}</label>
                                </div>

                                <div class="form-group row">
                                    <label><strong>ที่อยู่:</strong> {{$input->address_number}} หมู่: {{$input->moo}} ซอย: {{$input->moo}} ถนน: {{$input->road}}</label>
                                </div>
                                <div class="form-group row">
                                    <label>ตำบล: {{$input->tambon}} อำเภอ: {{$input->amphoe}} จังหวัด: {{$input->province}}</label>
                                </div>
                                </form>
                            </div>
                            <div>
                                <form method="POST" action="{{ route('lands.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col">
                                            <label>ผู้ถือกรรมสิทธิ์ร่วม</label>
                                            <textarea class="form-control" type="text" placeholder="{{ __('ชื่อ-นามสกุล') }}"  name="co_owner"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label>รหัสแปลงที่ดิน</label>
                                            <input class="form-control" type="text" placeholder="{{ __('เลขที่') }}"  name="parcel_code" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label>ประเภทเอกสารสิทธิ์</label>
                                            <select class="form-control" name="ldoc_type">
                                                @foreach($ldoc_types as $ldoc_type)
                                                    <option value="{{ $ldoc_type->ldoc_type }}">{{ $ldoc_type->ldoc_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>เลขที่เอกสารสิทธิ์</label>
                                            <input class="form-control" type="text" name="dn"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label>เล่มที่</label>
                                            <input class="form-control" type="text" name="lb"  >
                                        </div>
                                        <div class="col-3">
                                            <label>หน้าที่</label>
                                            <input class="form-control" type="text" name="lp"  >
                                        </div>
                                        <div class="col-6">
                                            <label>ชื่อระวางที่ดิน</label>
                                            <input class="form-control" type="text" name="rw"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label>เลขที่ดิน</label>
                                            <input class="form-control" type="text" name="ln"  >
                                        </div>
                                        <div class="col">
                                            <label>หน้าสำรวจ</label>
                                            <input class="form-control" type="text" name="sn"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label>มาตราส่วน 1:</label>
                                            <input class="form-control" type="text" name="sc"  >
                                        </div>
                                        <div class="col-2">
                                            <label>หมู่ที่</label>
                                            <input class="form-control" type="text" name="moo"  >
                                        </div>
                                        <div class="col-4">
                                            <label>หมู่บ้าน</label>
                                            <input class="form-control" type="text" name="vl"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label>ซอย</label>
                                            <input class="form-control" type="text" name="soi"  >
                                        </div>
                                        <div class="col">
                                            <label>ถนน</label>
                                            <input class="form-control" type="text" name="road"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label>ตำบล</label>
                                            <select class="form-control" name="tambon_id">
                                                @foreach($tambons as $tambon)
                                                    <option value="{{ $tambon->id }}">{{ $tambon->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>ชื่อชุมชน</label>
                                            <input class="form-control" type="text" name="community"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label>จำนวนเนื้อที่</label>
                                        <div class="col-2">
                                            <label>ไร่</label>
                                            <input class="form-control" type="number" name="rai">
                                        </div>
                                        <div class="col-2">
                                            <label>งาน</label>
                                            <input class="form-control" type="number" name="yawn">
                                        </div>
                                        <div class="col-2">
                                            <label>ตร.วา</label>
                                            <input class="form-control" type="number" name="wa">
                                        </div>
                                        <div class="col">
                                            <label>ค่าเช่าทั้งปี</label>
                                            <input class="form-control" type="number" step="1000" placeholder="{{ __('บาท') }}" name="rent_one_year">
                                        </div>
                                    </div>


                                    <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                    <a href="{{ route('lands.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
