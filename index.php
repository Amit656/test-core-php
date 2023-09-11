<?php 
include_once './header.php';
include_once 'connections/MySQLDatabase.php';
?>

<title>Registration</title>
</head>
<body>
    <div class="container">
    <h2>Registration Form</h2>
    <form id="registrationForm">
        <div class="form-group">
        <label for="username">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <!-- Add other registration fields here -->
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <div id="loader" style="display: none;">Loading...</div>
    <div id="result"></div>
    </div>

    <!-- Modal for OTP confirmation -->
<div class="modal" id="otpModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">OTP Sent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>An OTP has been sent to your email. Please check your inbox and enter the OTP to verify your registration.</p>
        <!-- Add OTP input field here -->
        <form id="verifyOTPForm">
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp" required>
            <button type="submit">Verify OTP</button>
            <p id="otpError" style="color: red;"></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>

<?php include_once './footer.php';?>
<script type="text/javascript" src="./resource/js/register.js"></script>
<script>
    let host_url = "http://localhost/saorv_chawala";
</script>
</html>