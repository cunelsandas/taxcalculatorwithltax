@extends('dashboard.base')

@section('content')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>แบบแสดงรายการคำนวณภาษีที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 7)</div>
                        <div class="card-body" id="PDS7">
                            <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
                            <style type="text/css">
                                .tg  {border-collapse:collapse;border-spacing:0;}
                                .tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:2px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:2px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg .tg-4i9n{background-color:#ffcc67;text-align:center;vertical-align:middle}
                                .tg .tg-baqh{text-align:center;vertical-align:top}
                                .tg .tg-fpdb{background-color:#34cdf9;text-align:center;vertical-align:middle}
                                .tg .tg-nbv9{background-color:#caf08a;text-align:center;vertical-align:middle}
                                .tg .tg-adx7{background-color:#ffcc67;text-align:center;vertical-align:top}
                                .tg .tg-nrix{text-align:center;vertical-align:middle}
                                .tg .tg-0lax{text-align:left;vertical-align:top}
                            </style>
                            <h2 align="center">แบบแสดงรายการคำนวณภาษีที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 7)</h2>
                            <br>
                            <table class="tg">
                                <tr>
                                    <th class="tg-nbv9" rowspan="3">ที่</th>
                                    <th class="tg-nbv9" rowspan="3">ประเภท<br>ที่ดิน/เลขที่</th>
                                    <th class="tg-nbv9" rowspan="3">ลักษณะ<br>การทำ<br>ประโยชน์</th>
                                    <th class="tg-nbv9" colspan="6">คำนวณราคาประเมินทุนทรัพย์ของที่ดิน</th>
                                    <th class="tg-4i9n" colspan="8">คำนวณราคาประเมินทุนทรัพย์ของสิ่งปลูกสร้าง</th>
                                    <th class="tg-fpdb" rowspan="3">รวมราคา<br>ประเมินของ<br>ที่ดินและ<br>สิ่งปลูกสร้าง<br>(บาท)</th>
                                    <th class="tg-fpdb" rowspan="3">หักมูลค่า<br>ฐานภาษี<br>ที่ได้รับ<br>ยกเว้น<br>(บาท)</th>
                                    <th class="tg-fpdb" rowspan="3">คงเหลือ<br>ราคาประเมิน<br>ทุนทรัพย์<br>ที่ต้องชำระ<br>(บาท)</th>
                                    <th class="tg-fpdb" rowspan="3">อัตรา<br>ภาษี<br>(ร้อยละ)</th>
                                    <th class="tg-fpdb" rowspan="3">จำนวน<br>ภาษีที่ต้อง<br>ชำระ<br>(บาท)</th>
                                </tr>
                                <tr>
                                    <td class="tg-nbv9" colspan="3">จำนวนที่ดิน</td>
                                    <td class="tg-nbv9" rowspan="2">คำนวณเป็น<br>ตร.ว.</td>
                                    <td class="tg-nbv9" rowspan="2">ราคาประเมิน<br>ต่อตร.ว.<br>(บาท)</td>
                                    <td class="tg-nbv9" rowspan="2">ราคาประเมิน<br>ของที่ดิน<br>(บาท)</td>
                                    <td class="tg-4i9n" rowspan="2">ที่</td>
                                    <td class="tg-4i9n" rowspan="2">ประเภทของ<br>สิ่งปลูกสร้าง</td>
                                    <td class="tg-4i9n" rowspan="2">ขนาดพื้นที่<br>สิ่งปลูกสร้าง<br>(ตร.ม.)</td>
                                    <td class="tg-4i9n" rowspan="2">ราคาประเมิน<br>ต่อ ตร.ม.<br>(บาท)</td>
                                    <td class="tg-adx7" rowspan="2">รวมราคา<br>ประเมิน<br>สิ่งปลูกสร้าง<br>(บาท)</td>
                                    <td class="tg-adx7" colspan="2">ค่าเสื่อม</td>
                                    <td class="tg-adx7" rowspan="2">ราคาประเมิน<br>สิ่งปลูกสร้าง<br>หลังหัก<br>ค่าเสื่อม(บาท)</td>
                                </tr>
                                <tr>
                                    <td class="tg-nbv9">ไร่</td>
                                    <td class="tg-nbv9">งาน</td>
                                    <td class="tg-nbv9">ตร.ว.</td>
                                    <td class="tg-adx7">อายุ<br>โรงเรือน<br>(ปี)</td>
                                    <td class="tg-adx7">คิดเป็น<br>ค่าเสื่อม<br>(บาท)</td>
                                </tr>
                                @php
                                    $i = 1;
                                    $l = 1;
                                @endphp
                                @foreach($results as $result)
                                <tr>
                                    <td class="tg-nrix">{{$i++}}</td>
                                    <td class="tg-nrix">{{$result['ldoc_type']}}</td>
                                    <td class="tg-nrix">
                                        @php
                                            $cul = $result['lut_id'];
                                        @endphp
                                        @if($cul === 1 )
                                            อยู่อาศัย
                                        @elseif($cul === 2 )
                                            อยู่อาศัย
                                        @elseif($cul === 3 )
                                            อยู่อาศัย
                                        @elseif($cul === 4 )
                                            อยู่อาศัย
                                        @elseif($cul === 5 )
                                            อยู่อาศัย
                                        @elseif($cul === 6 )
                                            ประกอบเกษตรกรรม
                                        @elseif($cul === 7 )
                                            ประกอบเกษตรกรรม
                                        @elseif($cul === 8 )
                                            ประกอบเกษตรกรรม
                                        @elseif($cul === 9 )
                                            ทิ้งไว้ว่างเปล่าหรือไม่ได้ทำประโยชน์ตามควร
                                        @elseif($cul === 10 )
                                            ที่ดินต่อเนื่อง
                                        @elseif($cul === 99)
                                            อื่นๆ
                                        @else

                                        @endif
                                    </td>
                                    <td class="tg-nrix">{{$result['rai']}}</td>
                                    <td class="tg-nrix">{{$result['yawn']}}</td>
                                    <td class="tg-nrix">{{$result['wa']}}</td>
                                    <td class="tg-nrix">{{number_format($result['square_1']),2}}</td>
                                    <td class="tg-nrix">{{number_format($result['meanprice_vl']),2}}</td>
                                    <td class="tg-nrix">{{number_format($result['result_landprice_lands']),2}}</td>

                                    <td class="tg-nrix">{{$l++}}</td>
                                    <td class="tg-nrix">{{$result['building_type_name']}}</td>
                                    <td class="tg-nrix">{{number_format($result['result_wl']),2}}</td>
                                    <td class="tg-nrix">{{number_format($result['meanprice_wl']),2}}</td>
                                    <td class="tg-baqh">{{number_format($result['result_buildprice']),2}}</td>
                                    <td class="tg-baqh"></td> <!-- อายุ -->
                                    <td class="tg-baqh">{{number_format($result['depreciation']),2}}</td>
                                    <td class="tg-baqh">{{number_format($result['result_real']),2}}</td></td>
                                    <td class="tg-baqh">{{number_format($result['result_final']),2}}</td>
                                    <td class="tg-baqh">{{number_format($result['tax_exem']),2}}</td>
                                    <td class="tg-baqh">{{number_format($result['result_real_final']),2}}</td>
                                    <td class="tg-baqh">{{$result['tax_final_percent']}}%</td>
                                    <td class="tg-baqh">{{number_format($result['sum_pay_land_tax']),2}}</td>
                                </tr>
                                    @endforeach
                            </table>

                        </div>
                        <a style="margin: 0 auto;text-align: center" class="btn btn-info btn-lg col-3" onclick="printDiv()" target="_blank">
                            <span class="cil-print btn-icon mr-2"></span> พิมพ์แบบแสดงรายการคำนวณภาษีที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 7)
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
                    var divContents = document.getElementById("PDS7").innerHTML;
                    var a = window.open('', '', '');
                    a.document.write('<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">');
                    a.document.write('<style>@page{size:landscape;}</style><html><head><title>แบบแสดงรายการคำนวณภาษีที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 7)</title>');
                    a.document.write('<html>');
                    a.document.write(divContents);
                    a.document.write('</body></html>');
                    a.document.close();
                    a.print();
                }
            </script>
@endsection
