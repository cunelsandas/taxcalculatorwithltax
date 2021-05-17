@extends('dashboard.base')

@section('content')


    <style>
        table {
            font-family: arial, sans-serif;
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
            border-bottom: 10px solid #ffffff;
            text-align: center;
            font-family: "sans-serif";
            font-weight: lighter;
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
                        @foreach ($inputs as $input)
                            {{ $input->title }}
                        @endforeach


{{--                            <div class="form-group row">--}}
{{--                                <label><strong>รหัส owner_id:</strong>  {{$input->id}}</label>--}}
{{--                            </div>--}}
                            <div class="form-group row">
                                <label><strong>ปี: </strong>{{date("Y")+543}} </label>
                            </div>
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
                            @foreach($landss as $land)

                            <form method="POST" action="{{ route('lands.store', $input->owner_id) }}">
                                @csrf
                                @endforeach
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label>owner_id ยังไม่ตรงกับ inputs</label>
                                            <input class="form-control" type="text" value="{{$input->owner_id}}"  name="owner_id" readonly>
                                        </div>
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
                                            <option value="{{ $ldoc_type->ldoc_type }}">{{ $ldoc_type->ldoc_name }}</option>
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
                                        <select class="form-control" name="tambon_id">
                                            @foreach($tambons as $tambon)
                                                <option value="{{ $tambon->id }}">{{ $tambon->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>ชื่อชุมชน</label>
                                        <input class="form-control" type="text" name="community"  >
                                    </div>
                                </div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <div class="form-group row" style="display: block;margin-left: 0.2%">
                                    <label>เนื้อที่ใช้ทำประโยชน์</label>
                                    <input class="form-control rai-1 col-2" type="number" name="rai" id="rai" min="0"  placeholder="{{ __('ไร่') }}" />
                                    <input class="form-control yawn-1 col-2" type="number" name="yawn" id="yawn"  min="0"  placeholder="{{ __('งาน') }}" />
                                    <input class="form-control wa-1 col-2" type="number" name="wa" id="wa"  min="0"  placeholder="{{ __('วา') }}" />
                                    <label>ตารางวา</label><input class="form-control square-1 col-4" name="square-1" type="text" readonly="readonly" id="square-1" placeholder="{{ __('ผลลัพธ์') }}">
                                    <input class="form-control meanprice-vl col-4" type="number" name="meanprice-vl" step="0.01" id="meanprice-vl" placeholder="{{ __('ราคาประเมินต่อตารางวา (บาท)') }}" />
                                    <label>รวมราคาประเมินที่ดิน (บาท)</label><input class="form-control result-1 col-4" style=" background-color: #3CBC8D;color: white;" type="number" readonly="readonly"  name="result-1" id="result-1" placeholder="{{ __('ผลลัพธ์') }}">
                                    <script>
                                        $(document).ready(function(){
                                            $('input[type="number"]').keyup(function () {
                                                var val1 = parseFloat($('.rai-1').val());
                                                var val2 = parseFloat($('.yawn-1').val());
                                                var val3 = parseFloat($('.wa-1').val());
                                                var sum = (val1*400)+(val2*100)+val3;
                                                $("input#square-1").val(sum);
                                            });
                                        });
                                    </script>
                                    <script>
                                    $(document).ready(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val4 = parseFloat($('.square-1').val());
                                            var val5 = parseFloat($('.meanprice-vl').val());
                                            var sum = val4*val5;
                                            $("input#result-1").val(sum);
                                        });
                                    });

                                    </script>
                                </div>

                                <h3>การใช้ประโยชน์ที่ดินและสิ่งปลูกสร้าง</h3>
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
                                        <label>ลักษณะการใช้</label>
                                        <select class="form-control" name="ldoc_type">
                                            <option value=1>ใช้ประโยชน์ด้วยตนเอง (อยู่เอง) </option>
                                            <option value=2>ให้บุคคลอื่นเช่าที่ดิน (ให้เช่า)</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>ลักษณะการใช้ประโยชน์</label>
                                        <select class="form-control" name="lut_id" id="lut_id" onchange="yesnoCheck(this);">
                                            @foreach($landuse_types as $landuse_type)
                                                <option value="{{ $landuse_type->lutid }}">{{ $landuse_type->lutname }} * {{$landuse_type->multipiler}}</option>
                                            @endforeach
                                        </select>
                                        <script>
                                            function yesnoCheck(that) {
                                                if (that.value === '6') {
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("Tree").style.display = "none";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '7'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '8'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '9'){
                                                    document.getElementById("Tree").style.display = "none";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '10'){
                                                    document.getElementById("Tree").style.display = "none";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '11'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";

                                                }
                                                else if(that.value === '12'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '13'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '14'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '16'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '999'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '1000'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '1001'){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === ''){
                                                    document.getElementById("Tree").style.display = "block";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else if(that.value === '99'){
                                                    document.getElementById("Tree").style.display = "none";
                                                    document.getElementById("hide").style.display = "none";
                                                    document.getElementById("ifYes").style.display = "block";
                                                    document.getElementById("hide2").style.display = "none";
                                                    document.getElementById("hide3").style.display = "none";
                                                    document.getElementById("hide4").style.display = "none";
                                                    document.getElementById("hideOption").style.display = "none";
                                                }
                                                else{
                                                    document.getElementById("ifYes").style.display = "none";
                                                    document.getElementById("hide").style.display = "block";
                                                    document.getElementById("Tree").style.display = "none";
                                                    document.getElementById("hide2").style.display = "block";
                                                    document.getElementById("hide3").style.display = "block";
                                                    document.getElementById("hide4").style.display = "block";
                                                    document.getElementById("hideOption").style.display = "block";
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
                                        <div id="ifYes" style="display: none;">
                                            <label>เนื้อที่ใช้ทำประโยชน์ (ไร่)</label>
                                            <input class="form-control value-rai col-4" type="number" name="use_rai" id="use-rai" min="0" value="0" placeholder="{{ __('ไร่') }}" />
                                            <input class="form-control value-yawn col-4" type="number" name="use_yawn" id="use-yawn"  min="0" value="0" placeholder="{{ __('งาน') }}" />
                                            <input class="form-control value-wa col-6" type="number" name="use_wa" id="use-wa"  min="0" value="0" placeholder="{{ __('วา') }}" />
                                            <label>ตารางวา</label><input class="form-control value-square col-6" name="result_square" type="text" readonly="readonly" id="result-square" placeholder="{{ __('ผลลัพธ์') }}">
                                            <input class="form-control value-meanprice col-6" type="number" name="meanprice" step="0.01" id="meanprice" placeholder="{{ __('ราคาประเมินต่อตารางวา (บาท)') }}" />
                                            <label>รวมราคาประเมินที่ดิน (บาท)</label><input class="form-control value_landprice col-6" type="number"  name="result_landprice" id="result_landprice" placeholder="{{ __('ผลลัพธ์') }}">
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

                                <div class="form-group row" id="hide">
                                    <div class="col-3">
                                        <label>ลักษณะอาคาร</label>
                                        <select class="form-control" name="bm_id" onchange="materialCheck(this);">
                                            <option value="0">กรุณาเลือกประเภทตึก</option>
                                            @foreach($building_materials as $building_material)
                                                <option value="{{ $building_material->bm_id }}">{{ $building_material->bm_name }}</option>
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
                                <label style="color: red">กรุณาเลือกอัตราค่าเสื่อมราคาสิ่งปลูกสร้าง ***</label>
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
                                    <input type="number" class="input value1 form-control col-2" id="width" name="width" min="0" step="0.01" placeholder="{{ __('กว้าง') }}">
                                    <input type="number" class="input value2 form-control col-2" id="length" name="length" min="0" step="0.01" placeholder="{{ __('ยาว') }}" >
                                    <input type="number" class="input result-wl form-control col-2"  name="result-wl" id="result-wl" readonly="readonly"  step="0.01" placeholder="{{ __('ผลลัพธ์') }}">
                                    <label>ตร.เมตร</label>
                                    <input class="form-control meanprice-wl col-4" type="number" name="meanprice-wl" step="0.01" id="meanprice-wl" placeholder="{{ __('ราคาประเมินต่อตารางเมตร (บาท)') }}" />
                                    <label>รวมราคาสิ่งปลูกสร้าง (บาท)</label><input class="form-control value_buildprice col-4" type="number" step="0.01" readonly="readonly"  name="result_buildprice" id="result_buildprice" placeholder="{{ __('ผลลัพธ์') }}">
                                </div>

                                <div class="form-group row" id="hide3">
                                    <div class="col-6">
                                        <label>ค่าเสื่อมราคา (บาท)</label>
                                        <input type="number" class="input depreciation form-control col-8" readonly="readonly" id="depreciation" placeholder="{{ __('ค่าเสื่อม') }}">
                                    </div>
                                </div>
                                <div class="form-group row" id="hide4">
                                    <div class="col-6">
                                        <label>ราคาประเมินสิ่งปลูกสร้างหลังหักค่าเสื่อม (บาท)</label>
                                        <input style=" background-color: #3CBC8D;color: white;" type="number" class="input result-real form-control col-8"  id="result-real" placeholder="{{ __('ผลลัพธ์') }}">
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
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>รวมราคาประเมินที่ดิน (บาท)</label><input class="form-control" style=" background-color: #3CBC8D;color: white;" type="number" readonly="readonly"  name="result-1" id="result-1" placeholder="{{ __('ผลลัพธ์') }}">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>ราคาประเมินสิ่งปลูกสร้างหลังหักค่าเสื่อม (บาท)</label>
                                            <input style=" background-color: #3CBC8D;color: white;" type="number" class="form-control" readonly="readonly"  id="result-real" placeholder="{{ __('ผลลัพธ์') }}">
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <input style="background-color: #2e90bc;color: white;height: 80px;font-size: 2rem" type="number" class="form-control" readonly="readonly" id="result_final" name="result_final" placeholder="{{ __('ผลลัพธ์') }}">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>คิดเป็นสัดส่วนตามการใช้ประโยชน์ (ร้อยละ)</label>
                                            <input style="background-color: #2e90bc;color: white;font-size: 2rem" type="number" class="form-control" id="buildratio" placeholder="{{ __('สัดส่วนการใช้ประโยชน์ ร้อยละ') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>ราคาประเมินของที่ดินและสิ่งปลูกสร้างตามสัดส่วนการใช้ประโยชน์ (บาท)</label>
                                            <input style="background-color: #2e90bc;color: white;font-size: 2rem" type="number" class="form-control" id="result_buildratio" name="result_buildratio" placeholder="{{ __('ผลลัพธ์') }}">
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $(document).change(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val1 = parseFloat($('#result-1').val());
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
                                    <div class="col-12" style="text-align: center;">
                                        <table style="text-align: center">
                                            <tr>
                                                <td height="45" style="text-align:center">
                                                    <label style="font-size: 1.2rem;">การใช้ประโยชน์นี้</label>
                                                    <input class="radioBtn" type="radio" name="Radio" id="Radio" value="Yes" required checked>อยู่ในข่าย
                                                    <input type="radio" class="radioBtn" name="Radio" id="Radio" value="No" required>ไม่อยู่ในข่าย


                                                    <div class="Box-tax" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label>หักมูลค่าฐานภาษีที่ได้รับยกเว้น (บาท)</label><input class="form-control" type="number" min="0" id="yincome" name="yincome">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label>คงเหลือราคาประเมินทุนทรัพย์ที่ต้องเสียภาษี (บาท)</label><input class="form-control" type="number" min="0" id="reduce" name="reduce">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label>อัตราภาษี (ร้อยละ)</label><input class="form-control" type="text" name="reduce_note" id="reduce_note">
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $(document).change(function(){
                                                                $('input[type="number"]').keyup(function () {
                                                                    var val1 = parseFloat($('#yincome').val());
                                                                    var val2 = parseFloat($('#reduce').val());
                                                                    var sum = val1-val2;
                                                                    $("input#net_yincome").val(sum);
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
                                <table style="height: 200px;overflow: scroll">
                                    <tr>
                                        <th>ลำดับที่</th>
                                        <th>ลักษณะการใช้ประโยชน์</th>
                                        <th>การทำประโยชน์</th>
                                        <th>ประเภทของพืช</th>
                                        <th>จำนวนเนื้อที่</th>
                                        <th>ลบ</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </table>
                                <br>

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
