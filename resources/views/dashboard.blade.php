@extends('dashboard.base')

@section('content')
    <style>
        body {font-family: Arial;}

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
    </style>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row-cols-6">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header" style="text-decoration: underline"><h4>กรอกข้อมูลผู้ชำระภาษี</h4></div>
                        <div class="card-body">
                            <tr class="row-cols-6" style="float: left">
                                <td>
                                    <strong>ID: </strong> {{ $input->id }}<br>
                                    <strong>เจ้าของทรัพย์สิน: </strong> {{ $input->name_titles }}
                                    {{ $input->first_name }}
                                    {{ $input->last_name }}

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
                                    <a href="{{ url('/inputs/' . $input->id . '/edit') }}" class="btn btn-block btn-primary" style="width: 10%">แก้ไข</a>
                                </td>
                            </tr>
                            <div style="margin-left: 80%;margin-top: -10%;">
                                <td>
                                    <a href="{{ url('/lands/' . $input->id.'/edit') }}" class="btn btn-block btn-success">บันทึกข้อมูลแปลงที่ดิน/สิ่งปลูกสร้าง</a>
                                    {{--                                <a href="{{ url('/buildings/' . $input->owner_id . '/edit') }}" class="btn btn-block btn-success" >บันทึกข้อมูลโรงเรือน/สิ่งปลูกสร้าง</a>--}}
                                    <a href="{{ url('/signs/' . $input->id . '/edit') }}" class="btn btn-block btn-success" >บันทึกข้อมูลป้าย</a>
                                    <a href="{{ url('/reports/' . $input->id) }}" class="btn btn-block btn-warning" >รายงาน</a>
                                </td> <br>
                            </div>

                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'lands')" id="defaultOpen">ที่ดิน</button>
                                <button class="tablinks" onclick="openCity(event, 'builds')">โรงเรือนสิ่งปลูกสร้าง</button>
                                <button class="tablinks" onclick="openCity(event, 'signs')">ป้าย</button>
                            </div>
                            <div id="lands" class="tabcontent" style="height: 400px;overflow-x: scroll">
                                @foreach($lands as $land)
                                    <table width="100%">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสแปลงที่ดิน</th>
                                            <th>เอกสารสิทธิ์</th>
                                            <th>เลขที่เอกสารสิทธิ์</th>
                                            <th>ระวาง</th>
                                            <th>เลขที่ดิน</th>
                                            <th>หน้าสำรวจ</th>
                                            <th>จำนวนเนื้อที่</th>
                                        </tr>
                                        <tr style="color: #0080ff">
                                            <td>{{$land->id}}</td>
                                            <td>{{$land->parcel_code}}</td>
                                            <td>{{$land->ldoc_type}}</td>
                                            <td>{{$land->dn}}</td>
                                            <td>{{$land->rw}}</td>
                                            <td>{{$land->ln}}</td>
                                            <td>{{$land->sn}}</td>
                                            <td>{{$land->rai}}-{{$land->yawn}}-{{$land->wa}}</td>
                                        </tr>
                                    </table>

                                @endforeach
                            </div>

                            <div id="builds" class="tabcontent" style="height: 400px;overflow-x: scroll">
                                @foreach($landuses as $landuse)

                                    <table width="100%">
                                        <tr>
                                            <th width="10%">ลำดับ</th>
                                            <th  width="10%">แปลงที่ดิน</th>
                                            <th  width="30%">ชื่อ หรือ ที่ตั้งอาคาร</th>
                                            <th  width="10%">ห้อง</th>
                                            <th  width="10%">ชั้น</th>
                                            <th  width="10%">กว้าง x ยาว</th>
                                            <th  width="10%">ราคาประเมินต่อตร.ม.</th>
                                            <th  width="10%">ราคาประเมินสิ่งปลูกสร้าง</th>
                                        </tr>
                                        <tr style="color: #0080ff">
                                            <td>{{$landuse->id}}</td>
                                            <td>{{$landuse->parcel_b_code}}</td>
                                            <td>{{$landuse->build_name}}</td>
                                            <td>{{$landuse->b_room}}</td>
                                            <td>{{$landuse->b_floor}}</td>
                                            <td>{{$landuse->width}}X{{$landuse->length}}={{$landuse->result_wl}}</td>
                                            <td>{{$landuse->meanprice_wl}}</td>
                                            <td>{{$landuse->result_buildprice}}</td>


                                        </tr>
                                    </table>
                                @endforeach
                            </div>

                            <div id="signs" class="tabcontent" style="height: 400px;overflow-x: scroll">
                                <h3>ป้าย</h3>
                                @foreach($sign_boards as $sign_board)

                                    <table width="100%">
                                        <tr>
                                            <th width="10%">ลำดับ</th>
                                            <th  width="10%">แปลงที่ดิน</th>
                                            <th  width="20%">ที่ตั้งของป้าย</th>
                                            <th  width="10%">ประเภทป้าย</th>
                                            <th  width="5%">กว้าง X ยาว</th>
                                            <th  width="5%">เนื้อที่</th>
                                            <th  width="10%">จำนวนด้าน</th>
                                            <th  width="10%">ข้อความในป้าย</th>
                                            <th  width="10%">อัตราภาษี</th>
                                            <th  width="10%">หมายเหตุ</th>
                                        </tr>
                                        <tr style="color: #0080ff">
                                            <td>{{$sign_board->s_id}}</td>
                                            <td>{{$sign_board->parcel_code}}</td>
                                            <td>{{$sign_board->s_name}}</td>
                                            <td>{{$sign_board->sign_type_id}}</td>
                                            <td>{{$sign_board->sw}}X{{$sign_board->sl}}</td>
                                            <td>{{$sign_board->area}}</td>
                                            <td>{{$sign_board->no_side}}</td>
                                            <td>{{$sign_board->s_desc}}</td>
                                            <td>{{$sign_board->tax}}</td>
                                            <td>{{$sign_board->note}}</td>


                                        </tr>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                        <div style="margin-left: 70%;">
                            <td>
                                @foreach($landuses as $landuse)
                                    <p style="font-weight: bold"> ภาษีโรงเรือนและที่ดิน  : {{(number_format($landuse->sum_pay_land_tax,2))}} บาท </p>
                                @endforeach
                                @foreach($sign_boards as $sign_board)
                                    <p style="font-weight: bold"> ภาษีป้าย : {{(number_format($sign_board->tax,2))}} บาท </p>
                                @endforeach
                                <p style="font-weight: bold"> รวมเงิน :   </p>
                            </td> <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>

@endsection

@section('javascript')

@endsection
