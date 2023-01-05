<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial;
        }

        .coupon {
            border: 5px dotted #bbb;
            width: 80%;
            border-radius: 15px;
            margin: 0 auto;
            max-width: 600px;
        }

        .container {
            padding: 2px 16px;
            background-color: #f1f1f1;
        }

        .promo {
            background: #ccc;
            padding: 3px;
        }

        .expire {
            color: red;
        }
    </style>
</head>

<body>

    <div class="coupon">
        <div class="container">
            <img src="{{ asset('uploads/settings/application_logo.png') }}" alt="application_logo" class="img-fluid">
        </div>
        <img src="{!! @$details['images'] !== ''
            ? url('storage/promocode/' . @$details['images'])
            : url('storage/promocode/default.png') !!}" alt="Avatar" style="width:100%;">
        <div class="container" style="background-color:white">
            <h2><b>{{ $details['discount'] }}% OFF YOUR PURCHASE</b></h2>
            <p>{{ $details['description'] }}</p>
        </div>
        <div class="container">
            <p>Use Promo Code: <span class="promo">{{ $details['code'] }}</span></p>
            <p class="expire">Expires: {{ $details['expires'] }}</p>
        </div>
    </div>

</body>

</html>
