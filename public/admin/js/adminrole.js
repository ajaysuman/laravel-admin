$(document).ready(function() {
    $("#usersupdates").click(function() {
    $("#UpdateData").toggle();
    });
});



$(document).ready(function(){
    $("#formSubmit").click(function(){
        jQuery.ajax({
            url:"{{route('usersupdate')}}",
            type: "GET",
            data: $(this).serialize(),
            success:function(data){  
            } 
        });
        //stay.preventDefault(); 
    });
    // +++++++++++++++ For Image ++++++++++++++++
    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#image_preview_container').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });

    // +++++++++++++++++ Update Data +++++++++++++
    $('#UpdateData').submit(function(e) {
        e.preventDefault();      
        var formData = new FormData(this);;
        $.ajax({
            type:'POST',
            url: "updateAdmin",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function (data) {
            alert("Update Success");
                window.location = "subadmin";
                return false;
            }
        });   

    }); 
});       