$(document).ready(function(){
    hideErrors();
    $("#result").val('');
    $("#convert").click(function(e){
        e.preventDefault();
        submitForm($('#converter').serialize());
    });
});

function submitForm(formData){
    $.ajax({
        type: 'POST',
        url: '../main.php',
        dataType: "json",
        data: formData,
        success: function (data) {
            if(data.success == true) {
                hideErrors();
                $("#result").val(data.response);
            } else {
                showErrors(data.response);
                $("#result").val('');
            }
        }
    });
}

function showErrors(errorMessage){
    $("#error").show();
    $("#error").html(errorMessage);
}

function hideErrors(){
    $("#error").hide();
    $("#error").html('');
}
