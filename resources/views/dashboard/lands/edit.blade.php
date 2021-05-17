@extends('dashboard.base')

@section('content')

    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .center {
            margin: auto;
            width: 60%;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .hideform {
            display: none;
        }

        .box {
            display: flex;
            width: 100%;
            height: 8px;
            margin: 5px 0px 60px 0px;
        }

        .box-sm {
            height: 8px;
            margin: 0;
            flex-grow: 1;
            transition: all .8s ease-in-out;
            cursor: pointer;
        }

        .box-sm:hover {
               flex-grow: 12;
           }

        .container,
        .post {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            background: #424242;
            height: 100%;
            margin: 20px;
            padding: 20px;
            outline: 1px dashed #98abb9;
            outline-offset: -5px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .3), 0 2px 2px rgba(0, 0, 0, .2), 0 4px 4px rgba(0, 0, 0, .1), 0 0 8px rgba(0, 0, 0, .1);
        }

        .post {
            margin-bottom: 50px;
        }
        h2,
        p {
            text-align: center;
            margin-bottom: 0px;
        }
        h2 {
            font-size: 60px;
            color: #E0E0E0;
            text-shadow: 0px 1px 1px black;
        }


        .red {
            background-color: #FF5852;
        }

        .orange {
            background-color: #FF9000;
        }

        .yellow {
            background-color: #FFD300;
        }

        .green {
            background-color: #3DCD49;
        }

        .blue {
            background-color: #0089D7;
        }

        .purple {
            background-color: #9E44C4;
        }
        h3 {
            font-size: 25px;
            border-bottom: 10px solid #ffffff;
            text-align: center;
            font-weight: bold;
        }
        h3:after {
            content: '';
            display: block;
            border-bottom: 10px solid #ffffff;
            margin-bottom: -10px;
            max-width: 200px;
            text-align: center;
        }
    </style>

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">

{{--                        <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $lands->id }}</div>--}}
{{--                      <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $land->title }}</div>--}}
                    <div class="card-body col-6">


