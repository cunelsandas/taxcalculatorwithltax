@extends('dashboard.authBase')

@section('content')

    <script type="text/javascript">
        document.title = 'ยืนยันการชำระภาษี';
    </script>

    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>ยืนยันการชำระภาษี</h1>

                            <div style="width: 250px;height: 250px;background-color: #cccccc"> QR CODE

                            </div>

                            <br>
                            <h3>อัพโหลดสลิปโอนเงิน</h3>
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    อัพโหลดผิดพลาด<br><br>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                            @endif
                            @if($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{$message}}</strong>
                                </div>

                                <img src="/images/{{Session::get('path')}}" width="300"/>
                            @endif
                            <form method="post" action="{{url('/uploadfile')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <table class="table">
                                        <tr>
                                            <td width="40%" align="right"><label>เลือกไฟล์</label></td>
                                            <td width="30%"><input type="file" name="select_file"></td>
                                            <td width="30%"><input type="submit" align="left" name="upload" class="btn-primary" value="อัพโหลด"></td>
                                        </tr>
                                    </table>
                                </div>

                            </form>

                                    <h3>ผ่อนชำระภาษี</h3>
                                    <a href="http://www.bangkok.go.th/upload/user/00000077/form/rd/04.pdf">หนังสือขอผ่อนชำระภาษี</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    </div>
@endsection

@section('javascript')

@endsection
