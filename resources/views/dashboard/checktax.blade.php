



    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header" style="text-decoration: underline"><h4>ตรวจสอบภาษี</h4></div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label>เลขประจำตัวประชาชน</label>
                                <input class="form-control" type="text" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="{{ __('ใส่เลขบัตรประจำตัวประชาชน 13 หลัก') }}" name="card_id" required autofocus minlength="13" maxlength="13">
                            </div>

                            <div class="form-group row">
                                <button class="btn btn-block btn-success" type="submit">{{ __('เพิ่มข้อมูลผู้ชำระภาษี') }}</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






