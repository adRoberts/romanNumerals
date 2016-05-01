$(document).ready(function(){
    $("#error").hide();
    $("#error").html = '';
    $("#result").val('');
    $("#convert").click(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../main.php',
            dataType: "json",
            data: $('#converter').serialize(),
            success: function (data) {
                if(data.success == true) {
                    $("#error").hide();
                    $("#error").html('');
                    $("#result").val(data.response);
                } else {
                    $("#error").show();
                    $("#error").html(data.response);
                    $("#result").val('');
                }
            }
        });
    });
});
