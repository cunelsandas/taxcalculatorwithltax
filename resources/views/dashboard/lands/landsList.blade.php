@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header" style="text-decoration: underline"><h4>กรอกข้อมูลผู้ชำระภาษี</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route('inputs.create') }}" class="btn btn-primary m-2">{{ __('เพิ่มข้อมูลผู้ชำระภาษี') }}</a>
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
                                    <th>ลำดับที่</th>
                                    <th>Owner_id</th>
                                    <th>รหัสที่ดิน</th>
                                    <th>ชื่อเจ้าของทรัพย์สิน</th>
                                    <th width="20%">ที่อยู่</th>

                                    <th>สถานะข้อมูล</th>
                                    <th>วันที่เพิ่ม</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lands as $land)
                                    <tr>
                                        {{--                              <td><strong>{{ $input->user->name }}</strong></td>--}}
                                        <td><strong>{{ $land->id }}</strong></td>
                                        <td>{{ $land->owner_id}}</td>
                                        <td>
                                            {{ $land->dn }}
                                        </td>
                                        <td>
                                            @foreach($inputs as $input)
                                            {{$input->first_name}}
                                                {{$input->first_name}}
                                                @endforeach

                                        </td>


                                        <td>

                                        </td>
{{--                                        <td>{{$land->created_at}}</td>--}}
{{--                                        <td><strong>{{ $land->input_type }}</strong></td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{ url('/inputs/' . $input->id) }}" class="btn btn-block btn-primary">เพิ่มข้อมูลภาษี</a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{ url('/inputs/' . $input->id . '/edit') }}" class="btn btn-block btn-primary">แก้ไข</a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <form action="{{ route('inputs.destroy', $input->id ) }}" method="POST">--}}
{{--                                                @method('DELETE')--}}
{{--                                                @csrf--}}
{{--                                                <button class="btn btn-block btn-danger">ลบ</button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
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

