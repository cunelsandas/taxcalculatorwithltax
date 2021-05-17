@extends('dashboard.base')

@section('content')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
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
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>หนังสือแจ้งการประเมินภาษีที่ดินและสิ่งปลูกสร้าง</div>
                        <div class="card-body" id="PDS6">
                            <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
                            <p style="text-align: center;">&nbsp;</p>
                            <p style="text-align: center;">&nbsp;</p>
                            <h5 style="text-align: center;"><strong>หนังสือแจ้งการประเมินภาษีที่ดินและสิ่งปลูกสร้าง</strong></h5>
                            <h5 style="text-align: center;"><strong>ประจำปี ภาษี พ.ศ. .....</strong></h5>
                            <p>&nbsp;</p>
                            @php
                            $customer_name = 'องค์การบริหารส่วนตำบลดอนเปา';
                            @endphp
                            <p style="text-align: left;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ที่.................../...................&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  สำนักงาน/ที่ทำการ @php echo $customer_name; @endphp</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;วันที่.........เดือน............................พ.ศ. .......</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เรื่อง แจ้งการประเมินเพื่อเสียภาษีที่ดินและสิ่งปลูกสร้าง</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เรียน @foreach($inputs as $input)คุณ{{$input->first_name}} {{$input->last_name}}@endforeach</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ตามที่ท่านเป็นเจ้าของทรัพย์สิน ประกอบด้วย</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ๑. ที่ดิน จำนวน @php $row = 0; @endphp @foreach($lands as $land) <font hidden>{{$row++}}</font> @endforeach{{$row++}}  แปลง</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ๒. สิ่งปลูกสร้าง จำนวน @php $rowb = 0; @endphp @foreach($landuses as $landuse) <font hidden>{{$rowb++}}</font> @endforeach{{$rowb++}} หลัง</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ๓. อาคารชุด/ห้องชุด จำนวน ........ ห้อง/หลัง</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  พนักงานประเมินได้ทำการประเมินภาษีที่ดินและสิ่งปลูกสร้างแล้ว เป็นจำนวนเงิน @php $sum_land = 0;  @endphp @foreach($landuses as $landuse) @php $sum_land += $landuse->sum_pay_land_tax @endphp @endforeach {{number_format($sum_land),2}} บาท @php echo '<font>('. baht_text($sum_land). ')</font>'  @endphp</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ตามรายการที่ปรากฏในแบบแสดงรายการคำนวณภาษีที่ดินและสิ่งปลูกสร้างแนบท้ายหนังสือฉบับนี้</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ฉะนั้น ขอให้ท่านนำเงินภาษีที่ดินและสิ่งปลูกสร้างไปชำระ ณ สำนักงาน/ที่ทำการ @php echo $customer_name; @endphp</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ภายในเดือนเมษายนของทุกปี หรือ ..........................................................................................................................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ถ้าไม่ชำระภาษีภายในกำหนดจะต้องเสียเบี้ยปรับและเงินเพิ่มตามมาตรา ๖๘ มาตรา ๖๙ และมาตรา ๗๐ แห่งพระราชบัญญัติภาษีที่ดินและสิ่งปลูกสร้าง</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; พ.ศ. ๒๕๖๒</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  อนึ่ง หากท่านได้รับแจ้งการประเมินภาษีที่ดินและสิ่งปลูกสร้างแล้ว เห็นว่าการประเมินไม่ถูกต้อง มีสิทธิยื่นคำร้องคัดค้านต่อผู้บริหารท้องถิ่นเพื่อพิจารณา</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ทบทวนตามแบบ ภ.ด.ส. ๙ ภายในสามสิบวันนับแต่วันที่ได้รับแจ้งการประเมิน และหากผู้บริหารท้องถิ่นไม่เห็นชอบกับคำร้องคัดค้านนี้ ให้มีสิทธิอุทธรณ์</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ต่อคณะกรรมการพิจารณาอุทธรณ์การประเมินภาษี โดยยื่นอุทธรณ์ต่อผู้บริหารท้องถิ่นภายในสามสิบวันนับแต่วันที่ได้รับหนังสือแจ้ง และกรณีไม่เห็นด้วย</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; กับคำวินิจฉัยอุทธรณ์ มีสิทธิฟ้องเป็นคดีต่อศาลภายในสามสิบวันนับแต่วันที่ได้รับแจ้งคำวินิจฉัยอุทธรณ์ ทั้งที่ ตามมาตรา ๗๓ และมาตรา ๘๒&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; แห่งพระราชบัญญติภาษีที่ดินและสิ่งปลูกสร้าง พ.ศ. ๒๕๖๒</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ขอแสดงความนับถือ</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ..................................................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(..................................................)</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ตำแหน่ง.........................................................</p>
                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;พนักงานประเมิน</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                        <a style="margin: 0 auto;text-align: center" class="btn btn-info btn-lg col-3" onclick="printDiv()" target="_blank">
                            <span class="cil-print btn-icon mr-2"></span> พิมพ์หนังสือแจ้งการประเมินภาษีที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 6)
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
                    var divContents = document.getElementById("PDS6").innerHTML;
                    var a = window.open('', '', '');
                    a.document.write('<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">');
                    a.document.write('<style>@page{size:landscape;}</style><html><head><title>หนังสือแจ้งการประเมินภาษีที่ดินและสิ่งปลูกสร้าง</title>');
                    a.document.write('<html>');
                    a.document.write(divContents);
                    a.document.write('</body></html>');
                    a.document.close();
                    a.print();
                }
            </script>
@endsection
