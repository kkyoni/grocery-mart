<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Grocery Mart - Forget Password</title>
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
                                            <td align="center"><img
                                                    src="{{ asset('uploads/settings/application_logo.png') }}"
                                                    alt="application_logo" class="img-fluid"></td>
                                        <tr>
                                        <tr>
                                            <td align="center"><img
                                                    src="{{ asset('uploads/settings/forgetpassword.png') }}"
                                                    alt="forgetpassword" class="img-fluid"
                                                    style="width:100%; max-width:100%;"></td>
                                        </tr>
                                        <tr>
                                            <td align="center"
                                                style="color: #0f4373;font-family: Avenir,Helvetica,Arial,sans-serif; font-size: 24px; line-height: normal; font-weight: 600; padding-bottom: 10px;">
                                                Forget Password</td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="color: #282828; font-family: Avenir,Helvetica,Arial,sans-serif; font-size:16px; line-height: 22px; padding:0 25px 20px; float: left;">
                                                Hello {{ $details['name'] }}
                                                <br><br>{{ $details['body'] }} <span
                                                    style="color: #000; font-family: Avenir,Helvetica,Arial,sans-serif; font-size: 20px; line-height: normal; font-weight: 600;">{{ $details['password'] }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 25px 20px; color: #0f4373; font-family: Avenir,Helvetica,Arial,sans-serif; font-size:18px; line-height: normal;">
                                                <img src="{{ asset('uploads/settings/thanks.jpg') }}" alt="thanks"
                                                    class="img-fluid">
                                                <br>{{ $details['thankyou'] }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
</body>

</html>
