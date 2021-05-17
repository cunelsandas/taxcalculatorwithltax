@extends('dashboard.base')

@section('content')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
{{--    <style>--}}
{{--        body{--}}
{{--            font-family: "TH SarabunPSK";--}}
{{--            font-size: 16px;--}}
{{--        }--}}
{{--    </style>--}}

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                        <div class="card-header" style="text-decoration: underline"><h4>ราคาประเมินทุนทรัพย์ของที่ดินและสิ่งปลูกสร้าง (ภ.ด.ส. 1)</h4></div>
                    <div class="card-body">
{{--                        <div class="row">--}}
{{--                          <a href="{{ route('inputs.create') }}" class="btn btn-dark m-2"><span class="cil-people btn-icon mr-2"></span>{{ __('เพิ่มข้อมูลผู้ชำระภาษี') }}</a>--}}
{{--                        </div>--}}

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

{{--                            <th>สถานะข้อมูล</th>--}}
                              <th>วันที่เพิ่ม</th>
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


{{--                              <td>--}}
{{--                                  <span class="{{ $input->status->class }}">--}}
{{--                                      {{ $input->status->name }}--}}

{{--                                  </span>--}}
{{--                              </td>--}}
                                <td>{{$input->created_at}}</td>
                              <td><strong>{{ $input->input_type }}</strong></td>
                              <td>
                                <a href="{{ url('/reports/' . $input->id.'/pds1') }}" class="btn btn-block btn-primary"><span class="cil-library-building btn-icon mr-2"></span>ดูรายงาน ภ.ด.ส. 1</a>
                              </td>
{{--                              <td>--}}
{{--                                <a href="{{ url('/inputs/' . $input->id . '/edit') }}" class="btn btn-block btn-warning"><span class="cil-pencil btn-icon mr-2"></span>แก้ไข</a>--}}
{{--                              </td>--}}
{{--                              <td>--}}
{{--                                <form action="{{ route('inputs.destroy', $input->id ) }}" method="POST">--}}
{{--                                    @method('DELETE')--}}
{{--                                    @csrf--}}
{{--                                    <button class="btn btn-block btn-danger">ลบ</button>--}}
{{--                                </form>--}}
{{--                              </td>--}}
                            </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

