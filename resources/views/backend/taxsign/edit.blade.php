@extends('dashboard.base')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>ชื่อและที่อยู่เจ้าของป้าย</strong></div>
                    <div class="card-body col-6">

                            {{ $inputs->title }}
                        <div style="margin-left: 2%">
                        <div class="form-group row">
                            <label><strong>ปี: </strong>{{date("Y")+543}} </label>
                        </div>
                            <div class="form-group row">
                                <label><strong>ID:</strong> {{$inputs->id}}</label>
                            </div>
                        <div class="form-group row">
                            <label><strong>ชื่อเจ้าของทรัพย์สิน:</strong> {{$inputs->name_titles}} {{$inputs->first_name}} {{$inputs->last_name}}
                            </label>
                        </div>
                        <div class="form-group row">
                            <label><strong>เลขประจำตัวประชาชน:</strong> {{ $inputs->card_id }}</label>
                        </div>

                        <div class="form-group row">
                            <label><strong>ที่อยู่:</strong> {{$inputs->address_number}} หมู่: {{$inputs->moo}}
                                ซอย: {{$inputs->moo}} ถนน: {{$inputs->road}}</label>
                        </div>
                        <div class="form-group row">
                            <label>ตำบล: {{$inputs->tambon}} อำเภอ: {{$inputs->amphoe}}
                                จังหวัด: {{$inputs->province}}</label>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>สถานที่ติดตั้งป้าย</strong></div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('signs.update', $inputs->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-6">
                                    <input class="form-control" type="text" value="{{$inputs->id}}"  hidden name="owner_id" id="owner_id" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">ชื่อสถานประกอบการค้าหรือกิจการอื่นๆ</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="text-input" type="text" name="s_name"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">วันที่ติดตั้งป้าย</label>
                                <div class="col-md-3">
                                    <input class="form-control" id="date-input" type="date" name="setup_date"
                                    >
                                </div>
                                <label class="col-md-2 col-form-label">รหัสแปลงที่ดิน</label>
                                <div class="col-md-3">
                                    <input class="form-control" id="text-input" type="text" name="b_code"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">บ้านเลขที่</label>
                                <div class="col-md-2">
                                    <input class="form-control" id="text-input" type="text" name="address"
                                    >
                                </div>
                                <label class="col-md-1 col-form-label">หมู่</label>
                                <div class="col-md-1">
                                    <input class="form-control" id="text-input" type="text" name="moo"
                                    >
                                </div>
                                <label class="col-md-1 col-form-label">ซอย</label>
                                <div class="col-md-2">
                                    <input class="form-control" id="text-input" type="text" name="soi"
                                    >
                                </div>
                                <label class="col-md-1 col-form-label">ถนน</label>
                                <div class="col-md-2">
                                    <input class="form-control" id="text-input" type="text" name="road"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ตำบล</label>
                                <div class="col-md-2">
                                    <input class="form-control" id="text-input" type="text" name="tambon_id">
                                </div>
                                <label class="col-md-2 col-form-label">สถานที่ใกล้เคียง</label>
                                <div class="col-md-6">
                                    <input class="form-control" id="text-input" type="text" name="nearby"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ระหว่าง กม. ที่</label>
                                <div class="col-md-4">
                                    <input class="form-control" id="text-input" type="text" name="bkm"
                                    >
                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">สถานที่แสดงป้าย</label>
                                <div class="col-md-10 col-form-label">
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio1" type="radio" value="1"
                                               name="s_location">
                                        <label class="form-check-label" for="radio1">ป้ายหน้าร้าน</label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio2" type="radio" value="2"
                                               name="s_location">
                                        <label class="form-check-label" for="radio2">ป้ายตั้งหน้าร้าน</label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio3" type="radio" value="3"
                                               name="s_location">
                                        <label class="form-check-label" for="radio3">ป้ายแขวนหน้าร้าน</label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio4" type="radio" value="4"
                                               name="s_location">
                                        <label class="form-check-label" for="radio4">ป้ายติดกระจก </label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio5" type="radio" value="5"
                                               name="s_location">
                                        <label class="form-check-label" for="radio5">ป้ายบนหลังคา</label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio6" type="radio" value="6"
                                               name="s_location">
                                        <label class="form-check-label" for="radio6">ป้ายหน้าโครงการ</label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio7" type="radio" value="7"
                                               name="s_location">
                                        <label class="form-check-label" for="radio7">ป้ายริมถนน</label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio8" type="radio" value="8"
                                               name="s_location">
                                        <label class="form-check-label" for="radio8">ป้ายภายในอาคาร</label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio9" type="radio" value="9"
                                               name="s_location">
                                        <label class="form-check-label" for="radio9">ป้ายโครงสร้าง</label>
                                    </div>
                                    <div class="form-check-inline mr-1 row">
                                        <input class="form-check-input" id="radio10" type="radio" value="10"
                                               name="s_location">
                                        <label class="form-check-label" for="radio10">อื่นๆ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ป้ายแสดง/โฆษณา</label>
                                <div class="col-md-4">
                                    <select class="form-control" id="select1" name="s_option">
                                        <option value="1">ป้าย/แสดงโฆษณาทั่วไป</option>
                                        <option value="2">ป้ายภายในอาคาร 3 ตร.ม ขึ้นไป</option>
                                        <option value="3">ป้ายตามกฎหมายทะเบียนพาณิชย์</option>
                                    </select>
                                </div>
                                <label class="col-md-2 col-form-label" for="select2">ลักษณะของป้าย</label>
                                <div class="col-md-4">
                                    <select class="form-control" id="select2" name="s_character">
                                        <option value="1">ป้ายทั่วไป</option>
                                        <option value="2">ป้ายอิเล้กทรอนิกส์</option>
                                        <option value="3">ป้ายไตรวิชั่น</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ประเภทของป้าย</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="select3" name="sign_type_id">
                                        @foreach ($sign_types as $sign_type)
                                            <option
                                                value="{{ $sign_type->sign_type_id }}"
                                                data-sign_tax="{{$sign_type->sign_tax}}">{{$sign_type -> sign_desc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="select1">อัตราภาษีป้าย</label>
                                <div class="col-md-2">
                                    <input class="form-control" id="sign_tax" type="text" name="sign_tax" readonly>
                                </div>
                                <label class="col-md-3 col-form-label">/ 1 หน่วย (500 ตรซม.)</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ขนาดของป้าย (ซม.)</label>
                                <div class="col-md-2">
                                    <input class="form-control" id="sw" type="number" name="sw" onkeypress="return event.keyCode != 13;">
                                </div>
                                <div>x</div>
                                <div class="col-md-2">
                                    <input class="form-control" id="sl" type="number" name="sl" onkeypress="return event.keyCode != 13;">
                                </div>
                                <label class="col-md-2 col-form-label">เนื้อที่ป้าย</label>
                                <div class="col-md-2">
                                    <input class="form-control" id="area" type="number" name="area" readonly onkeypress="return event.keyCode != 13;">
                                </div>
                                <label class="col-md-2 col-form-label">ตร.ซม. </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">จำนวนด้านของป้าย</label>
                                <div class="col-md-1">
                                    <input class="form-control" id="text-input"  type="number" min="0" step="1"  name="no_side" onkeypress="return event.keyCode != 13;">
                                </div>
                                <label class="col-md-1 col-form-label">ด้าน</label>
                                <label class="col-md-2 col-form-label">จำนวนหน่วย</label>
                                <div class="col-md-3">
                                    <input class="form-control" id="countn" type="text" name="countn" readonly>
                                </div>
                                <label class="col-md-1 col-form-label">หน่วย</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ข้อความภายในป้าย</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="textarea-input" name="s_desc" rows="4"
                                    ></textarea>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="select1">งวดที่ติดตั้งป้าย</label>
                                <div class="col-md-4">
                                    <select class="form-control" id="select1" name="sm">
                                        <option value="1">งวด 1 (มกราคาม - มีนาคม)</option>
                                        <option value="2">งวด 2 (เมษายน - มิถุนายน)</option>
                                        <option value="3">งวด 3 (เมษายน - มิถุนายน)</option>
                                        <option value="4">งวด 4 (ตุลามคม - ธันวาคม)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">รวมเงินภาษีป้าย</label>
                                <div class="col-md-6">
                                    <input class="form-control" id="tax" type="text" name="tax" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">หมายเหตุ</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="note" name="note" rows="4"
                                    ></textarea>
                                </div>
                            </div>
                            <button class="btn btn-block btn-success" type="submit" onclick="return confirm('ยืนยันการบันทึกข้อมูลภาษีป้าย')"><span class="cil-save btn-icon mr-2"></span>{{ __('บันทึก') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        //คำนวนพื้นที่ป้าย
        $(document).ready(function () {
            $('input[type="number"]').keyup(function () {
                var val1 = parseFloat($('#sw').val());
                var val2 = parseFloat($('#sl').val());
                var sum = Math.round(val1 * val2);
                $("input#area").val(sum);
            });
        });


        //แสดงค่า ในดรอปดาว  select3
        $(document).ready(function () {
            $('#select3').on('change', function () {
                var tax = $(this).children('option:selected').data('sign_tax');
                $('#sign_tax').val(tax);
            });
        });

        //คำนวน จำนวนหน่วยของป้าย
        $(document).ready(function () {
            $('input[type="number"]').keyup(function () {
                var val1 = parseFloat($('#area').val());
                var sum = Math.round(val1 / 500);
                $("input#countn").val(sum);
            });
        });

        //คำนวนอัตราภาษีป้าย ตอนเลือก select3
        $(document).ready(function () {
            $('#select3').on('change', function () {
                var val1 = parseFloat($('#sign_tax').val());
                var val2 = parseFloat($('#countn').val());
                var sum = Math.round(val1 * val2);
                $("input#tax").val(sum);
            });
        });

        $(document).ready(function () {
            $('input[type="number"]').keyup(function () {
                var val1 = parseFloat($('#sign_tax').val());
                var val2 = parseFloat($('#countn').val());
                var sum = Math.round(val1 * val2);
                $("input#tax").val(sum);
            });
        });
    </script>


    <script type="text/javascript">

        function stopRKey(evt) {
            var evt = (evt) ? evt : ((event) ? event : null);
            var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
            if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
        }

        document.onkeypress = stopRKey;

    </script>



@endsection
