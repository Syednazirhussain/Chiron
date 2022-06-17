<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Promotions</title>
   </head>
   <body>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <!-- LOGO -->
         <tr>
            <td bgcolor="#3a3a3a" align="center">
               <table border="0" cellpadding="0" cellspacing="0" width="580" >
                  <tr>
                     <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        <img src="{{ config('app.url').'/assets/admin/images/logo.png' }}" alt="Logo">
                        <!-- <h5 style="color:#0092d9; font-size:22px;">FishFilesLite Newsletter November 2018</h5> -->
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <!-- HERO -->
         <tr>
            <td bgcolor="#3a3a3a" align="center" style="padding: 0px 10px 0px 10px;">
               <table border="0" cellpadding="0" cellspacing="0" width="580" >
                  <tr>
                     <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 32px; font-weight: 400; margin: 0;">
                              Appointment Cancellation
                        </h1>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <!-- COPY BLOCK -->
         <tr>
            <td bgcolor="#3a3a3a" align="center" style="padding: 0px 10px 0px 10px;">
               <table border="0" cellpadding="0" cellspacing="0" width="580" >
                  <!-- COPY -->
                  <tr>
                     <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                        <p style="margin: 0;">
                            Hi, {{ $user->name ? $user->name: 'ABC' }} <br><br>
                            @if($refund)
                                Your session is being canceled and the amount has been refunded to you.
                            @else
                                Your session is being canceled.
                            @endif
                        </p>
                     </td>
                  </tr>
                  <!-- BULLETPROOF BUTTON -->
                  <tr>
                     <td bgcolor="#ffffff" align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <!-- COPY CALLOUT -->
         <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
               <table border="0" cellpadding="0" cellspacing="0" width="580" >
                  <!-- HEADLINE -->
                  <tr>
                     <td bgcolor="#3a3a3a" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                     <h2 style="font-size: 20px; font-weight: 400; color: #fff; margin: 0;">Need more help?</h2>
                     <p style="margin: 0;"><a href="{{ config('app.url') }}" target="_blank" style="color: #fff;">We&rsquo;re here, ready to talk</a></p>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <!-- FOOTER -->
      </table>
      </td>
      </tr>
      </table>
   </body>
</html>