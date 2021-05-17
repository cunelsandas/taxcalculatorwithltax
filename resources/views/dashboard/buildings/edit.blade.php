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

        .hideform {
            display: none;
        }

        #panel, .flip {
            border: solid 1px #a6d8a8;
        }

        #panel {
            display: none;
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
                            <form method="POST" action="{{ route('buildings.store', $input->id) }}">
                                @csrf
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label>owner_id ยังไม่ตรงกับ inputs</label>
                                            <input class="form-control" type="text" value="{{$input->id}}"  name="owner_id" readonly>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>รหัสประจำบ้าน</label>
                                        <input class="form-control" type="text" placeholder="{{ __('รหัสประจำบ้าน') }}"  name="house_code">
                                    </div>
                                    <div class="col-3">
                                    <label>เลขรหัสโรงเรือน</label>
                                    <input class="form-control" type="text" placeholder="{{ __('เลขรหัสโรงเรือน') }}"  name="b_code">
                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>รหัสแปลงที่ดิน</label>
                                        <input class="form-control" type="text" placeholder="{{ __('รหัสแปลงที่ดิน') }}"  name="land_id">
                                    </div>
                                    <div class="col-1">
                                        <label>บ้านเลขที่</label>
                                        <input class="form-control" type="text" placeholder="{{ __('บ้านเลขที่') }}"  name="baddress">
                                    </div>
                                    <div class="col-1">
                                        <label>หมู่ที่</label>
                                        <input class="form-control" type="text" placeholder="{{ __('หมู่ที่') }}"  name="bmoo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>ชื่ออาคาร</label>
                                        <input class="form-control" type="text" placeholder="{{ __('ชื่ออาคาร') }}"  name="bname" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>ตรอก/ซอย</label>
                                        <input class="form-control" type="text" placeholder="{{ __('ตรอก/ซอย') }}"  name="bsoi">
                                    </div>
                                    <div class="col-3">
                                        <label>ถนน</label>
                                        <input class="form-control" type="text" placeholder="{{ __('ถนน') }}"  name="broad">
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
                                </div>

                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>ประเภทอาคาร</label>
                                        <select class="form-control" name="bt_id">
                                            @foreach($building_types as $building_type)
                                                <option value="{{$building_type->bt_id }}">{{$building_type->bt_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-3">
                                    <label>ลักษณะอาคาร</label>
                                    <select class="form-control" name="bm_id">
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

                                <div class="form-group row">
                                    <div class="col-1">
                                        <label>จำนวนห้อง</label>
                                        <input class="form-control" type="text" name="bfloor"  >
                                    </div>
                                    <div class="col-1">
                                        <label>จำนวนชั้น</label>
                                        <input class="form-control" type="text" name="broom"  >
                                    </div>
                                    <label>ขนาด (กว้างxยาว)</label>
                                    <div class="col-1">
                                        <label>กว้าง</label>
                                        <input class="form-control" type="number" name="bwidth" id="bwidth">
                                    </div><label class="col-0.5">X</label>
                                    <div class="col-1">
                                        <label>ยาว</label>
                                        <input class="form-control" type="number" name="blength" id="blength">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>ก่อสร้างเสร็จเมื่อ</label>
                                        <input class="form-control" type="date" name="bcomplete_date"  >
                                    </div>

                                    <div class="col-3">
                                        <label>ราคาก่อสร้าง (บาท)</label>
                                        <input class="form-control" type="text" name="bprice"  >
                                    </div>
                                </div>


                                <div class="form-group row">
                                <div class="col" style="background-image: linear-gradient(to right, #006fff, #0084ff, #0096fd, #00a5f5, #12b2eb);">
                                    <label style="font-size: 1.2rem">การใช้ประโยชน์ของโรงเรือนและสิ่งปลูกสร้าง</label>
                                </div>
                                 <button class="btn btn-block btn-primary" disabled><label class="cil-library-add">เพิ่มการใช้ประโยชน์โรงเรือน</label></button>
                                </div>

                                <p style="text-align: center;background-color: #98ff72" class="flip" onclick="myFunction()">คลิกเพื่อเพิ่มชื่อ-สกุล ที่อยู่ ผู้ครอบครอง</p>

                                <div id="panel">

                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label>ชื่อ-สกุล</label>
                                            <input class="form-control" type="text" name="bfloor"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label>บ้านเลขที่</label>
                                            <input class="form-control" type="text" name="broom"  >
                                        </div>
                                        <div class="col-1">
                                            <label>หมู่่</label>
                                            <input class="form-control" type="number" name="bwidth" id="bwidth">
                                        </div>
                                        <div class="col-1">
                                            <label>ซอย</label>
                                            <input class="form-control" type="number" name="blength" id="blength">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label>ถนน</label>
                                            <input class="form-control" type="text" name="broom"  >
                                        </div>
                                        <div class="col-3">
                                            <label>จังหวัด</label>
                                            <input class="form-control" type="number" name="bwidth" id="bwidth">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label>อำเภอ</label>
                                            <input class="form-control" type="text" name="broom"  >
                                        </div>
                                        <div class="col-3">
                                            <label>ตำบล</label>
                                            <input class="form-control" type="number" name="bwidth" id="bwidth">
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function myFunction() {
                                        document.getElementById("panel").style.display = "block";
                                    }
                                </script>

                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>การใช้ประโยชน์</label>
                                        <select class="form-control" name="lut_id" id="lut_id" onchange="rentCheck(this);">
                                            @foreach($building_categorys as $building_category)
                                                <option value="{{ $building_category->usage_id }}">{{ $building_category->usage_desc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>ลักษณะการใช้</label>
                                        <select class="form-control" name="ldoc_type">
                                            <option value=1>โรงเรือนทั่วไป</option>
                                            <option value=2>โรงเรือนพิเศษ</option>
                                            <option value=3>พื้นที่ต่อเนื่อง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>รายละเอียดเพิ่มเติม</label>
                                        <input class="form-control" type="text" name="broom">
                                    </div>
                                </div>


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

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <div class="form-group row">
                                    <label>เนื้อที่ใช้ทำประโยชน์ (กxย)</label>
{{--                                    @if ($landuse_type->lutid === 6)--}}
{{--                                        <input type="number" class="input value3 form-control col-2" id="width" placeholder="{{ __('ไร่') }}">--}}
{{--                                    @endif--}}
                                    <input type="number" class="input value1 form-control col-1" id="width" min="0" placeholder="{{ __('กว้าง') }}">
                                    <input type="number" class="input value2 form-control col-1" id="length" min="0" placeholder="{{ __('ยาว') }}" >
                                    <input type="text" disabled="disabled" id="result" placeholder="{{ __('ผลลัพธ์') }}">
                                    <label>ตารางเมตร</label>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $("#bwidth").keyup(function () {
                                            var value = $(this).val();
                                            $("#width").val(value);
                                        });
                                        $("#blength").keyup(function () {
                                            var value = $(this).val();
                                            $("#length").val(value);
                                        });
                                    });
                                </script>

                                <script>
                                    $(document).change(function(){
                                        $('input[type="number"]').keyup(function () {
                                            var val1 = parseFloat($('.value1').val());
                                            var val2 = parseFloat($('.value2').val());
                                            var sum = val1*val2;
                                            $("input#result").val(sum);
                                        });
                                    });

                                </script>

                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>จำนวนห้อง</label>
                                        <input class="form-control" type="number" min="0" name="bcomplete_date"  >
                                    </div>

                                    <div class="col-2">
                                        <label>ชั้น</label>
                                        <input class="form-control" type="number" min="0" name="bprice"  >
                                    </div>
                                </div>


                                <script>
                                    function rentCheck(that) {
                                        if (that.value === '0') {
                                            document.getElementById("ifYes").style.display = "none";
                                            document.getElementById("meanRent").style.display = "none";
                                        }
                                        else{
                                            document.getElementById("ifYes").style.display = "block";
                                            document.getElementById("meanRent").style.display = "block";
                                        }
                                    }
                                </script>

                                <div class="form-group row" id="ifYes" style="display: none;">
                                    <div class="col-3">
                                        <label>วัน/เดือน/ปี ที่เช่า</label>
                                        <input class="form-control" type="date" name="bcomplete_date">
                                    </div>
                                    <div class="col-3">
                                        <label>จำนวนปีที่เช่า</label>
                                        <input class="form-control" type="number" name="bcomplete_date" min="0" placeholder="{{ __('ปี') }}">
                                    </div>
                                </div>

                                <div class="form-group row" id="meanRent" style="display: none;">
                                    <div class="col-3">
                                        <select class="form-control" onchange="meanCheck(this);">
                                            <option value=1>อัตราค่าเช่ามาตรฐานกลาง</option>
                                            <option value=2>ค่าเช่าต่อเดือน</option>
                                            <option value=3>ค่าเช่ารวมทั้งปี</option>
                                            <option value=4>ค่าเช่ารายวัน / โรงแรม</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="monthRent" style="display: none;">
                                    <div class="row">
                                        <label>อัตราค่าเช่าเท่ากันทุกเดือน</label>
                                        <input class="form-control col-4 value-month" type="number" name="value-month" id="value-month" min="0">
                                        <br>
                                    </div>
                                        <div class="row">
                                        <input class="form-control col-2" type="number" name="rent_m1" id="rent_m1" min="0" placeholder="{{ __('มกราคม') }}">
                                        <input class="form-control col-2" type="number" name="rent_m2" id="rent_m2" min="0" placeholder="{{ __('กุมภาพันธ์') }}">
                                        <input class="form-control col-2" type="number" name="rent_m3" id="rent_m3" min="0" placeholder="{{ __('มีนาคม') }}">
                                        <input class="form-control col-2" type="number" name="rent_m4" id="rent_m4" min="0" placeholder="{{ __('เมษายน') }}">
                                        <input class="form-control col-2" type="number" name="rent_m5" id="rent_m5" min="0" placeholder="{{ __('พฤษภาคม') }}">
                                        <input class="form-control col-2" type="number" name="rent_m6" id="rent_m6" min="0" placeholder="{{ __('มิถุนายน') }}">
                                        <input class="form-control col-2" type="number" name="rent_m7" id="rent_m7" min="0" placeholder="{{ __('กรกฎาคม') }}">
                                        <input class="form-control col-2" type="number" name="rent_m8" id="rent_m8" min="0" placeholder="{{ __('สิงหาคม') }}">
                                        <input class="form-control col-2" type="number" name="rent_m9" id="rent_m9" min="0" placeholder="{{ __('กันยายน') }}">
                                        <input class="form-control col-2" type="number" name="rent_m10" id="rent_m10" min="0" placeholder="{{ __('ตุลาคม') }}">
                                        <input class="form-control col-2" type="number" name="rent_m11" id="rent_m11" min="0" placeholder="{{ __('พฤศจิกายน') }}">
                                        <input class="form-control col-2" type="number" name="rent_m12" id="rent_m12" min="0" placeholder="{{ __('ธันวาคม') }}">
                                    </div>
                                    </div>

{{--                                    <div class="row" id='elements'></div>--}}
{{--                                    <script>--}}
{{--                                        for(var i=0;i<12;i++){--}}
{{--                                            document.getElementById('elements').innerHTML=document.getElementById('elements').innerHTML+"<input type='number' class='form-control col-2' id='month'>";--}}
{{--                                        }--}}
{{--                                    </script>--}}

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#value-month").keyup(function () {
                                                    var value = $(this).val();
                                                    $("#rent_m1,#rent_m2,#rent_m3,#rent_m4,#rent_m5,#rent_m6,#rent_m7,#rent_m8,#rent_m9,#rent_m10,#rent_m11,#rent_m12").val(value);
                                                });
                                        });
                                    </script>



                                <script>
                                    function meanCheck(that) {
                                        if (that.value === '2') {
                                            document.getElementById("monthRent").style.display = "block";
                                        }
                                        else{
                                            document.getElementById("monthRent").style.display = "none";
                                        }
                                    }
                                </script>

                                <div class="form-group">
                                        <label>หมายเหตุ</label>
                                        <textarea class="form-control" rows="4" cols="50" type="number" name="bcomplete_date"> </textarea>
                                </div>

                                <div class="form-group row">
                                    <div class="col" style="background-image: linear-gradient(to right, #006fff, #0084ff, #0096fd, #00a5f5, #12b2eb);">
                                        <label style="font-size: 1.2rem">คำนวณภาษีโรงเรือนและทีดิน</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6" style="text-align: center;">
                                            <table style="text-align: center">
                                                <tr>
                                                    <td height="45" style="text-align:center">
                                                        <label style="font-size: 1.2rem;">การใช้ประโยชน์นี้</label>
                                                        <input class="radioBtn" type="radio" name="Radio" id="Radio" value="Yes" required checked>อยู่ในข่าย
                                                        <input type="radio" class="radioBtn" name="Radio" id="Radio" value="No" required>ไม่อยู่ในข่าย


                                                        <div class="Box-tax" style="display:none;background-color: #59ecff;">
                                                            <div class="form-group row" style="text-align: center">
                                                                <div class="col-4">
                                                                    <label>ค่าเช่ามาตรฐานกลาง</label><input class="form-control" type="number" min="0" name="bcomplete_date" placeholder="{{ __('บาท') }}">
                                                                </div>
                                                                <div class="col-4">
                                                                    <label>เดือน</label><input class="form-control" type="number" min="0" max="12" step="1" name="bcomplete_date" placeholder="{{ __('จำนวนเดือน 1-12') }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-10">
                                                                    <label>ค่ารายปี</label><input class="form-control" type="number" min="0" id="yincome" name="yincome">
                                                                </div>
                                                            </div>

                                                            <script>
                                                                $(document).change(function(){
                                                                    $('input[type="number"]').keyup(function () {
                                                                        var val1 = parseFloat($('#rent_m1').val());
                                                                        var val2 = parseFloat($('#rent_m2').val());
                                                                        var val3 = parseFloat($('#rent_m3').val());
                                                                        var val4 = parseFloat($('#rent_m4').val());
                                                                        var val5 = parseFloat($('#rent_m5').val());
                                                                        var val6 = parseFloat($('#rent_m6').val());
                                                                        var val7 = parseFloat($('#rent_m7').val());
                                                                        var val8 = parseFloat($('#rent_m8').val());
                                                                        var val9 = parseFloat($('#rent_m9').val());
                                                                        var val10 = parseFloat($('#rent_m10').val());
                                                                        var val11 = parseFloat($('#rent_m11').val());
                                                                        var val12 = parseFloat($('#rent_m12').val());
                                                                        var sum = val1+val2+val3+val4+val5+val6+val7+val8+val9+val10+val11+val12;
                                                                        $("input#yincome").val(sum);
                                                                    });
                                                                });

                                                            </script>

                                                            <div class="form-group">
                                                                <div class="col-10">
                                                                    <label>ส่วนลดค่ารายปี</label><input class="form-control" type="number" min="0" id="reduce" name="reduce">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-10">
                                                                    <label>สาเหตุที่มีการลด</label><input class="form-control" type="text" name="reduce_note" id="reduce_note">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-10">
                                                                    <label>รวมค่ารายปีสุทธิ</label><input class="form-control" type="number" min="0" id="net_yincome" name="net_yincome"  >
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
