<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Grocery Mart - Ecommerce</title>
    <style type="text/css">
        .container{
                min-width: 212px; background-color: #1b95eb;
        }
        .container .footer_text{
            padding: 25px 0px;text-align: center;color: #fff;
        }

    </style>

</head>
<body style="padding:0px; margin:0px;">


<center>
    <!-- <div class="container my-5 d-flex justify-content-center" style="text-align: center;">
    <div class="row d-flex justify-content-center ">
        <div class="col"> -->
            <div class="card" style="border-radius: 11px; width: 460px; box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.5); border-top-color: #2c4292 !important">
                <div class="card-header pb-0 bg-white" style="border: 0; border-top: 14px solid #2c4292 !important; border-radius: 11px !important">
                    <div class="row justify-content-center mt-4">
                        <div class="col-9">
                            <img src="{{asset('images/logo.png') }}" class="img-fluid">
                        </div>
                    </div>
                    <h5 class="font-weight-bold mt-2" style="font-family: sans-serif; color: #3d4852; font-size: 19px; text-align: left; font-weight: bold; padding-left: 15px;">Hello {{$userName}}, </h5>
                </div>
                <div class="card-body" style="border-radius: 9px !important">
                    <p class="text-muted" style="text-align: left; padding-left: 15px; font-size: 17px; font-family: sans-serif;"> {{$title}}</p><mark style="background-color: #2c4292 !important"><small class="font-weight-bold" style="letter-spacing: 2px; text-align: left; padding-left: 15px; font-size: 17px; font-family: sans-serif; color: #FFF; background-color: #2c4292 !important">{{$text}}</small></mark> <img src="{{asset('images/otp.jpg') }}" class="img-fluid" style="width: 350px !important" />
                    <div class="row justify-content-center mt-4">
                        <div class="col-9" style="text-align: left; padding-left: 15px; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0;">Thank You,<br>
                            Grocery Mart Team</div>
                    </div>
                </div>
            </div>
        <!-- </div>
    </div>
</div> -->

</center>

</body>
</html>
