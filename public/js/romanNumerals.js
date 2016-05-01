$(document).ready(function(){
    $("#convert").click(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../main.php',
            data: $('#converter').serialize(),
            success: function (data) {
                $('#result').val(JSON.parse(data));
            }
        });
    });
});
