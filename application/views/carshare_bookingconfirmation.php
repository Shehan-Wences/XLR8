<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <title>XLR8 - Booking Confirmation</title>

</head>
<body style="background-color:#EAECED; ">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <style> @import url('https://fonts.googleapis.com/css?family=Open+Sans');
  </style>
  <table align="center" bgcolor="#EAECED" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr style="font-size:0;line-height:0">
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="center" valign="top">
                <table width="600">
                    <tbody>
                        <tr>
                            <td align="center">
                                <table border="0" cellpadding="0" cellspacing="0" width="570">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center">
                                                <a href="<?php echo base_url(); ?>" target="_blank"><img alt="XLR8 Logo" src="assets/img/logo2.png" style="border:0"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="overflow:hidden!important;border-radius:3px" width="580">
                                    <tbody>
                                       
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
										 <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <table width="85%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <h2 style="margin:0!important;font-family:'Open Sans',helvetica,arial,sans-serif!important;font-size:28px!important;line-height:38px!important;font-weight:200!important;color:#252b33!important">Booking Confirmation</h2>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
										
                                        <tr>
                                            <td align="center">
                                                <table border="0" cellpadding="0" cellspacing="0" width="78%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left" style="font-family:'Open Sans',helvetica,arial,sans-serif!important;font-size:16px!important;line-height:30px!important;font-weight:100!important;color:#7e8890!important">
                                                                <p>Booking successfully made.Check your bookings page for more information.As always, we are here to help should you have any questions.</p>
                                                                <ul style="text-align: left">
                                                                    <li>Customer name: <strong><?php echo $username; ?></strong></li>
                                                                    <li>Car: <strong><?php echo $cart['carid']; ?></strong></li>
                                                                    <li>Pick Up: <strong><?php echo $cart['pdate']; ?></strong></li>
                                                                    <li>Drop Off: <strong><?php echo $cart['ddate']; ?></strong></li>
                                                                    <li>Total Amount: <strong><?php echo round($cart['rent']); ?> AUD</strong></li>
<!--                                                                     <li>Your earning: <strong>£350.00</strong></li> -->
                                                                </ul>
                                                                <p>Kind regards</p>
                                                                <p>XLR8 Bookings Team</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                       
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">
                                <table border="0" cellpadding="0" cellspacing="0" width="580">
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font-family:'Open Sans',sans-serif!important;font-weight:400!important;color:#7e8890!important;font-size:12px!important;text-transform:uppercase!important;letter-spacing:.045em!important"
                                                valign="top">XLR8 &#9679; CAR RENTAL &#9679; SERVICES</td>
                            </tr>
                            <tr style="padding:0;margin:0;font-size:0;line-height:0">
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family:'Open Sans',sans-serif!important;font-weight:400!important;color:#7e8890!important;font-size:11px!important;letter-spacing:.05em!important"
                                    valign="top"><em></em></td>
            </tr>
            <tr style="padding:0;margin:0;font-size:0;line-height:0">
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <p style="margin-bottom:1em;font-family:Open Sans,sans-serif!important;padding:0!important;margin:0!important;color:#7e8890!important;font-size:12px!important;font-weight:300!important">
                        <span>XLR8 Car Rental Ltd. 45 Collins St, Melbourne, VIC 3000</span></p>
                </td>
            </tr>
                        <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            
           
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
        </tr>
    </tbody>
</table>
  
  </body>
</html>