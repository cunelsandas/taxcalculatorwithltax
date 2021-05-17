<script>

    $('#button1').click(function(e)){
    $.ajax({
        url: 'http://localhost/blog/save-form',
        type: "POST",
        data: $('#contact_us').serialize(),
        success: function (response) {
            $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');

            document.getElementById("contact_us").reset();
            setTimeout(function () {
                $('#res_message').hide();
                $('#msg_div').hide();
            }, 10000);
        }
    });


</script>
