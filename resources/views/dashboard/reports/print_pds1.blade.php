@extends('dashboard.base')
@section('content')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card" style="width: 180%;">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>ราคาประเมินทุนทรัพย์ของที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 1)</div>
                        <div class="card-body" id="PDS1">
                            <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
                            <div class="panel-body">
                            </div>
                            {{--   print ภ.ด.ส.1--}}

{{--                            {{\App\Http\Controllers\ReportsController::print_pds1()}}--}}
                            <style type="text/css">
                                .tg  {border-collapse:collapse;border-spacing:0;}
                                .tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:2px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:2px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle}
                                .tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
                                .tg .tg-baqh{text-align:center;vertical-align:top}
                                .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
                                .tg .tg-0lax{text-align:left;vertical-align:top}
                                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
                            </style>
                            {{--    <div class="container-fluid">--}}
                            {{--        <div class="animated fadeIn">--}}

                            {{--                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
                            {{--                    <div class="card">--}}
                            {{--                        <div class="card-header">--}}
                            {{--                            <i class="fa fa-align-justify"></i>ภ.ด.ส.3</div>--}}
                            {{--                        <div class="card-body">--}}
                            <h2 align="center">ราคาประเมินทุนทรัพย์ของที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 1)</h2>
                            <br>
                            <table class="tg">
                                <tr>
                                    <th class="tg-9wq8" rowspan="3">ที่</th>
                                    <th class="tg-9wq8" rowspan="3">ประเภทที่ดิน</th>
                                    <th class="tg-9wq8" rowspan="3">หน้าสำรวจ</th>
                                    <th class="tg-9wq8" rowspan="3">เลขที่</th>
                                    <th class="tg-9wq8" rowspan="3">สถานที่ตั้ง<br>(หมู่/ชุมชน/ตำบล)</th>
                                    <th class="tg-9wq8" rowspan="3">ลักษณะ<br>การใช้<br>ประโยชน์</th>
                                    <th class="tg-9wq8" colspan="6">ราคาประเมินทุนทรัพย์ของที่ดิน</th>
                                    <th class="tg-9wq8" colspan="11">ราคาประเมินทุนทรัพย์ของสิ่งปลูกสร้าง</th>
                                    <th class="tg-baqh" rowspan="3"><br><br><br>รวมราคาประเมิน<br>ของที่ดิน<br>และสิ่งปลูกสร้าง<br>(บาท)</th>
                                    <th class="tg-baqh" rowspan="3"><br><br><br>ราคาประเมิน<br>ของที่ดินและสิ่ง<br>ปลูกสร้างตาม<br>สัดส่วนการใช้<br>ประโยชน์<br>(บาท)</th>
                                    <th class="tg-baqh" rowspan="3"><br><br><br>หักมูลค่า<br>ฐานภาษี<br>ที่ได้รับยกเว้น<br>(บาท)</th>
                                    <th class="tg-baqh" rowspan="3"><br><br><br>คงเหลือ<br>ราคาประเมิน<br>ทุนทรัพย์<br>ที่ต้องเสียภาษี<br>(บาท)</th>
                                    <th class="tg-c3ow" rowspan="3"><br><br><br>อัตราภาษี<br>(ร้อยละ)</th>
                                </tr>
                                <tr>
                                    <td class="tg-9wq8" colspan="3">จำนวน<br>เนื้อที่ดิน</td>
                                    <td class="tg-9wq8" rowspan="2">คำนวณ<br>เป็น<br>ตารางวา</td>
                                    <td class="tg-9wq8" rowspan="2">ราคาประเมิน<br>ต่อตารางวา<br>(บาท)</td>
                                    <td class="tg-9wq8" rowspan="2">รวมราคา<br>ต่อตารางวา<br>(บาท)</td>
                                    <td class="tg-9wq8" rowspan="2">ที่</td>
                                    <td class="tg-9wq8" rowspan="2">ประเภท<br>สิ่งปลูกสร้าง</td>
                                    <td class="tg-9wq8" rowspan="2">ลักษณะ<br>สิ่งปลูกสร้าง</td>
                                    <td class="tg-c3ow" rowspan="2"><br><br>ลักษณะ<br>การใช้<br>ประโยชน์<br></td>
                                    <td class="tg-c3ow" rowspan="2"><br><br>ขนาดพื้นที่<br>สิ่งปลูกสร้าง<br>(ตารางเมตร)</td>
                                    <td class="tg-c3ow" rowspan="2"><br>คิดเป็น<br>สัดส่วนตาม<br>การใช้<br>ประโยชน์</td>
                                    <td class="tg-c3ow" rowspan="2"><br>ราคาประเมิน<br>ต่อ<br>ตารางเมตร<br>(บาท)</td>
                                    <td class="tg-c3ow" rowspan="2"><br>รวมราคา<br>สิ่งปลูกสร้าง<br>(บาท)</td>
                                    <td class="tg-c3ow" colspan="2">ค่าเสื่อม</td>
                                    <td class="tg-baqh" rowspan="2">ราคาประเมิน<br>สิ่งปลูกสร้าง<br>หลักหัก<br>ค่าเสื่อม<br>(บาท)</td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax">ไร่</td>
                                    <td class="tg-0lax">งาน</td>
                                    <td class="tg-0lax">วา</td>
                                    <td class="tg-baqh">อายุ<br>โรงเรือน<br>(ปี)</td>
                                    <td class="tg-baqh">คิดเป็น<br>ค่าเสื่อม<br>(บาท)</td>
                                </tr>
                                @php
                                    $i = 1;
                                    $l = 1;
                                @endphp
                                @foreach($results as $result)
                                    <tr>
                                        <td class="tg-lboi">{{$i++}}</td>
                                        <td class="tg-lboi">{{$result['ldoc_type']}}</td>
                                        <td class="tg-lboi">{{$result['sn']}}</td>
                                        <td class="tg-lboi">{{$result['dn']}}</td>
                                        <td class="tg-lboi">{{$result['moo']}} {{$result['vl']}} {{$result['tambon_id']}}</td>
                                        <td class="tg-lboi"></td>  <!-- ลักษณะการใช้ประโยชน์ -->
                                        <td class="tg-9wq8">{{$result['rai']}}</td>
                                        <td class="tg-9wq8">{{$result['yawn']}}</td>
                                        <td class="tg-9wq8">{{$result['wa']}}</td>
                                        <td class="tg-lboi">{{$result['square_1']}}</td>
                                        <td class="tg-lboi">{{number_format($result['meanprice_vl']),2}}</td>
                                        <td class="tg-lboi">{{number_format($result['result_landprice_lands']),2}}</td>
                                        <td class="tg-lboi">{{$l++}}</td>
                                        <td class="tg-lboi">{{$result['building_type_name']}}</td>
                                        <td class="tg-lboi">{{$result['building_use_name']}}</td>
                                        <td class="tg-0pky">{{$result['bm_id']}}</td>
                                        <td class="tg-0pky">{{number_format($result['result_wl']),2}}</td>
                                        <td class="tg-0pky">{{$result['buildratio']}}%</td>
                                        <td class="tg-0pky">{{number_format($result['meanprice_wl']),2}}</td>
                                        <td class="tg-0pky">{{number_format($result['result_buildprice']),2}}</td>
                                        <td class="tg-c3ow">อายุ</td>
                                        <td class="tg-0lax">{{number_format($result['depreciation']),2}}</td>
                                        <td class="tg-0lax">{{number_format($result['result_real']),2}}</td>
                                        <td class="tg-0lax">{{number_format($result['result_final']),2}}</td>
                                        <td class="tg-0lax">{{number_format($result['result_buildratio']),2}}</td>
                                        <td class="tg-0lax">{{number_format($result['tax_exem']),2}}</td>
                                        <td class="tg-0lax">{{number_format($result['result_real_final']),2}}</td>
                                        <td class="tg-c3ow">{{$result['tax_final_percent']}}%</td>
                                    </tr>
                                    @endforeach
                            </table>
                            <br>
                    </div>
                        <a style="margin: 0 auto;text-align: center" class="btn btn-info btn-lg col-3" onclick="printDiv()" target="_blank">
                            <span class="cil-print btn-icon mr-2"></span> พิมพ์ภาษีที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 1)
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
            var divContents = document.getElementById("PDS1").innerHTML;
            var a = window.open('', '', '');
            a.document.write('<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">');
            a.document.write('<style>@page{size:landscape;}</style><html><head><title>ราคาประเมินทุนทรัพย์ของที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 1)</title>');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
