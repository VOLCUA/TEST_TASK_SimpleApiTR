

<div class="container mt-3">
    <h2>Submit Form via Ajax</h2>
    <form id="myForm">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" value="Test" class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" value="Test" class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" value="Test" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" value="Test@gmail.com" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

    var formData_extra=
        {
            "box_id" :28,
            "offer_id" :3,
            "countryCode" :"RU",
            "language" :"ru",
            // "password" :"",
            "ip":"",
            "landingUrl":""
        }

    // Get real IP address through JavaScript
    $.getJSON("https://api.ipify.org?format=json", function(data) {
        formData_extra.ip = data.ip;
    });

    // Get landing URL through JavaScript
    formData_extra.landingUrl = window.location.origin;


    $('#myForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        formData = formData + '&' + $.param(formData_extra);
        $.ajax({
            type: 'POST',
            url: '?api=forminput',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === true) {
                    window.location.href = response.autologin;
                } else {
                    alert('Error: ' + response.error);
                }
            },
            error: function() {
                alert('Error: There was an error while submitting the form');
            }
        });
    });
</script>

