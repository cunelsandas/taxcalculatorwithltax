@extends('dashboard.base')

@section('content')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                        <div class="card-header" style="text-decoration: underline"><h4>ข้อมูลการชำระภาษี</h4></div>
                    <div class="card-body">
                        <div class="row">
{{--                          <a href="{{ route('inputs.create') }}" class="btn btn-primary m-2">{{ __('เพิ่มข้อมูลผู้ชำระภาษี') }}</a>--}}
                        </div>
                        <form action="/search" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                       placeholder="Search"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
                            </div>
{{--                            <iframe frameborder="0" width="500px" height="400px" src="https://covid19.th-stat.com/th/share/dashboard"></iframe>--}}
{{--                            <iframe frameborder="0" width="500px" height="400px" src="https://covid19.th-stat.com/th/share/map"></iframe>--}}
{{--                            <iframe frameborder="0" scrolling="auto" width="500px" height="400px" src="https://covid19.th-stat.com/th/share/network"></iframe>--}}
                        </form>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
{{--                            <th>Author</th>--}}
                              <th>บัตรประจำตัวประชาชน</th>
                              <th>ประเภทบุคคล</th>
                              <th>ชื่อเจ้าของทรัพย์สิน</th>
                              <th width="20%">ที่อยู่</th>

                            <th>สถานะชำระภาษี</th>
                            <th></th>
                            <th></th>
                            <th></th>
                              <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($inputs as $input)
                            <tr>
{{--                              <td><strong>{{ $input->user->name }}</strong></td>--}}
                                <td><strong>{{ $input->card_id }}</strong></td>
                                <td>{{ $input->owner_types}}</td>
                                <td>
                                    {{ $input->name_titles }}
                                      {{ $input->first_name }}
                                      {{ $input->last_name }}

                                </td>
                                <td>
                                    เลชที่{{ $input->address_number }}
                                      หมู่ที่{{ $input->moo }}
                                      ซอย{{ $input->soi }}
                                      ถนน{{ $input->road }}
                                    ตำบล{{ $input->tambon }}
                                    อำเภอ{{ $input->amphoe }}
                                    จังหวัด{{ $input->province }}
                                    {{ $input->zip_code }}

                                </td>


                              <td>
                                  <span style="font-size: 14px" class="{{ $input->status->class }}">
                                      {{ $input->status->name }}
                                  </span>

{{--                                @foreach($landuses as $landuse)--}}
{{--                                {{$landuse->sum_pay_land_tax}}--}}
{{--                                @endforeach--}}

                              <td><strong>{{ $input->input_type }}</strong></td>
                              <td>
                                  @if($input->status->id == 1)
                                      <a href="{{ url('/paytaxs/' . $input->id . '/edit') }}" class="btn btn-block btn-warning"><span class="cil-pencil btn-icon mr-2"></span> แก้ไข</a>
                                      @else
                                      <a href="{{ url('/paytaxs/' . $input->id) }}" class="btn btn-block btn-success"><span class="cil-print btn-icon mr-2"></span>พิมพ์ใบชำระภาษี</a>
                                    @endif
                              </td>
{{--                              <td>--}}
{{--                                <a href="{{ url('/paytaxs/' . $input->id . '/edit') }}" class="btn btn-block btn-primary">แก้ไข</a>--}}
{{--                              </td>--}}
{{--                             <td>--}}
{{--                                <form action="{{ route('inputs.destroy', $input->id ) }}" method="POST">--}}
{{--                                    @method('DELETE')--}}
{{--                                    @csrf--}}
{{--                                    <button class="btn btn-block btn-danger">ลบ</button>--}}
{{--                                </form>--}}
{{--                              </td>--}}
                            </tr>
                          @endforeach
                          </td>

                        </tbody>
                      </table>



                    </div>

                    <div style="margin-left: 70%;">
                        <td>
                            @php
                                $sum_tax_lu = 0;
                                   $sum_tax_bu = 0;
                                   $sum_bu_lu = 0;
                                   $sum_tax = 0;
                                   $sum_tax_sign = 0;
                                   $i = 1;
                                   $l = 1;
                                   $ln = 1;

                            @endphp
                            @foreach($lands as $land)
                                <p hidden>{{$countln=$ln++}} </p>
                                @php $sum_lu_bu += $land->tax_lu +=$land->tax_bu @endphp
                            @endforeach
                            <p style="font-weight: bold"> ภาษีที่ดิน (จำนวน {{$countln}}) : {{$sum_bu_lu=number_format($sum_lu_bu),2}} บาท </p>
                            @foreach($landuses as $landuse)
                                <p style="font-weight: bold" hidden> ภาษีโรงเรือน {{$count=$i++}} : {{number_format($sum_tax+=$landuse->sum_pay_land_tax),2}} บาท </p>
                            @endforeach
                            <p style="font-weight: bold"> ภาษีโรงเรือน (จำนวน {{$count}}) : {{number_format($sum_tax),2}} บาท </p>
                            @foreach($sign_boards as $sign_board)
                                <p style="font-weight: bold" hidden> ภาษีป้าย {{$countl=$l++}} : {{number_format($sum_tax_sign+=$sign_board->tax),2}} บาท </p>
                            @endforeach
                            <p style="font-weight: bold"> ภาษีป้าย (จำนวน {{$countl}}) : {{number_format($sum_tax_sign),2}} บาท </p>
                            <p style="font-weight: bold"> รวมภาษี : <font style="font-size: 2rem;color: red">{{number_format($sum_tax + $sum_tax_sign +$sum_lu_bu),2}}  บาท </font> </p>
                        </td> <br>
                        <script>
                            //คำนวนพื้นที่ป้าย
                            $(document).ready(function () {
                                $('input[type="number"]').keyup(function () {
                                    var val1 = parseFloat($('#sum_land_tax').val());
                                    var val2 = parseFloat($('#sum_sign_tax').val());
                                    var sum = Math.round(val1 * val2);
                                    $("input##").val(sum);
                                });
                            });
                        </script>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

