@extends('dashboard.base')
@section('content')

    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> บันทึกค่าตั้งต้นภาษีป้าย </div>
                <div class="card-body">
                    <form id="sign_typet" method="post" action="javascript:void(0)">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <tbody>
                        @foreach($sign_type as $sign)
                        <tr>
                            <td>{{$sign -> sign_desc}}</td>
                            <td><input type="text" value="{{$sign -> sign_tax}}" required /></td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                        <button id="send_form" class="btn btn-block btn-success" type="submit" >บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
    </div>


@endsection

<script>
    if ($("#sign_typet").length > 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#send_form').html('Sending..');
            $.ajax({
                url: '',
                type: "POST",
                data: $('#sign_type').serialize(),
                success: function (response) {
                    $('#send_form').html('บันทึก');
                    $('#res_message').show();
                    $('#res_message').html(response.msg);
                    $('#msg_div').removeClass('d-none');

                    document.getElementById("sign_typet").reset();
                    setTimeout(function () {
                        $('#res_message').hide();
                        $('#msg_div').hide();
                    }, 10000);
                }
            });

    }
</script>
