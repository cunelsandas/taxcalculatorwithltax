@extends('dashboard.base')

@section('content')
    <style>
        body{}

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
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

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @php
const BAHT_TEXT_NUMBERS = array('ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า');
const BAHT_TEXT_UNITS = array('', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
const BAHT_TEXT_ONE_IN_TENTH = 'เอ็ด';
const BAHT_TEXT_TWENTY = 'ยี่';
const BAHT_TEXT_INTEGER = 'ถ้วน';
const BAHT_TEXT_BAHT = 'บาท';
const BAHT_TEXT_SATANG = 'สตางค์';
const BAHT_TEXT_POINT = 'จุด';

/**
 * Convert baht number to Thai text
 * @param double|int $number
 * @param bool $include_unit
 * @param bool $display_zero
 * @return string|null
 */

function baht_text ($number, $include_unit = true, $display_zero = true)
{
    if (!is_numeric($number)) {
        return null;
    }

    $log = floor(log($number, 10));
    if ($log > 5) {
        $millions = floor($log / 6);
        $million_value = pow(1000000, $millions);
        $normalised_million = floor($number / $million_value);
        $rest = $number - ($normalised_million * $million_value);
        $millions_text = '';
        for ($i = 0; $i < $millions; $i++) {
            $millions_text .= BAHT_TEXT_UNITS[6];
        }
        return baht_text($normalised_million, false) . $millions_text . baht_text($rest, true, false);
    }

    $number_str = (string)floor($number);
    $text = '';
    $unit = 0;

    if ($display_zero && $number_str == '0') {
        $text = BAHT_TEXT_NUMBERS[0];
    } else for ($i = strlen($number_str) - 1; $i > -1; $i--) {
        $current_number = (int)$number_str[$i];

        $unit_text = '';
        if ($unit == 0 && $i > 0) {
            $previous_number = isset($number_str[$i - 1]) ? (int)$number_str[$i - 1] : 0;
            if ($current_number == 1 && $previous_number > 0) {
                $unit_text .= BAHT_TEXT_ONE_IN_TENTH;
            } else if ($current_number > 0) {
                $unit_text .= BAHT_TEXT_NUMBERS[$current_number];
            }
        } else if ($unit == 1 && $current_number == 2) {
            $unit_text .= BAHT_TEXT_TWENTY;
        } else if ($current_number > 0 && ($unit != 1 || $current_number != 1)) {
            $unit_text .= BAHT_TEXT_NUMBERS[$current_number];
        }

        if ($current_number > 0) {
            $unit_text .= BAHT_TEXT_UNITS[$unit];
        }

        $text = $unit_text . $text;
        $unit++;
    }

    if ($include_unit) {
        $text .= BAHT_TEXT_BAHT;

        $satang = explode('.', number_format($number, 2, '.', ''))[1];
        $text .= $satang == 0
            ? BAHT_TEXT_INTEGER
            : baht_text($satang, false) . BAHT_TEXT_SATANG;
    } else {
        $exploded = explode('.', $number);
        if (isset($exploded[1])) {
            $text .= BAHT_TEXT_POINT;
            $decimal = (string)$exploded[1];
            for ($i = 0; $i < strlen($decimal); $i++) {
                $text .= BAHT_TEXT_NUMBERS[$decimal[$i]];
            }
        }
    }

    return $text;
}
@endphp   <!-- function แปลงเงินภาษาไทย -->

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row-cols-6">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header" style="text-decoration: underline"><h4>ข้อมูลผู้ชำระภาษี</h4></div>
                        <div class="card-body">
                        <tr class="row-cols-6" style="float: left">
                            <td>
                                <strong>ID: </strong> {{ $input->id }}<br>
                               <strong>เจ้าของทรัพย์สิน: </strong>{{$input->name_titles}}{{ $input->first_name }} {{ $input->last_name }}

                                <strong>รหัสบัตรประชาชน: </strong>{{ $input->card_id }}

                            </td> <br>
                            <td>
                                <strong>ที่อยู่: </strong> {{ $input->address_number }}
                                <strong>หมู่: </strong> {{ $input->moo }}
                                <strong>ซอย: </strong> {{ $input->soi }}
                                <strong>ถนน: </strong> {{ $input->road }}
                            </td><br>
                            <td>
                                <strong>ตำบล: </strong> {{ $input->tambon }}
                                <strong>อำเภอ: </strong> {{ $input->amphoe }}
                                <strong>จังหวัด: </strong> {{ $input->province }}
                            </td><br>
                            <td>
                                <strong>รหัสไปรษณีย์: </strong> {{ $input->zip_code }}
                                <strong>โทร: </strong> {{ $input->telephone }}
{{--                                <a href="{{ url('/inputs/' . $input->id . '/edit') }}" class="btn btn-block btn-primary" style="width: 10%">แก้ไข</a>--}}
                            </td>
                        </tr>
                        </div>


                        <script>
                            function printDiv() {
                                var divContents = document.getElementById("GFG").innerHTML;
                                var a = window.open('', '', 'height=900, width=1600');
                                a.document.write('<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">');
                                a.document.write('<html>');
                                a.document.write(divContents);
                                a.document.write('</body></html>');
                                a.document.close();
                                a.print();
                            }
                        </script>

                        <div class="card-body" id="GFG">
                            <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">


                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  เล่มที่..............</p>
                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;เลขที่..............</p>
                        <h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp &nbsp&nbsp ใบเสร็จรับเงินภาษีที่ดินและสิ่งปลูกสร้าง</h3> <br>
                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่..................เดือน..................................พ.ศ. ...........</p>
                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ได้รับเงินค่าภาษีที่ดินและสิ่งปลูกสร้างจาก  <b>{{ $input->name_titles }}{{ $input->first_name }} {{ $input->last_name }}</b></p>
                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; อยู่บ้านเลขที่&nbsp; &nbsp;<b>{{ $input->address_number }}</b>&nbsp; &nbsp;หมู่ที่&nbsp; &nbsp;<b>{{ $input->moo }}</b>&nbsp; &nbsp;ถนน&nbsp; &nbsp;<b>{{ $input->road }}</b>&nbsp; &nbsp;ตำบล/แขวง&nbsp; &nbsp;<b>{{ $input->tambon }}</b>&nbsp; &nbsp;</p>
                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  อำเภอ/เขต&nbsp; &nbsp;<b>{{ $input->amphoe }}</b>&nbsp; &nbsp;จังหวัด&nbsp; &nbsp;<b>{{ $input->province }}</b>&nbsp; &nbsp;ตามหนังสือแจ้งการประเมิน</p>
                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  เล่มที่.............../................ ลงวันที่...................เดือน........................... พ.ศ. <b>{{date('Y')+543}}</b> ประจำปีภาษี พ.ศ. <b>{{date('Y')+543}}</b></p>

                            <div>

                            <style type="text/css">
                                .tg  {border-collapse:collapse;border-spacing:0;}
                                .tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                                .tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle}
                                .tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
                                .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
                                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
                            </style>
                            <table class="tg">
                                <tr>
                                    <th class="tg-9wq8" colspan="2" rowspan="2">ที่</th>
                                    <th class="tg-9wq8" colspan="13" rowspan="2">รายการ</th>
                                    <th class="tg-c3ow" colspan="12">จำนวนเงิน</th>
                                    <th class="tg-9wq8" colspan="4" rowspan="2">หมายเหตุ</th>
                                </tr>
                                <tr>
                                    <td class="tg-c3ow" colspan="6">บาท</td>
                                    <td class="tg-c3ow" colspan="6">สตางค์</td>
                                </tr>
                                <tr>
                                    <td class="tg-c3ow" colspan="2">๑<br><br>๒<br><br>๓</td>
                                    <td class="tg-lboi" colspan="13">ค่าภาษีที่ดินและสิ่งปลูกสร้าง<br><br>เบี้ยปรับ ร้อยละ<br><br>เงินเพิ่มกรณีชำระเกินกำหนดเวลา&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;เดือน<br><br><br></td>
                                    @php $sum_land = 0;
                                        $sum_lu_bu = 0;
                                    @endphp
                                    @foreach($lands as $land)
                                        @php $sum_lu_bu += $land->tax_lu +=$land->tax_bu @endphp
                                    @endforeach
                                    @foreach($landuses as $landuse)
                                        @php $sum_land += $landuse->sum_pay_land_tax  @endphp
                                    @endforeach
                                    <td class="tg-0pky" colspan="6">{{number_format($sum_land+$sum_lu_bu),2}} </td>
{{--                                    <td class="tg-0pky" colspan="6"></td>--}}
                                    <td class="tg-lboi" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td class="tg-c3ow" colspan="15">ตัวอักษร (.................................................................)</td>
                                    <td class="tg-0pky" colspan="6"> <?php echo baht_text(round($sum_land+$sum_lu_bu))  ?></td>
                                    <td class="tg-0pky" colspan="6"></td>
                                    <td class="tg-0pky" colspan="3"></td>
                                </tr>
                            </table>

                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; ลงชื่อ............................................ผู้รับเงิน&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ลงชื่อ...........................................พนักงานเก็บภาษี</p>
                            <p>&nbsp; &nbsp; &nbsp; (...................................................)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (.........................................)</p>


                            </div>
                        </div>

                        <a style="margin: 0 auto;text-align: center" class="btn btn-info btn-lg col-3" onclick="printDiv()">
                            <span class="cil-print btn-icon mr-2"></span> ปริ้นท์ภาษีที่ดินและสิ่งปลูกสร้าง
                        </a>

                        <script>
                            function printDiv2() {
                                var divContents = document.getElementById("GFG2").innerHTML;
                                var a = window.open('','', 'height=768, width=1024');
                                a.document.write('<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">');
                                a.document.write('<html>');
                                a.document.write(divContents);
                                a.document.write('</body></html>');
                                a.document.close();
                                a.print();
                            }
                        </script>

                            <br>
                            <br>
                            <br>
                        <div class="card-body" style="margin: 0 auto" id="GFG2">
                            <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เล่มที่.................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เลขที่.................</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ใบเสร็จรับเงินภาษีป้าย</h3>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; ชื่อเจ้าของป้าย &nbsp; &nbsp;{{$input->name_titles}}{{ $input->first_name }} {{ $input->last_name }}</p>
                            <p>&nbsp; &nbsp; &nbsp; ชื่อสถานการค้าหรือสถานประกอบกิจการอื่น &nbsp; &nbsp; &nbsp;@foreach($sign_boards as $sign_board) {{$sign_board->s_name}}, </p>
                            <p>&nbsp; &nbsp; &nbsp; เลขที่&nbsp; &nbsp;{{$sign_board->address}}&nbsp; &nbsp;ตรอก หรือ ซอย&nbsp; &nbsp;{{$sign_board->soi}}&nbsp; &nbsp;ถนน&nbsp; &nbsp;{{$sign_board->road}}&nbsp; &nbsp;หมู่ที่&nbsp; &nbsp;{{$sign_board->moo}}&nbsp; &nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; ตำบล&nbsp; &nbsp;{{$sign_board->tambon_id}} @endforeach&nbsp; &nbsp;แขวง &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;อำเภอ&nbsp; &nbsp; แม่แตง &nbsp; &nbsp;จังหวัด&nbsp; &nbsp;เชียงใหม่</p>
                            <p>&nbsp; &nbsp; &nbsp; ได้ชำระเงินค่าภาษีป้าย ประจำปี พ.ศ. {{date('Y')+543}} &nbsp; &nbsp;@foreach ($sign_boards as $sign_board) ประเภท {{$sign_board->sign_type_id}} ({{$sign_board->sw}})x({{$sign_board->sl}}) @endforeach</p>
                            <p>&nbsp; &nbsp; &nbsp; ...................................................................................................................................................</p>
                            <p>&nbsp; &nbsp; &nbsp; ตามแบบ ภ.ป. 1 เลขรับที่............/.................เป็นเงินจำนวน

                                @php $sum_tax= 0; @endphp
                                @foreach($sign_boards as $sign_board)
                                     @php $sum_tax += $sign_board->tax @endphp
                                @endforeach  &nbsp; &nbsp;{{($sum_tax)}} &nbsp; &nbsp; บาท....................................สตางค์</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;เงินเพิ่ม............................บาท......................................สตางค์</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; @php echo baht_text(round($sum_tax))   @endphp &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; รวมทั้งสิ้น &nbsp; &nbsp;{{($sum_tax)}} &nbsp; &nbsp;บาท.........................................สตางค์</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; แล้วแต่วันที่....................................................................</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp;ลงชื่อ..................................................ผู้รับเงิน&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ลงชื่อ............................................พนักงานเจ้าหน้าที่</p>

                        </div>

                        <a style="margin: 0 auto;text-align: center" class="btn btn-warning btn-lg col-3" onclick="printDiv2()">
                            <span class="cil-print btn-icon mr-2"></span> ปริ้นท์ภาษีป้าย
                        </a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

<script>
    $('.print-window').click(function() {
    window.print();
    });
</script>


@endsection

@section('javascript')

@endsection
