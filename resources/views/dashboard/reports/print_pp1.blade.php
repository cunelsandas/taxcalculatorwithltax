@extends('dashboard.base')

@section('content')

    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>แบบแสดงรายการภาษีป้าย (ภ.ป. 1)</div>
                        <div class="card-body" id="PP1">
                            <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
                            <style type="text/css">
                                .tg  {border-collapse:collapse;border-spacing:0;}
                                .tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg .tg-wa1i{font-weight:bold;text-align:center;vertical-align:middle}
                                .tg .tg-7btt{font-weight:bold;border-color:inherit;text-align:center;vertical-align:top}
                                .tg .tg-fymr{font-weight:bold;border-color:inherit;text-align:left;vertical-align:top}
                                .tg .tg-uzvj{font-weight:bold;border-color:inherit;text-align:center;vertical-align:middle}
                                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
                                .tg .tg-0lax{text-align:left;vertical-align:top}
                            </style>
{{--                            <h2 align="center">แบบแสดงรายการภาษีป้าย (ภ.ป. 1)</h2>--}}
                            <br>
                            <h4>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ภ.ป. 1</h4>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; แบบแสดงรายการปภาษีป้าย</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ประจำปี พ.ศ. ...............</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ชื่อเจ้าของป้าย @foreach($inputs as $input) {{$input->first_name}} {{$input->last_name}} @endforeachชื่อสถานที่ประกอบการค้าหรือกิจกรรมอื่น@foreach($sign_boards as $sign_board) {{$sign_board->s_name}}@endforeach</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เลขที่ @foreach($inputs as $input) {{$input->address_number}}  ตรอก, ซอย {{$input->soi}}  ถนน  {{$input->road}}  หมู่ที่ {{$input->moo}} </p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ตำบล {{$input->tambon}}  อำเภอ {{$input->amphoe}}จังหวัด {{$input->province}} โทรศัพท์ {{$input->telephone}} </p> @endforeach
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ขอยื่นแบบแสดงรายการภาษีป้ายต่อพนักงานเจ้าหน้าที่ ณ .......................................ตามรายการต่อไปนี้</p>
                            <table class="tg">
                                <tr>
                                    <th class="tg-7btt" rowspan="2">1<br>ประเภท<br>ป้าย</th>
                                    <th class="tg-7btt" colspan="2">2<br>ขนาดป้าย ซ.ม.</th>
                                    <th class="tg-7btt" rowspan="2">3<br>เนื้อที่ป้าย<br>ตาราง ซ.ม.</th>
                                    <th class="tg-7btt" rowspan="2">4<br>จำนวนป้าย<br><br> </th>
                                    <th class="tg-7btt" rowspan="2">5<br>ข้อความหรือภาพหรือเครื่องหมายที่ปรากฏ<br>ในป้ายโดยย่อ</th>
                                    <th class="tg-7btt" rowspan="2">6<br>สถานที่ติดตั้งป้ายและวันติดตั้ง (แสดงป้าย)<br>ถนน, ตรอก, ซอย, ตำบล, อำเภอ, สถานที่ใกล้เคียง<br>หรือระหว่าง ก.ม. ที่</th>
                                    <th class="tg-fymr" rowspan="2">หมายเหตุ</th>
                                </tr>
                                <tr>
                                    <td class="tg-7btt">กว้าง</td>
                                    <td class="tg-7btt">ยาว</td>
                                </tr>
                                <tr>
                                    <td class="tg-uzvj" rowspan="4"><br><br>(1)<br>มีอักษร<br>ไทยล้วน<br><br> <br> <br></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                                <tr>
                                    <td class="tg-wa1i" rowspan="4">(2)<br>มีอักษร<br>ไทยปน<br>อักษร<br>ต่างประเทศ<br>หรือ<br>เครื่องหมาย</td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                                <tr>
                                    <td class="tg-wa1i" rowspan="4"><br><br>(3)<br>ป้ายที่ไม่มี<br>อักษรไทย<br><br> <br>&nbsp;&nbsp;</td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                            </table>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ข้าพเจ้าขอรับรองว่ารายการที่แจ้งไว้ในแบบนี้ถูกต้องและครบถ้วนตามความจริงทุกประการ</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; วันที่..................... เดือน................................ พ.ศ. ..................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ลงชื่อ............................................................. เจ้าของป้าย</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                        <a style="margin: 0 auto;text-align: center" class="btn btn-info btn-lg col-3" onclick="printDiv()">
                            <span class="cil-print btn-icon mr-2"></span> พิมพ์แบบแสดงรายการภาษีป้าย (ภ.ป. 1)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')
    <script>
        function printDiv() {
            var divContents = document.getElementById("PP1").innerHTML;
            var a = window.open('', '', '');
            a.document.write('<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">');
            a.document.write('<style>@page{size:landscape;}</style><html><head><title>แบบแสดงรายการภาษีป้าย (ภ.ป. 1)</title>');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>

@endsection
