<!DOCTYPE html>

<html>
<head>
<title>Nos Mudamos</title>

</head>
	<body>	{!!$content!!}

	
 <table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody><tr>
        <td style="padding:20px 0 20px 0" align="center" valign="top">
            <table style="text-align:left" width="650" cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff"> 
                <tbody>
                <tr> 
                    <td valign="top">
                        <h1 style="color:#014ab9;font-size:16px;font-weight:bold;line-height:25px;margin:0 0 11px 0">
                        Hola, {{Auth::user()->name ." ". Auth::user()->apellido}}
                        </h1>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0"> 
                        Gracias por tu orden en La Empresa - El Salvador. Una vez que el/los producto(s) este(n) listo(s) para ser entregado(s) te haremos llegar un correo electrónico de confirmación. <br><br>                        
                        El pago mediante transferencia bancaria es un metodo de pago sencillo para realizar compras a travez de internet. Puedes realizar dicho pago comodamente desde tu entidad bancaria<br><br>

                        Una vez finalizado el pedido, te enviaremos un email en donde te indicaremos los siguites datos: el banco, el importe del pedido, el concepto que debes indicar en la transferencia y el numero de cuenta. <br><br>
                        Recuerda que debes indicarcomo concepto del pago el numero de referencia de tu pedido.<br><br>
                        Las transferencia suelen tardar aproximadamente 24-48 habiles en hacerse efectivas<br><br>

                        Una vez confirmado el pago se procedera al envio del producto<br>


                        Recuerda utilizar el <strong>numero del pedido</strong> reflejado en el email de confirmacion como <strong>concepto</strong> de la transferencia.
                    </p>
                        
                        </p>

                    </td>
                </tr> </tbody>
                        </table>
                
                                
             
                                    <p style="font-size:12px;margin:0 0 10px 0">
                                    
                                    </p>
                                
                            <tr>
                                <td>
                                    <p style="color:#58585a;font-size:14px;margin:0">Gracias por su orden y por confiar en nosotros.

                                    <br><br>
                                    Atentamente,
                                    <br></p>

                                    <p style="color:#58585a;font-size:14px;margin:0">
                                        <strong>La Empresa - El Salvador</strong>
                                    </p>
                                </td>
                            </tr>

                    
            </tbody>
            </table>
</body>
</html>