{{--                            <div class="form-group row">--}}
{{--                                <label><strong>รหัส owner_id:</strong>  {{$input->id}}</label>--}}
{{--                            </div>--}}
                            <div class="form-group row">
                                <label><strong>ปี: </strong>{{date("Y")+543}} </label>
                            </div>
                            <div class="form-group row">
                                <label><strong>ชื่อเจ้าของทรัพย์สิน:</strong>  {{$inputs->name_titles}} {{$inputs->first_name}} {{$inputs->last_name}} </label>
                            </div>
                            <div class="form-group row">
                                <label><strong>เลขประจำตัวประชาชน:</strong> {{ $inputs->card_id }}</label>
                            </div>

                            <div class="form-group row">
                                <label><strong>ที่อยู่:</strong> {{$inputs->address_number}} หมู่: {{$inputs->moo}} ซอย: {{$inputs->moo}} ถนน: {{$inputs->road}}</label>
                            </div>
                            <div class="form-group row">
                                <label>ตำบล: {{$inputs->tambon}} อำเภอ: {{$inputs->amphoe}} จังหวัด: {{$inputs->province}}</label>
                            </div>

                    </div>
                        <div>

                                <form method="POST" action="{{ route('lands.update', $inputs->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label>ID</label>
                                            <input class="form-control" type="text" value="{{$inputs->id}}"  name="owner_id" id="owner_id" readonly>
                                        </div>
                                    </div>
                                    <br>

                                    <h3>ข้อมูลแปลงที่ดิน</h3>
                                    <div class="box">
                                        <div class="box-sm red"></div>
                                        <div class="box-sm orange"></div>
                                        <div class="box-sm yellow "></div>
                                        <div class="box-sm green "></div>
                                        <div class="box-sm blue "></div>
                                        <div class="box-sm purple"></div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>ผู้ถือกรรมสิทธิ์ร่วม</label>
                                        <input class="form-control" type="text" placeholder="{{ __('ชื่อ-นามสกุล') }}"  name="co_owner">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>รหัสแปลงที่ดิน</label>
                                    <input class="form-control" type="text" placeholder="{{ __('เลขที่') }}"  name="parcel_code" >
                                </div>
                            </div>

                                <div class="form-group row">
                                    <div class="col-3">
                                    <label>ประเภทเอกสารสิทธิ์</label>
                                    <select class="form-control" name="ldoc_type">
                                        @foreach($ldoc_types as $ldoc_type)
                                            <option value="{{ $ldoc_type->ldoc_name }}">{{ $ldoc_type->ldoc_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="col-3">
                                        <label>เลขที่เอกสารสิทธิ์</label>
                                        <input class="form-control" type="text" name="dn"  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-1">
                                        <label>เล่มที่</label>
                                        <input class="form-control" type="text" name="lb"  >
                                    </div>
                                    <div class="col-1">
                                        <label>หน้าที่</label>
                                        <input class="form-control" type="text" name="lp"  >
                                    </div>
                                    <div class="col-4">
                                        <label>ชื่อระวางที่ดิน</label>
                                        <input class="form-control" type="text" name="rw"  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>เลขที่ดิน</label>
                                        <input class="form-control" type="text" name="ln"  >
                                    </div>
                                    <div class="col-3">
                                        <label>หน้าสำรวจ</label>
                                        <input class="form-control" type="text" name="sn"  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>มาตราส่วน 1:</label>
                                        <input class="form-control" type="text" name="sc"  >
                                    </div>
                                    <div class="col-2">
                                        <label>หมู่ที่</label>
                                        <input class="form-control" type="text" name="moo"  >
                                    </div>
                                    <div class="col-2">
                                        <label>หมู่บ้าน</label>
                                        <input class="form-control" type="text" name="vl"  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>ซอย</label>
                                        <input class="form-control" type="text" name="soi"  >
                                    </div>
                                    <div class="col-3">
                                        <label>ถนน</label>
                                        <input class="form-control" type="text" name="road"  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>ตำบล</label>
                                        <input class="form-control" type="text" name="tambon_id"  >
                                    </div>
                                    <div class="col-3">
                                        <label>ชื่อชุมชน</label>
                                        <input class="form-control" type="text" name="community"  >
                                    </div>
                                </div>
                                    <label style="color: red">**กรุณากรอก 0 ในช่องที่ไม่ต้องการการคำนวณ**</label>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <div class="form-group row" style="display: block;margin-left: 0.2%">
                                    <label>จำนวนเนื้อที่</label>
                                    <input class="form-control rai-1 col-2" type="number" name="rai" id="rai" min="0"  placeholder="{{ __('ไร่') }}" onkeypress="return event.keyCode != 13;" />
                                    <input class="form-control yawn-1 col-2" type="number" name="yawn" id="yawn"  min="0" max="4" maxlength="1" pattern="^0[0-4]|[0-4]\d$"  placeholder="{{ __('งาน') }}" onkeypress="return event.keyCode != 13;" />
                                    <input class="form-control wa-1 col-2" type="number" name="wa" id="wa"  min="0"  placeholder="{{ __('วา') }}" onkeypress="return event.keyCode != 13;" />
                                    <label>ตารางวา</label><input class="form-control square_1 col-4" name="square_1" type="text" readonly="readonly" id="square_1" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                    <label>ตารางเมตร</label><input class="form-control square_m col-4" name="square_m" type="text" readonly="readonly" id="square_m" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                    <input class="form-control meanprice_vl col-4" type="number" name="meanprice_vl" step="0.01" id="meanprice_vl" placeholder="{{ __('ราคาประเมินต่อตารางวา (บาท)') }}" onkeypress="return event.keyCode != 13;" />
                                    <label>รวมราคาประเมินที่ดิน (บาท)</label><input class="form-control result_landprice_lands col-4" style=" background-color: #3CBC8D;color: white;" type="number" readonly="readonly"  name="result_landprice_lands" id="result_landprice_lands" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                    <script>
                                        $(document).ready(function(){
                                            $('input[type="number"]').keyup(function () {
                                                var val1 = parseFloat($('.rai-1').val());
                                                var val2 = parseFloat($('.yawn-1').val());
                                                var val3 = parseFloat($('.wa-1').val());
                                                var sum = (val1*400)+(val2*100)+val3;
                                                $("input#square_1").val(sum);
                                            });
                                        });
                                    </script>
                                    <script>
                                        $(document).ready(function(){
                                            $('input[type="number"]').keyup(function () {
                                                var val1 = parseFloat($('.square_1').val());
                                                var sum = val1*4;
                                                $("input#square_m").val(sum);
                                            });
                                        });
                                    </script>
                                    <script>
                                    $(document).ready(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val4 = parseFloat($('.square_1').val());
                                            var val5 = parseFloat($('.meanprice_vl').val());
                                            var sum = val4*val5;
                                            $("input#result_landprice_lands").val(sum);
                                        });
                                    });

                                    </script>
                                </div>
                                <br>
                                <h3>การใช้ประโยชน์ที่ดิน</h3>
                                <div class="box">
                                    <div class="box-sm red"></div>
                                    <div class="box-sm orange"></div>
                                    <div class="box-sm yellow "></div>
                                    <div class="box-sm green "></div>
                                    <div class="box-sm blue "></div>
                                    <div class="box-sm purple"></div>
                                </div>


                                    <div class="form-group row">
                                        <div class="col">
{{--                                            <label>ลักษณะการใช้</label>--}}
{{--                                            <select class="form-control" name="lut_name" id="lut_name" onchange="yesnoCheck(this);">--}}
{{--                                                <option value="101">ใช้ประโยชน์ด้วยตนเอง (อยู่เอง)</option>--}}
{{--                                                <option value="102">ให้บุคคลอื่นเช่าที่ดิน (ให้เช่า)</option>--}}
{{--                                            </select>--}}
                                            <label>ลักษณะการใช้ประโยชน์</label>
                                            <select class="form-control" name="lut_id" id="lut_id" onchange="yesnoCheck(this);">
                                                @foreach($landuse_types as $landuse_type)
                                                    <option value="{{ $landuse_type->lutid }}">{{ $landuse_type->lutname }} * {{$landuse_type->multipiler}}</option>
                                                @endforeach
                                            </select>
                                            <label style="color: red">**กรุณากรอก 0 ในช่องที่ไม่ต้องการการคำนวณ**</label>
                                            <script>
                                                function yesnoCheck(that) {
                                                    if (that.value === '6') {
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("Tree").style.display = "none";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '7'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '8'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '9'){
                                                        document.getElementById("Tree").style.display = "none";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '10'){
                                                        document.getElementById("Tree").style.display = "none";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '11'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";

                                                    }
                                                    else if(that.value === '12'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '13'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '14'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '16'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '999'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                    }
                                                    else if(that.value === '1000'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '1001'){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === ''){
                                                        document.getElementById("Tree").style.display = "block";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else if(that.value === '99'){
                                                        document.getElementById("Tree").style.display = "none";
                                                        document.getElementById("hide").style.display = "none";
                                                        document.getElementById("ifYes").style.display = "block";
                                                        document.getElementById("hide2").style.display = "none";
                                                        document.getElementById("hide3").style.display = "none";
                                                        document.getElementById("hide4").style.display = "none";
                                                    }
                                                    else{
                                                        document.getElementById("ifYes").style.display = "none";
                                                        document.getElementById("hide").style.display = "block";
                                                        document.getElementById("Tree").style.display = "none";
                                                        document.getElementById("hide2").style.display = "block";
                                                        document.getElementById("hide3").style.display = "block";
                                                        document.getElementById("hide4").style.display = "block";
                                                    }
                                                }
                                            </script>

                                            <div id="Tree" style="display: none;">
                                                <label>ประเภทไม้ล้มลุก/ยืนต้น</label>
                                                <select class="form-control" name="cid" id="cid" onchange="yesnoCheck(this);">
                                                    <option value="">กรุณาเลือกพืชที่ปลูก</option>
                                                    @foreach($cultivates as $cultivate)
                                                        <option value="{{ $cultivate->cid }}">{{ $cultivate->cname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


                                            <div id="hide2" class="form-group col" style=";display: block">
                                                <label>เนื้อที่ใช้ทำประโยชน์ (กxย)</label>
                                                {{--                                    @if ($landuse_type->lutid === 6)--}}
                                                {{--                                        <input type="number" class="input value3 form-control col-2" id="width" placeholder="{{ __('ไร่') }}">--}}
                                                {{--                                    @endif--}}
                                                <input type="number" class="input width_use form-control col-2" id="width_use" name="width_use" min="0" step="0.01" placeholder="{{ __('กว้าง') }}" onkeypress="return event.keyCode != 13;">
                                                <input type="number" class="input length_use form-control col-2" id="length_use" name="length_use" min="0" step="0.01" placeholder="{{ __('ยาว') }}" onkeypress="return event.keyCode != 13;">
                                                <input type="number" class="input result-wlu form-control col-2"  name="result-wlu" id="result-wlu" readonly="readonly"  step="0.01" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                                <label>ตร.เมตร</label><br>
                                                <label style="color: red">**กรุณากรอกไม่เกิน**</label>
                                               <input class="form-control square_m col-2" name="square_m" type="text" readonly="readonly" id="square_m" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;"> ตารางเมตร <br>

                                                <br><label>อัตราภาษีไร่ละ</label><input type="number" class="input tax_per_rai form-control col-2" id="tax_per_rai" name="tax_per_rai" min="0" step="0.01" placeholder="{{ __('บาท') }}" onkeypress="return event.keyCode != 13;">
                                                <div class="form-group">
                                                    <div class="col-6">
                                                        <label>จำนวนภาษีที่ดินที่ต้องชำระ</label><input class="form-control tax_bu" style="background-color: #fff677;color: black;font-size: 2rem" name="tax_bu" type="text" readonly="readonly" id="tax_bu" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                                    </div>
                                                </div>
                                                <label>บาท</label>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('input[type="number"]').keyup(function () {
                                                            var val1 = parseFloat($('.result-wlu').val());
                                                            var val2 = parseFloat($('.tax_per_rai').val());
                                                            var sum = (val1/1600)*val2;
                                                            if(isNaN(sum)){ return "";}
                                                            $("input#tax_bu").val(sum);
                                                        });
                                                    });
                                                </script>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('input[type="number"]').keyup(function () {
                                                            var val1 = parseFloat($('.width_use').val());
                                                            var val2 = parseFloat($('.length_use').val());
                                                            var sum = Math.round(val1*val2);
                                                            $("input#result-wlu").val(sum);
                                                        });
                                                    });
                                                </script>
                                            </div>

                                            <div id="ifYes" style="display: none;">
                                                <label>เนื้อที่ใช้ทำประโยชน์ (ไร่)</label>
                                                <input class="form-control value-rai col-2" type="number" name="use_rai" id="use-rai" min="0" value="0" placeholder="{{ __('ไร่') }}" onkeypress="return event.keyCode != 13;"/>
                                                <input class="form-control value-yawn col-2" type="number" name="use_yawn" id="use-yawn"  min="0" max="4" value="0" placeholder="{{ __('งาน') }}" onkeypress="return event.keyCode != 13;"/>
                                                <input class="form-control value-wa col-2" type="number" name="use_wa" id="use-wa"  min="0" value="0" placeholder="{{ __('วา') }}" onkeypress="return event.keyCode != 13;" />
                                                <label>ตารางวา</label><input class="form-control value-square col-2" name="result_square" type="text" readonly="readonly" id="result-square" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
{{--                                                <input class="form-control value-meanprice col-6" type="number" name="meanprice" step="0.01" id="meanprice" placeholder="{{ __('ราคาประเมินต่อตารางวา (บาท)') }}" onkeypress="return event.keyCode != 13;" />--}}
{{--                                                <label>รวมราคาประเมินที่ดิน (บาท)</label><input class="form-control value_landprice col-6" type="number"  name="result_landprice" id="result_landprice" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">--}}
                                                <label style="color: red">**กรุณากรอกไม่เกิน**</label>
                                                <label>ตารางวา</label><input class="form-control square_1 col-2" name="square_1" type="text" readonly="readonly" id="square_1" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                                <br><label>อัตราภาษีไร่ละ</label><input type="number" class="input tax_per_rai2 form-control col-2" id="tax_per_rai2" name="tax_per_rai2" min="0" step="0.01" placeholder="{{ __('บาท') }}" onkeypress="return event.keyCode != 13;">
                                                <div class="form-group">
                                                    <div class="col-6">
                                                        <label>จำนวนภาษีที่ดินที่ต้องชำระ</label><input class="form-control tax_lu" style="background-color: #fff677;color: black;font-size: 2rem" name="tax_lu" type="text" readonly="readonly" id="tax_lu" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                                    </div>
                                                </div>
                                                <label>บาท</label>
                                               <script>
                                                   $(document).ready(function(){
                                                       $('input[type="number"]').keyup(function () {
                                                           var val1 = parseFloat($('.value-rai').val());
                                                           var val2 = parseFloat($('.value-yawn').val());
                                                           var val3 = parseFloat($('.value-wa').val());
                                                           var val4 = parseFloat($('#tax_per_rai2').val());
                                                        var sum = ((val1)+(val2*0.25)+(val3/400))*val4;
                                                           if(isNaN(sum)){ return "";}
                                                        $("input#tax_lu").val(sum);
                                                       });
                                                   });
                                               </script>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('input[type="number"]').keyup(function () {
                                                            var val1 = parseFloat($('.value-rai').val());
                                                            var val2 = parseFloat($('.value-yawn').val());
                                                            var val3 = parseFloat($('.value-wa').val());
                                                            var sum = (val1*400)+(val2*100)+val3;
                                                            $("input#result-square").val(sum);
                                                        });
                                                    });

                                                </script>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('input[type="number"]').keyup(function () {
                                                            var val4 = parseFloat($('.value-square').val());
                                                            var val5 = parseFloat($('.value-meanprice').val());
                                                            var sum = val4*val5;
                                                            $("input#result_landprice").val(sum);
                                                        });
                                                    });

                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h3>ข้อมูลการใช้ประโยชน์สิ่งปลูกสร้าง</h3>
                                    <div class="box">
                                        <div class="box-sm red"></div>
                                        <div class="box-sm orange"></div>
                                        <div class="box-sm yellow "></div>
                                        <div class="box-sm green "></div>
                                        <div class="box-sm blue "></div>
                                        <div class="box-sm purple"></div>
                                    </div>

                                    <div class="col">
                                        <label>ลักษณะการใช้ประโยชน์</label>
                                        <select class="form-control" name="building_use_name" id="building_use_name">
                                            @foreach($building_categorys as $building_category)
                                                <option value="{{ $building_category->usage_desc }}">{{$building_category->usage_desc }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>รหัสประจำบ้าน</label>
                                            <input class="form-control col-6" type="text" name="house_code" id="house_code" placeholder="{{ __('รหัสประจำบ้าน') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label>เลขรหัสโรงเรือน</label>
                                            <input class="form-control" type="text" name="build_code" id="build_code" placeholder="{{ __('เลขรหัสโรงเรือน') }}" />
                                        </div>
                                        <div class="col-3">
                                            <label>รหัสแปลงที่ดิน</label>
                                            <input class="form-control" type="text" name="parcel_b_code" id="parcel_b_code" placeholder="{{ __('รหัสแปลงที่ดิน') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>ชื่ออาคาร</label>
                                            <input class="form-control col-6" type="text" name="build_name" id="build_name" placeholder="{{ __('ชื่ออาคาร') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <label>บ้านเลขที่</label>
                                            <input class="form-control col-6" type="text" name="b_number" id="b_number" placeholder="{{ __('เลขที่') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label>ตรอก/ซอย</label>
                                            <input class="form-control" type="text" name="b_soi" id="b_soi" />
                                        </div>
                                        <div class="col-3">
                                            <label>ถนน</label>
                                            <input class="form-control" type="text" name="b_road" id="b_road" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label>ตำบล</label>
                                            <input class="form-control" type="text" name="tambon_id" id="tambon_id" />
                                        </div>
                                        <div class="col-3">
                                            <label>ชุมชน</label>
                                            <input class="form-control" type="text" name="b_community" id="b_community" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label>ประเภทสิ่งปลูกสร้าง</label>
                                            <select class="form-control" name="building_type_name">
                                                <option value="">กรุณาเลือกประเภทสิ่งปลูกสร้าง</option>
                                                @foreach($building_types as $building_type)
                                                    <option value="{{ $building_type->bt_name }}">{{ $building_type->bt_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label>ห้อง</label>
                                            <input class="form-control" type="text" name="b_room" id="b_room" placeholder="{{ __('จำนวนห้อง') }}" />
                                        </div>
                                        <div class="col-3">
                                            <label>ชั้น</label>
                                            <input class="form-control" type="text" name="b_floor" id="b_floor" placeholder="{{ __('จำนวนชั้น') }}" />
                                        </div>
                                    </div>



                                    <hr style="height: 10px;color: #0080ff">



                                {{--                                        <label>อัตราค่าเสื่อมราคา (ตึก)</label>--}}
                                {{--                                <select id="depreciation1Concrete" >--}}
                                {{--                                    <option value="1">1</option>--}}
                                {{--                                    <option value="2">2</option>--}}
                                {{--                                    <option value="3">3</option>--}}
                                {{--                                    <option value="4">4</option>--}}
                                {{--                                    <option value="5">5</option>--}}
                                {{--                                    <option value="6">6</option>--}}
                                {{--                                    <option value="7">7</option>--}}
                                {{--                                    <option value="8">8</option>--}}
                                {{--                                    <option value="9">9</option>--}}
                                {{--                                    <option value="10">10</option>--}}
                                {{--                                    <option value="12">12</option>--}}
                                {{--                                    <option value="14">14</option>--}}
                                {{--                                </select>--}}




                                <script>
                                    function materialCheck(that) {
                                        if (that.value === '1') {
                                            document.getElementById("ifConcrete").style.display = "block";
                                            document.getElementById("ifWooden").style.display = "none";
                                            document.getElementById("ifHalf").style.display = "none";
                                        }
                                        else if(that.value === '2'){
                                            document.getElementById("ifWooden").style.display = "block";
                                            document.getElementById("ifConcrete").style.display = "none";
                                            document.getElementById("ifHalf").style.display = "none";
                                        }
                                        else if(that.value === '3'){
                                            document.getElementById("ifHalf").style.display = "block";
                                            document.getElementById("ifConcrete").style.display = "none";
                                            document.getElementById("ifWooden").style.display = "none";
                                        }
                                        else{
                                            document.getElementById("ifHalf").style.display = "none";
                                            document.getElementById("ifConcrete").style.display = "none";
                                            document.getElementById("ifWooden").style.display = "none";
                                        }
                                    }
                                </script>

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>ลักษณะอาคาร</label>
                                        <select class="form-control" name="bm_id" onchange="materialCheck(this);">
                                            <option value="0">กรุณาเลือกประเภทตึก</option>
                                            @foreach($building_materials as $building_material)
                                                <option value="{{ $building_material->bm_id }}">{{ $building_material->bm_id }}.{{ $building_material->bm_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>ลักษณะอาคาร</label>
                                        <select class="form-control" name="b_st">
                                            <option value=1>ถาวร</option>
                                            <option value=0>ชั่วคราว</option>
                                        </select>
                                    </div>
                                </div>



                            <div id="hideOption">
                                <label style="color: red">กรุณาเลือกอัตราค่าเสื่อมราคาสิ่งปลูกสร้าง ***</label><br>
                                <label style="color: red">**กรุณากรอก 0 ในช่องที่ไม่ต้องการการคำนวณ**</label>
                                <div class="form-group col-4">
                                    <div id="ifConcrete" style="display: none;">
                                        <label>ปีที่ - อัตราค่าเสื่อม(ตึก)</label>
                                        <select class="form-control" name="select1Concrete" id="select1Concrete" onchange="Select1Concrete(this.value);">
                                            <option value="0">กรุณาเลือกอายุสิ่งปลูกสร้าง</option>
                                            <option value="1">ปีที่1 ค่าเสื่อม 1%</option>
                                            <option value="2">ปีที่2 ค่าเสื่อม 2%</option>
                                            <option value="3">ปีที่3 ค่าเสื่อม 3%</option>
                                            <option value="4">ปีที่4 ค่าเสื่อม 4%</option>
                                            <option value="5">ปีที่5 ค่าเสื่อม 5%</option>
                                            <option value="6">ปีที่6 ค่าเสื่อม 6%</option>
                                            <option value="7">ปีที่7 ค่าเสื่อม 7%</option>
                                            <option value="8">ปีที่8 ค่าเสื่อม 8%</option>
                                            <option value="9">ปีที่9 ค่าเสื่อม 9%</option>
                                            <option value="10">ปีที่10 ค่าเสื่อม 10%</option>
                                            <option value="12">ปีที่11 ค่าเสื่อม 12%</option>
                                            <option value="14">ปีที่12 ค่าเสื่อม 14%</option>
                                            <option value="16">ปีที่13 ค่าเสื่อม 16%</option>
                                            <option value="18">ปีที่14 ค่าเสื่อม 18%</option>
                                            <option value="20">ปีที่15 ค่าเสื่อม 20%</option>
                                            <option value="22">ปีที่16 ค่าเสื่อม 22%</option>
                                            <option value="24">ปีที่17 ค่าเสื่อม 24%</option>
                                            <option value="26">ปีที่18 ค่าเสื่อม 26%</option>
                                            <option value="28">ปีที่19 ค่าเสื่อม 28%</option>
                                            <option value="30">ปีที่20 ค่าเสื่อม 30%</option>
                                            <option value="32">ปีที่21 ค่าเสื่อม 32%</option>
                                            <option value="34">ปีที่22 ค่าเสื่อม 34%</option>
                                            <option value="36">ปีที่23 ค่าเสื่อม 36%</option>
                                            <option value="38">ปีที่24 ค่าเสื่อม 38%</option>
                                            <option value="40">ปีที่25 ค่าเสื่อม 40%</option>
                                            <option value="42">ปีที่26 ค่าเสื่อม 42%</option>
                                            <option value="44">ปีที่27 ค่าเสื่อม 44%</option>
                                            <option value="46">ปีที่28 ค่าเสื่อม 46%</option>
                                            <option value="48">ปีที่29 ค่าเสื่อม 48%</option>
                                            <option value="50">ปีที่30 ค่าเสื่อม 50%</option>
                                            <option value="52">ปีที่31 ค่าเสื่อม 52%</option>
                                            <option value="54">ปีที่32 ค่าเสื่อม 54%</option>
                                            <option value="56">ปีที่33 ค่าเสื่อม 56%</option>
                                            <option value="58">ปีที่34 ค่าเสื่อม 58%</option>
                                            <option value="60">ปีที่35 ค่าเสื่อม 60%</option>
                                            <option value="62">ปีที่36 ค่าเสื่อม 62%</option>
                                            <option value="64">ปีที่37 ค่าเสื่อม 64%</option>
                                            <option value="66">ปีที่38 ค่าเสื่อม 66%</option>
                                            <option value="68">ปีที่39 ค่าเสื่อม 68%</option>
                                            <option value="70">ปีที่40 ค่าเสื่อม 70%</option>
                                            <option value="72">ปีที่41 ค่าเสื่อม 72%</option>
                                            <option value="72">ปีที่42 ค่าเสื่อม 72%</option>
                                            <option value="76">ปีที่43 ขึ้นไป ค่าเสื่อม 76% ตลอดอายุการใช้งาน</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-4" id="hide">
                                    <div id="ifWooden" style="display: none;">
                                        <label>ปีที่ - อัตราค่าเสื่อม(ไม้)</label>
                                        <select class="form-control" name="select2Wooden" id="select2Wooden" onchange="Select2Wooden(this.value);">
                                            <option value="0">กรุณาเลือกอายุสิ่งปลูกสร้าง</option>
                                            <option value="3">ปีที่1 ค่าเสื่อม 3%</option>
                                            <option value="6">ปีที่2 ค่าเสื่อม 6%</option>
                                            <option value="9">ปีที่3 ค่าเสื่อม 9%</option>
                                            <option value="12">ปีที่4 ค่าเสื่อม 12%</option>
                                            <option value="15">ปีที่5 ค่าเสื่อม 15%</option>
                                            <option value="20">ปีที่6 ค่าเสื่อม 20%</option>
                                            <option value="25">ปีที่7 ค่าเสื่อม 25%</option>
                                            <option value="30">ปีที่8 ค่าเสื่อม 30%</option>
                                            <option value="35">ปีที่9 ค่าเสื่อม 35%</option>
                                            <option value="40">ปีที่10 ค่าเสื่อม 40%</option>
                                            <option value="45">ปีที่11 ค่าเสื่อม 45%</option>
                                            <option value="50">ปีที่12 ค่าเสื่อม 50%</option>
                                            <option value="55">ปีที่13 ค่าเสื่อม 55%</option>
                                            <option value="60">ปีที่14 ค่าเสื่อม 60%</option>
                                            <option value="65">ปีที่15 ค่าเสื่อม 65%</option>
                                            <option value="72">ปีที่16 ค่าเสื่อม 72%</option>
                                            <option value="79">ปีที่17 ค่าเสื่อม 79%</option>
                                            <option value="86">ปีที่18 ค่าเสื่อม 86%</option>
                                            <option value="93">ปีที่19 ขึ้นไป ค่าเสื่อม 93% ตลอดอายุการใช้งาน</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-4" id="hide">
                                    <div id="ifHalf" style="display: none;">
                                        <label>ปีที่ - อัตราค่าเสื่อม(ตึกครึ่งไม้)</label>
                                        <select class="form-control" name="select3Half" id="select3Half" onchange="Select3Half(this.value);">
                                            <option value="0">กรุณาเลือกอายุสิ่งปลูกสร้าง</option>
                                            <option value="2">ปีที่1 ค่าเสื่อม 2%</option>
                                            <option value="4">ปีที่2 ค่าเสื่อม 4%</option>
                                            <option value="6">ปีที่3 ค่าเสื่อม 6%</option>
                                            <option value="8">ปีที่4 ค่าเสื่อม 8%</option>
                                            <option value="10">ปีที่5 ค่าเสื่อม 10%</option>
                                            <option value="14">ปีที่6 ค่าเสื่อม 14%</option>
                                            <option value="18">ปีที่7 ค่าเสื่อม 18%</option>
                                            <option value="22">ปีที่8 ค่าเสื่อม 22%</option>
                                            <option value="26">ปีที่9 ค่าเสื่อม 26%</option>
                                            <option value="30">ปีที่10 ค่าเสื่อม 30%</option>
                                            <option value="34">ปีที่11 ค่าเสื่อม 34%</option>
                                            <option value="38">ปีที่12 ค่าเสื่อม 38%</option>
                                            <option value="42">ปีที่13 ค่าเสื่อม 42%</option>
                                            <option value="46">ปีที่14 ค่าเสื่อม 46%</option>
                                            <option value="50">ปีที่15 ค่าเสื่อม 50%</option>
                                            <option value="55">ปีที่16 ค่าเสื่อม 55%</option>
                                            <option value="60">ปีที่17 ค่าเสื่อม 60%</option>
                                            <option value="65">ปีที่18 ค่าเสื่อม 65%</option>
                                            <option value="70">ปีที่19 ค่าเสื่อม 70%</option>
                                            <option value="75">ปีที่20 ค่าเสื่อม 75%</option>
                                            <option value="80">ปีที่21 ค่าเสื่อม 80%</option>
                                            <option value="85">ปีที่22 ขึ้นไป ค่าเสื่อม 85% ตลอดอายุการใช้งาน</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                                <script>
                                    function Select1Concrete() {
                                        $(document).ready(function () {
                                            $('input[type="number"]').keyup(function () {
                                                var val1 = parseFloat($('#result_buildprice').val());
                                                var val2 = document.getElementById("select1Concrete").value;
                                                var sum = val1 * val2 / 100;
                                                $("input#depreciation").val(sum);
                                            });
                                            $(document).ready(function(){
                                                $('input[type="number"]').keyup(function () {
                                                    var val1 = parseFloat($('#result_buildprice').val());
                                                    var val2 = parseFloat($('#depreciation').val());
                                                    var sum = val1-val2;
                                                    $("input#result-real").val(sum);
                                                });
                                            });
                                        });
                                    }
                                </script>

                                <script>
                                    function Select2Wooden() {
                                        $(document).ready(function () {
                                            $('input[type="number"]').keyup(function () {
                                                var val1 = parseFloat($('#result_buildprice').val());
                                                var val2 = document.getElementById("select2Wooden").value;
                                                var sum = val1 * val2 / 100;
                                                $("input#depreciation").val(sum);
                                            });
                                            $(document).ready(function(){
                                                $('input[type="number"]').keyup(function () {
                                                    var val1 = parseFloat($('#result_buildprice').val());
                                                    var val2 = parseFloat($('#depreciation').val());
                                                    var sum = val1-val2;
                                                    $("input#result-real").val(sum);
                                                });
                                            });
                                        });
                                    }
                                </script>

                                <script>
                                    function Select3Half() {
                                        $(document).ready(function () {
                                            $('input[type="number"]').keyup(function () {
                                                var val1 = parseFloat($('#result_buildprice').val());
                                                var val2 = document.getElementById("select3Half").value;
                                                var sum = val1 * val2 / 100;
                                                $("input#depreciation").val(sum);
                                            });
                                            $(document).ready(function(){
                                                $('input[type="number"]').keyup(function () {
                                                    var val1 = parseFloat($('#result_buildprice').val());
                                                    var val2 = parseFloat($('#depreciation').val());
                                                    var sum = val1-val2;
                                                    $("input#result-real").val(sum);
                                                });
                                            });
                                        });
                                    }
                                </script>

                                <div id="hide2" class="form-group col" style=";display: block">
                                    <label>เนื้อที่ใช้ทำประโยชน์ (กxย)</label>
{{--                                    @if ($landuse_type->lutid === 6)--}}
{{--                                        <input type="number" class="input value3 form-control col-2" id="width" placeholder="{{ __('ไร่') }}">--}}
{{--                                    @endif--}}
                                    <input type="number" class="input value1 form-control col-2" id="width" name="width" min="0" step="0.01" placeholder="{{ __('กว้าง') }}" onkeypress="return event.keyCode != 13;">
                                    <input type="number" class="input value2 form-control col-2" id="length" name="length" min="0" step="0.01" placeholder="{{ __('ยาว') }}" onkeypress="return event.keyCode != 13;" >
                                    <input type="number" class="input result-wl form-control col-2"  name="result-wl" id="result-wl" readonly="readonly"  step="0.01" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                    <label>ตร.เมตร</label>
                                    <input class="form-control meanprice-wl col-4" type="number" name="meanprice-wl" step="0.01" id="meanprice-wl" placeholder="{{ __('ราคาประเมินต่อตารางเมตร (บาท)') }}" onkeypress="return event.keyCode != 13;" />
                                    <label>รวมราคาสิ่งปลูกสร้าง (บาท)</label><input class="form-control value_buildprice col-4" type="number" step="0.01" readonly="readonly"  name="result_buildprice" id="result_buildprice" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>ค่าเสื่อมราคา (บาท)</label>
                                        <input type="number" class="input depreciation form-control col-8" id="depreciation"  name="depreciation" value="0" placeholder="{{ __('ค่าเสื่อม') }}" onkeypress="return event.keyCode != 13;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>ราคาประเมินสิ่งปลูกสร้างหลังหักค่าเสื่อม (บาท)</label>
                                        <input style=" background-color: #3CBC8D;color: white;" type="number" class="input result-real form-control col-8"  id="result-real" name="result_real" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                    </div>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val1 = parseFloat($('#result_buildprice').val());
                                            var val2 = parseFloat($('#depreciation').val());
                                            var sum = val1-val2;
                                            $("input#result-real").val(sum);
                                        });
                                    });
                                </script>

                                <br>
                                <h3>รวมราคาประเมินของที่ดินและสิ่งปลูกสร้าง</h3>
                                <div class="box">
                                    <div class="box-sm red"></div>
                                    <div class="box-sm orange"></div>
                                    <div class="box-sm yellow "></div>
                                    <div class="box-sm green "></div>
                                    <div class="box-sm blue "></div>
                                    <div class="box-sm purple"></div>
                                </div>
                                <div class="center">
                                    <label style="color: red">**กรุณากรอก 0 ในช่องที่ไม่ต้องการการคำนวณ**</label>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>รวมราคาประเมินที่ดิน (บาท)</label><input class="form-control" style=" background-color: #3CBC8D;color: white;" type="number" readonly="readonly"  name="result_landprice_lands" id="result_landprice_lands" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>ราคาประเมินสิ่งปลูกสร้างหลังหักค่าเสื่อม (บาท)</label>
                                            <input style=" background-color: #3CBC8D;color: white;" type="number" class="form-control" id="result-real" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>ผลรวมราคาประเมินที่ดินและสิ่งปลูกสร้างหลังหักค่าเสื่อม (บาท)</label>
                                        <input style="background-color: #2e90bc;color: white;height: 80px;font-size: 2rem" type="number" class="form-control" id="result_final" name="result_final" value="0" placeholder="{{ __('ผลลัพธ์') }}" onkeypress="return event.keyCode != 13;">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>คิดเป็นสัดส่วนตามการใช้ประโยชน์ (ร้อยละ ไม่ต้องใส่(%))</label>
                                            <input style="background-color: #2e90bc;color: white;font-size: 2rem" type="number" class="form-control" id="buildratio" name="buildratio" placeholder="{{ __('สัดส่วนการใช้ประโยชน์ ร้อยละ') }}" onkeypress="return event.keyCode != 13;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>ราคาประเมินของที่ดินและสิ่งปลูกสร้างตามสัดส่วนการใช้ประโยชน์ (บาท)</label>
                                            <input style="background-color: #2e90bc;color: #000000;font-size: 2rem" type="number" class="form-control" id="result_buildratio" name="result_buildratio" placeholder="{{ __('ผลลัพธ์') }}" readonly onkeypress="return event.keyCode != 13;">
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    $(document).change(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val1 = parseFloat($('#result_landprice_lands').val());
                                            var val2 = parseFloat($('#result-real').val());
                                            var sum = val1+val2;
                                            $("input#result_final").val(sum);
                                        });
                                    });

                                </script>
                                <script>
                                    $(document).change(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val1 = parseFloat($('#result-real').val());
                                            var val2 = parseFloat($('#buildratio').val());
                                            var sum = val1*val2/100;
                                            $("input#result_buildratio").val(sum);
                                        });
                                    });

                                </script>

                                <br>



                                {{--                                <script>--}}
{{--                                    function depreciationCheck(that) {--}}
{{--                                        if (that.value === '1') {--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("Tree").style.display = "none";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '7'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '8'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '9'){--}}
{{--                                            document.getElementById("Tree").style.display = "none";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '10'){--}}
{{--                                            document.getElementById("Tree").style.display = "none";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '11'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '12'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '13'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '14'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '16'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '999'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '1000'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '1001'){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === ''){--}}
{{--                                            document.getElementById("Tree").style.display = "block";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else if(that.value === '99'){--}}
{{--                                            document.getElementById("Tree").style.display = "none";--}}
{{--                                            document.getElementById("hide").style.display = "none";--}}
{{--                                            document.getElementById("ifYes").style.display = "block";--}}
{{--                                        }--}}
{{--                                        else{--}}
{{--                                            document.getElementById("ifYes").style.display = "none";--}}
{{--                                            document.getElementById("hide").style.display = "block";--}}
{{--                                            document.getElementById("Tree").style.display = "none";--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                </script>--}}

{{--                                @php--}}
{{--                                    $depreciation = '';--}}
{{--                                @endphp--}}

{{--                                @if($building_material->bm_id && $year_depreciation->id ==='1' )--}}
{{--                                    <? $depreciation = 1; ?>--}}
{{--                                @elseif($building_material->bm_id && $year_depreciation->id ==='2')--}}
{{--                                    <? $depreciation = 2; ?>--}}
{{--                                @endif--}}


{{--                                ส่วนคำนวณค่าเสื่อมราคา--}}

{{--                                <input type="text" id="userinput" pattern="[0-9]*">    Patten Currency เผื่อใช้                     --}}
{{--                                <br>--}}
{{--                                <input type="number" id="number">--}}

{{--                                <script>--}}
{{--                                    document.getElementById("userinput").onblur =function (){--}}

{{--                                        //number-format the user input--}}
{{--                                        this.value = parseFloat(this.value.replace(/,/g, ""))--}}
{{--                                            .toFixed(2)--}}
{{--                                            .toString()--}}
{{--                                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");--}}

{{--                                        //set the numeric value to a number input--}}
{{--                                        document.getElementById("number").value = this.value.replace(/,/g, "")--}}

{{--                                    }--}}
{{--                                </script>--}}



{{--                                <label>รายละเอียดผู้ใช้ประโยชน์</label>--}}
{{--                                <textarea name="lu_notes" class="form-control" rows="4" col="50"></textarea>--}}
{{--                                <label>รายละเอียดเพิ่มเติม</label>--}}
{{--                                <textarea name="lu_notes" class="form-control" rows="4" col="50"></textarea>--}}
                                <script>
                                    $(document).ready(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val1 = parseFloat($('.value1').val());
                                            var val2 = parseFloat($('.value2').val());
                                            var sum = Math.round(val1*val2);
                                            $("input#result-wl").val(sum);
                                        });
                                    });
                                </script>
                                <script>
                                    $(document).ready(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val4 = parseFloat($('.result-wl').val());
                                            var val5 = parseFloat($('.meanprice-wl').val());
                                            var sum = Math.round(val4*val5);
                                            $("input#result_buildprice").val(sum);
                                        });
                                    });

                                </script>

                                <h3>คำนวณภาษี</h3>
                                <div class="form-group row center" >
                                    <label style="color: red">**กรุณากรอก 0 ในช่องที่ไม่ต้องการการคำนวณ**</label>
                                    <div class="col-12">
                                        <table style="text-align: center">
                                            <tr>
                                                <td height="45" style="text-align:center">
                                                    <label style="font-size: 1.2rem;">การใช้ประโยชน์นี้ <font color="red">(กรุณาเลือก)</font></label>
                                                    <div class="col-3 center" style="margin: 0 auto">
                                                        <div class="form-check-inline mr-1 row">
                                                            <input class="radioBtn" type="radio" name="Radio" id="Radio" value="Yes"  checked>อยู่ในข่าย
                                                        </div>
                                                        <div class="form-check-inline mr-1 row">
                                                            <input type="radio" class="radioBtn" name="Radio" id="Radio" value="No" >ไม่อยู่ในข่าย
                                                        </div>
                                                    </div>

                                                    <div class="Box-tax" style="display:none;margin-top: 2%">
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label>หักมูลค่าฐานภาษีที่ได้รับยกเว้น (บาท)</label><input class="form-control" type="number" min="0" id="tax_exem" name="tax_exem" onkeypress="return event.keyCode != 13;">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label>คงเหลือราคาประเมินทุนทรัพย์ที่ต้องเสียภาษี (บาท)</label><input class="form-control" readonly="readonly" type="number" min="0" id="result_real_final" name="result_real_final" onkeypress="return event.keyCode != 13;">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label>อัตราภาษี (ร้อยละ ไม่ต้องใส่(%))</label><input class="form-control" type="number" min="0" step="0.01" max="100" name="tax_final_percent" id="tax_final_percent" onkeypress="return event.keyCode != 13;">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label>จำนวนภาษีที่ต้องชำระ (บาท)</label><input style="background-color: #fff677;color: black;font-size: 2rem" class="form-control" readonly="readonly" type="number" name="sum_pay_land_tax" id="sum_pay_land_tax" onkeypress="return event.keyCode != 13;">
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $(document).change(function(){
                                                                $('input[type="number"]').keyup(function () {
                                                                    var val1 = parseFloat($('#result_final').val());
                                                                    var val2 = parseFloat($('#tax_exem').val());
                                                                    var sum = val1-val2;
                                                                    $("input#result_real_final").val(sum);
                                                                });
                                                            });
                                                        </script>

                                                        <script>
                                                            $(document).change(function(){
                                                                $('input[type="number"]').keyup(function () {
                                                                    var val1 = parseFloat($('#result_real_final').val());
                                                                    var val2 = parseFloat($('#tax_final_percent').val());
                                                                    var sum = val1*val2/100;
                                                                    $("input#sum_pay_land_tax").val(sum);
                                                                });
                                                            });

                                                        </script>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <script>
                                    $('input[type="radio"]').click(function(){
                                        if($(this).attr("value")=="No"){
                                            $(".Box-tax").hide('slow');
                                        }
                                        if($(this).attr("value")=="Yes"){
                                            $(".Box-tax").show('slow');

                                        }
                                    });
                                    $('input[type="radio"]').trigger('click');
                                </script>

                                <br>
{{--                                <table style="height: 200px;overflow: scroll">--}}
{{--                                    <tr>--}}
{{--                                        <th>ลำดับที่</th>--}}
{{--                                        <th>ลักษณะการใช้ประโยชน์</th>--}}
{{--                                        <th>การทำประโยชน์</th>--}}
{{--                                        <th>ประเภทของพืช</th>--}}
{{--                                        <th>จำนวนเนื้อที่</th>--}}
{{--                                        <th>ลบ</th>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}

{{--                                </table>--}}
                                <br>

                                    <div class="form-group row">
                                        <div class="col-6">
                                            @foreach($lands as $land)
                                                @endforeach
                                            <input class="form-control" type="text" value="{{$inputs->id}}"  name="land_id" id="land_id" hidden readonly>
                                        </div>
                                    </div>

                            <button class="btn btn-block btn-success" type="submit" onclick="return confirm('ยืนยันการบันทึกข้อมูลที่ดินและสิ่งปลูกสร้าง')"><span class="cil-save btn-icon mr-2"></span>{{ __('บันทึก') }}</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-block btn-dark"><span class="cil-arrow-thick-from-right btn-icon mr-2"></span>{{ __('ย้อนกลับ') }}</a>

                                </form>
                    </div>

                </div>
              </div>
            </div>

                <script type="text/javascript">

                    function stopRKey(evt) {
                        var evt = (evt) ? evt : ((event) ? event : null);
                        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
                        if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
                    }

                    document.onkeypress = stopRKey;

                </script>

          </div>


        </div>
        </div>

@endsection

@section('javascript')

@endsection
