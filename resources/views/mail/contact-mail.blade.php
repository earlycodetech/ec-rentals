<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body style="background-color: #f0f00a;">
    <h1>
        Name: {{ $info['name'] }}
    </h1>

    <h2>
        Email: {{ $info['email'] }}
    </h2>

    <h5>Message</h5>
    <p>
        {{ $info['message'] }}
    </p>
</body>

</html>
