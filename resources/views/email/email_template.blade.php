<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/
css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <style>
        .div_border {
            width: 60%;
            margin: 0 auto;
            border: 1px solid #ccc;
        }

        .has-error {
            border-color: #cc0000;
            background-color: #ffff99;
        }
    </style>
</head>
<body>
    <p>Dear, <b> {{ $emails['name'] }}</b></p>
    <p><i>WELCOME TO REVIVE COLLECTION </i></p>
    <p>{{ $emails['message'] }}.</p>
    <p style="color: red">This is the automation email. <b> Please dont reply !</b></p>
</body>
</html>
