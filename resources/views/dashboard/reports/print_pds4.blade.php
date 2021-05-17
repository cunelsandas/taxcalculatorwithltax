@extends('dashboard.base')

@section('content')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>แบบบัญชีรายการห้องชุด (ภ.ด.ส. 4)</div>
                        <div class="card-body" id="PDS4">
                            <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
                            <style type="text/css">
                                .tg  {border-collapse:collapse;border-spacing:0;}
                                .tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:2px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:2px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle}
                                .tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
                                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
                                .tg .tg-0lax{text-align:left;vertical-align:top}
                            </style>

                            <h2 align="center">แบบบัญชีรายการห้องชุด (ภ.ด.ส. 4)</h2>
                            <br>
                            <table class="tg" align="center">
                                <tr>
                                    <th class="tg-0pky" rowspan="2">ที่</th>
                                    <th class="tg-0pky" rowspan="2">ชื่ออาคารชุด</th>
                                    <th class="tg-0pky" rowspan="2">เลขทะเบียนอาคารชุด</th>
                                    <th class="tg-9wq8" colspan="4">ที่ตั้ง</th>
                                    <th class="tg-0pky" rowspan="2">เลขที่ห้องชุด</th>
                                    <th class="tg-0pky" rowspan="2">ขนาดพื้นที่รวม<br>(ตร.ม.)</th>
                                    <th class="tg-9wq8" colspan="3">ลักษณะการทำประโยชน์ (ตร.ม.)</th>
                                    <th class="tg-0pky" rowspan="2">หมายเหตุ</th>
                                </tr>
                                <tr>
                                    <td class="tg-lboi">โฉนด<br>เลขที่</td>
                                    <td class="tg-lboi">หน้าสำรวจ</td>
                                    <td class="tg-lboi">ตำบล</td>
                                    <td class="tg-lboi">อำเภอ</td>
                                    <td class="tg-lboi">อยู่อาศัย</td>
                                    <td class="tg-lboi">อื่นๆ</td>
                                    <td class="tg-lboi">ว่างเปล่า/ไม่ทำประโยชน์</td>
                                </tr>
                                <tr>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                </tr>
                                <tr>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                    <td class="tg-lboi"></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
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
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax"></td>
                                </tr>
                            </table>
                        </div>
                        <a style="margin: 0 auto;text-align: center" class="btn btn-info btn-lg col-3" onclick="printDiv()" target="_blank">
                            <span class="cil-print btn-icon mr-2"></span> พิมพ์แบบบัญชีรายการห้องชุด (ภ.ด.ส. 4)
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
            var divContents = document.getElementById("PDS4").innerHTML;
            var a = window.open('', '', '');
            a.document.write('<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">');
            a.document.write('<style>@page{size:landscape;}</style><html><head><title>แบบบัญชีรายการห้องชุด (ภ.ด.ส. 4)</title>');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
