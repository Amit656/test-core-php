function getFormDataIntoJsonObject($data){

}
$(document).ready(function () {
    $("#registrationForm").submit(function (e) {
        // Serialize form data to an array of objects
        var formDataArray = $(this).serializeArray();

        // Convert the array to an object
        var formDataObject = {};
        $.each(formDataArray, function(index, field) {
            formDataObject[field.name] = field.value;
        });

        // Convert the object to JSON
        var formDataJSON = JSON.stringify(formDataObject);

      e.preventDefault();
      $("#loader").show();
      $.ajax({
        url: host_url + "/apis/register/register.php",
        type: "POST",
        data: formDataJSON, // Convert your data to JSON
        contentType: 'application/json', // Set the content type to JSON
        dataType: 'json', // Expected response data type (optional)
        success: function (response) {
          $("#loader").hide();
          if (response.success) {
            $("#result").html("<div class='alert alert-success'>" + response.message + "</div>");

            showOtpModal();
          } else {
            $("#result").html("<div class='alert alert-danger'>" + response.message + "</div>");
          }
        },
        error: function () {
          $("#loader").hide();
          $("#result").html("<div class='alert alert-danger'>An error occurred</div>");
        }
      });
    });

    function showOtpModal() {
        $('#otpModal').modal('show');
      }

    $('#verifyOTPForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: host_url+'/apis/register/verify_otp.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                const optResult = JSON.parse(response)    
                if (optResult.success) {
                    // OTP verification successful, redirect to login page
                    window.location.href = host_url + '/login.php';
                } else {
                    // Display an error message to the user
                    $('#otpError').text(optResult.message);
                }
            },
            error: function () {
                // Handle AJAX error here
            }
        });
    });
  });