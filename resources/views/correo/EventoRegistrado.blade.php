
        <!-- THIS EMAIL WAS BUILT AND TESTED WITH LITMUS http://litmus.com -->
        <!-- IT WAS RELEASED UNDER THE MIT LICENSE https://opensource.org/licenses/MIT -->
        <!-- QUESTIONS? TWEET US @LITMUSAPP -->
        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <style type="text/css">
                /* CLIENT-SPECIFIC STYLES */
                body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
                table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
                img { -ms-interpolation-mode: bicubic; }

                /* RESET STYLES */
                img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
                table { border-collapse: collapse !important; }
                body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

                /* iOS BLUE LINKS */
                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: none !important;
                    font-size: inherit !important;
                    font-family: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                }

                /* MEDIA QUERIES */
                @media screen and (max-width: 480px) {
                    .mobile-hide {
                        display: none !important;
                    }
                    .mobile-center {
                        text-align: center !important;
                    }
                }

                /* ANDROID CENTER FIX */
                div[style*="margin: 16px 0;"] { margin: 0 !important; }
            </style>
        </head>
        <body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">

        <!-- HIDDEN PREHEADER TEXT -->
        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus dolor aliquid omnis consequatur est deserunt, odio neque blanditiis aspernatur, mollitia ipsa distinctio, culpa fuga obcaecati!
        </div>

        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                    <!--[if (gte mso 9)|(IE)]>
                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                        <tr>
                            <td align="center" valign="top" width="600">
                    <![endif]-->
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                        <tr>
                            <td align="center" valign="top" style="background-image: url({{ asset($encabezado = DB::table('contenido_correos')->where('id', 1)->value('piedepagina')) }}); background-repeat: no-repeat; background-size: 100% 100%; font-size: 0; padding: 35px; height: 100%;">

                                <!--[if (gte mso 9)|(IE)]>
                                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                <tr>
                                <td align="left" valign="top" width="300">
                                <![endif]-->
                                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;"> 
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                        <tr>
                                            <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                                                                
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--[if (gte mso 9)|(IE)]>
                                </td>
                                <td align="right" width="300">
                                <![endif]-->
                                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                        <tr>
                                        </tr>
                                    </table>
                                </div>
                                <!--[if (gte mso 9)|(IE)]>
                                </td>
                                </tr>
                                </table>
                                <![endif]-->
                               
                            </td>
                            
                        </tr>
                        <tr>
                            <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                <!--[if (gte mso 9)|(IE)]>
                                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                        <td align="center" valign="top" width="600">
                                <![endif]-->
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                    <tr>
                                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                            <img src="{{asset($evento->salas->imgSala)}}" width="125" height="120" style="display: block; border: 0px;" /><br>
                                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                                Tu visita ha sido Registrada con exito
                                            </h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                                {{$evento->salas->descripcion}}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-top: 20px;">
                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                        Sala
                                                    </td>
                                                    <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                        {{$evento->salas->nombre}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                        Fecha:
                                                    </td>
                                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                        {{ \Carbon\Carbon::parse($evento->fecha_entrada)->locale('es')->formatLocalized('%A, %d de %B de %Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                        Hora Entrada:
                                                    </td>
                                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                        {{ substr(\Carbon\Carbon::parse($evento->fecha_entrada)->toTimeString(), 0, 5) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                        Hora Salida:
                                                    </td>
                                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                        {{ substr(\Carbon\Carbon::parse($evento->fecha_salida)->toTimeString(), 0, 5) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                        Jefe de Departamento que registro la visita:
                                                    </td>
                                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                        {{ Auth::user()->name }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-top: 20px;">
                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                        Materiales:
                                                     
                                                        <table>
                                                            @foreach($evento->materialesEvento as $material)
                                                            <tr>
                                                              
                                                                <td>
                                                                    <p>{{  $material->nombre }}</p>
                                                                </td>
                                                              
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </table>
                                                  
                                                    </td>
                                                    <td width="25%" align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding 10px:  border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                        Cantidad:
                                                     
                                                        <table>
                                                            @foreach($evento->materialesEvento as $material)
                                                            <tr>
                                                              
                                                                <td>
                                                                    <p>{{$material->pivot->cantidad}}</p>
                                                                </td>
                                                              
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </table>
                                                  
                                                    </td>
                                        
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                </td>
                                </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr>
                            <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                <!--[if (gte mso 9)|(IE)]>
                                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                        <td align="center" valign="top" width="600">
                                <![endif]-->
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                    <tr>
                                        <td align="center" valign="top" style="font-size:0;">
                                            <!--[if (gte mso 9)|(IE)]>
                                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                                <tr>
                                                    <td align="left" valign="top" width="300">
                                            <![endif]-->
                                            <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">

                                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                    <tr>
                                                        <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                            <p style="font-weight: 800;">Firma Entrada</p>
                                                            <p>___________________</p>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!--[if (gte mso 9)|(IE)]>
                                            </td>
                                            <td align="left" valign="top" width="300">
                                            <![endif]-->
                                            <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                    <tr>
                                                        <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                            <p style="font-weight: 800;">Firma Salida</p>
                                                            <p>__________________</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!--[if (gte mso 9)|(IE)]>
                                            </td>
                                            </tr>
                                            </table>
                                            <![endif]-->
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                </td>
                                </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" style="background-image: url({{ asset($piedepagina = DB::table('contenido_correos')->where('id', 1)->value('piedepagina')) }}); background-repeat: no-repeat; background-size: 100% 100%; font-size: 0; padding: 35px; height: 100%;">
                    
                          </tr>
                          
                        
                        <tr>

                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
        </table>
        <!-- LITMUS ATTRIBUTION -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td bgcolor="#ffffff" align="center">
                    <!--[if (gte mso 9)|(IE)]>
                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                        <tr>
                            <td align="center" valign="top" width="600">
                    <![endif]-->
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                        <tr>

                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
        </table>
        <!-- END LITMUS ATTRIBUTION -->
        </body>
        </html>