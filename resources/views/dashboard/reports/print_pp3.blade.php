@extends('dashboard.base')

@section('content')
    @php
    $customer_name = 'องค์การบริหารส่วนตำบลดอนเปา';
    @endphp
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>หนังสือแจ้งการประเมินภาษีป้าย (ภ.ป. 3)</div>
                        <div class="card-body" id="PP3">
                            <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
{{--                            <h2 align="center">หนังสือแจ้งการประเมินภาษีป้าย (ภ.ป. 3)</h2>--}}
                            <br>


                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; ภ.ป. ๓</p>
                            <p>&nbsp; &nbsp; &nbsp; หนังสือแจ้งการประเมิน</p>
                            <p>&nbsp; &nbsp; &nbsp; ที่............../...............&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; องค์การบริหารส่วนตำบลดอนเปา</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;อำเภอแม่แตง&nbsp; จังหวัดเชียงใหม่ 50360</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เดือน...........&nbsp; พ.ศ. ........... </p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; เรื่อง&nbsp; &nbsp; แจ้งการประเมินภาษีป้าย</p>
                            <p>&nbsp; &nbsp; &nbsp; เรียน&nbsp; &nbsp;@foreach($inputs as $input) คุณ{{$input->first_name}} {{$input->last_name}} @endforeach</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ตามที่ ท่านได้ยื่นแบบแสดงรายการภาษีป้ายไว้ตามแบบ ภ.ป.1 เลขรับที่ ............................/.............................</p>
                            <p>&nbsp; &nbsp; &nbsp; ลงวันที่.......................เดือน...........................พ.ศ. ............................ไว้ นั้น</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;บัดนี้&nbsp; พนักงานเจ้าหน้าที่ ได้ทำการประเมินเสร็จแล้ว เป็นเงินภาษี   @php $sum_tax= 0; @endphp
                                @foreach($sign_boards as $sign_board)
                                    @php $sum_tax += $sign_board->tax @endphp
                                @endforeach  &nbsp; {{($sum_tax)}} บาท.....................สตางค์</p>
                            <p>&nbsp; &nbsp; &nbsp; และเงินเพิ่ม............................................บาท.....................สตางค์&nbsp; รวมเป็นเงินทั้งสิ้น.......................บาท.....................สตางค์</p>
                            <p>&nbsp; &nbsp; &nbsp; โปรดนำเงินจำนวนดังกล่าวไปชำระภายใน 15 นับแต่วันที่ได้รับหนังสือนี้ หากพ้นกำหนดจะต้องเสียเงินเพิ่มตามกฏหมาย</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ขอแสดงความนับถือ</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;   .........................................................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (..........................................................)</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; พนักงานเจ้าหน้าที่</p>

                            <hr width="100%">
                            <div style="margin:0 auto;">
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="text-decoration: underline;"><strong>ใบรับ ภ.ป. ๓</strong></span></p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ข้าพเจ้า...............................................อยู่บ้านเลขที่.....................ตรอก......................................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp;ซอย.......................................ถนน........................................หมู่ที่...............ตำบล.....................................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp;อำเภอ.........................................จังหวัด...........................................เกี่ยวข้องเป็น.........................................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp;กับเจ้าของป้าย ได้รับ&nbsp; ภ.ป.๓ ที่..................../........................&nbsp; ลงวันที่............................เดือน...............................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp;พ.ศ. ...................... ไว้แล้ว&nbsp;&nbsp;ตั้งแต่วันที่................................เดือน..................................พ.ศ. ..........................</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (ลงชื่อ)........................................................ผู้รับ&nbsp; &nbsp; &nbsp;(ลงชื่อ)..........................................................ผู้ส่ง</p>
                            </div>
                        </div>
                        <a style="margin: 0 auto;text-align: center" class="btn btn-info btn-lg col-3" onclick="printDiv()">
                            <span class="cil-print btn-icon mr-2"></span> พิมพ์หนังสือแจ้งการประเมินภาษีป้าย (ภ.ป. 3)
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
            var divContents = document.getElementById("PP3").innerHTML;
            var a = window.open('', '', '');
            a.document.write('<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">');
            a.document.write('<style>@page{size:landscape;}</style><html><head><title>หนังสือแจ้งการประเมินภาษีป้าย (ภ.ป. 3)</title>');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
