<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Grocery Mart - OTP Verify</title>
</head>

<body>
    <table
        style="border-collapse:collapse;border-spacing:0!important;margin:0 auto; max-width:600px; border:1px solid #000"
        cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td valign="top">
                    <table style="border-collapse:collapse;border-spacing:0!important;" cellspacing="0" cellpadding="0"
                        width="100%" border="0">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" style="background-color:#f1f1f1; padding-top: 20px;">
                                        <tr>
                                            <td align="center">
                                                <img src="{{ asset('uploads/settings/application_logo.png') }}"
                                                    alt="application_logo" class="img-fluid">
                                            </td>
                                        <tr>
                                        <tr>
                                            <td
                                                style="color: #282828; font-family: Avenir,Helvetica,Arial,sans-serif; font-size:16px; line-height: 22px; padding:0 25px 20px; float: left;">
                                                <h5 class="font-weight-bold mt-2"
                                                    style="font-family: sans-serif; color: #3d4852; font-size: 19px; text-align: left; font-weight: bold;">
                                                    Hello {{ $userName }}, </h5>
                                                {{ $title }}
                                            </td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <td
                                                style="font-family: Avenir,Helvetica,Arial,sans-serif; font-size:16px; line-height: 22px; padding:0 25px 20px;">
                                                <mark style="background-color: #2c4292 !important">
                                                    <small class="font-weight-bold"
                                                        style="letter-spacing: 2px; text-align: left; padding-left: 15px; font-size: 17px; font-family: sans-serif; color: #FFF; background-color: #2c4292 !important">{{ $text }}</small>
                                                </mark>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('uploads/settings/otp.png') }}" alt="otp"
                                                    class="img-fluid" style="width:100%; max-width:100%;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 25px 20px; color: #0f4373; font-family: Avenir,Helvetica,Arial,sans-serif; font-size:18px; line-height: normal; text-align: right">
                                                <img src="{{ asset('uploads/settings/thanks.jpg') }}" alt="thanks"
                                                    class="img-fluid">
                                                <br>Grocery Mart Team
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
</body>

</html>
