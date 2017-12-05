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
                <tbody><tr> 
                    <td valign="top">
                        <h1 style="color:#014ab9;font-size:16px;font-weight:bold;line-height:25px;margin:0 0 11px 0">
                        Hola, {{Auth::user()->name ." ". Auth::user()->apellido}}
                        </h1>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0"> 
                        Gracias por tu orden en La Empresa - El Salvador. Una vez que el/los producto(s) este(n) listo(s) para ser entregado(s) te haremos llegar un correo electrónico de confirmación. <br><br>Te informamos que el monto de la transacción no ha sido debitado de tu forma de pago seleccionada, únicamente se han reservado los fondos con el fin de verificar los datos proporcionados.
                        Cuando tu orden esté lista para ser entregada,  se procederá a debitar el monto de la forma de pago seleccionada.
                        El envío se realizará una vez que el pago haya sido verificado.
                        <br><br>Al reintegrar el monto de la transacción a tu tarjeta de crédito o debito, este estará reflejado en un período de 30 días hábiles, aplica únicamente si se realizó el pago con tarjeta de crédito o debito, no con otros métodos de pago.
                        <br><br><b> Tiempo de entrega de  8 hasta 10 días hábiles después de verificada la transacción por el banco emisor de la tarjeta.</b> <br><br> Si tienes dudas por favor siéntete en la libertad de contactarnos en soporte_sv@lacuracaonline.com o vía telefónica al <a href="tel:2133%200200" value="+50321330200" target="_blank">2133-0200</a> y 1866-200-4040 (USA), de Lunes a Sabado de 7:00am a 9:00pm PST y Domingo de 10:00am a 7:00pm PST. 
                        <br><br> 
                        La confirmación de su pedido se encuentra adjunta abajo.
                        <br><br>
                        Su pedido está sujeto a los <a href="http://www.lacuracaonline.com/elsalvador/terminos-y-condiciones" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://www.lacuracaonline.com/elsalvador/terminos-y-condiciones&amp;source=gmail&amp;ust=1512504237339000&amp;usg=AFQjCNH-cM6nJ1rZGJGeRYKK2_Ks_czPPg">términos y condiciones</a> de www.lacuracaonline.com  
                        <br><br>
                        
                        </p>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0">
                        A continuación encontrarás la confirmación de tu orden. Nuevamente te agradecemos por tu compra.
                        </p>
                    </td>
                </tr> 
                <tr> 
                    <td> 
                        <table style="width:650px;overflow:hidden" cellspacing="0" cellpadding="0" border="0">
                            <thead> 
                                <tr> 
                                    <th style="color:#fff;font-size:13px;padding:5px 9px 6px 9px;line-height:1em;width:302px;overflow:hidden" align="left" bgcolor="#014ab9">
                                    Información de Facturación:
                                    </th> 
                                    
                                </tr> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td class="m_3215089422822002770billing-address-info" style="color:#6d6e71;font-size:12px;padding:5px 9px 6px 9px;border-left:1px solid #014ab9;border-bottom:1px solid #014ab9;border-right:1px solid #014ab9;width:300px;overflow:hidden;font-family:Verdana,Arial,Helvetica,sans-serif" valign="top"> 
                                    {{Auth::user()->name ." ". Auth::user()->apellido}}<br>

                                        {{Auth::user()->direccion}}<br><br>
                                        {{Auth::user()->pais}}<br>
                                        T: <a href="tel:7525%209317" value="+50375259317" target="_blank">{{Auth::user()->telefono}}</a>


                                    </td>
                                   
                                </tr> 
                            </tbody> 
                        </table>
                        <div style="height:10px;width:100%">&nbsp;</div>
 
             
                        <table style="border:1px solid #eaeaea" width="650" cellspacing="0" cellpadding="0" border="0">
                            <thead>
                                <tr>
                                    <th style="font-size:13px;padding:3px 9px" align="left" bgcolor="#EAEAEA">Artículo</th>
                                    <th style="font-size:13px;padding:3px 9px" align="left" bgcolor="#EAEAEA">ID</th>
                                    <th style="font-size:13px;padding:3px 9px" align="center" bgcolor="#EAEAEA">Cant.</th>
                                    <th style="font-size:13px;padding:3px 9px" align="right" bgcolor="#EAEAEA">Subtotal</th>
                                </tr>
                            </thead>

                                    <tbody bgcolor="#F6F6F6">
                                <tr>
                                @foreach($carrito as $car)
                                
                                
                            <td style="font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc" align="left" valign="top">
                            <strong style="font-size:11px">{{$car->nombre}}</strong>
                            </td>
                            <td style="font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc" align="left" valign="top">{{$car->idProductos}}</td>
                            <td style="font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc" align="center" valign="top">{{$car->cantidad}}</td>
                            <td style="font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc" align="right" valign="top">
                            @if($car->idpromo)
                            <span class="m_3215089422822002770price">$ {{number_format($car->preciopromo) * $car->cantidad}}</span>            
                            @else
                            <span class="m_3215089422822002770price">$ {{number_format($car->precio) * $car->cantidad}}</span>            
                            @endif
                            </td>
                            
                             @endforeach 
                             <?php $total = \Session::get('total');?>
                            </tr>
                            </tbody>
                            
                            <tbody>
                                        <tr class="m_3215089422822002770subtotal">
                                <td colspan="3" style="padding:3px 9px" align="right">
                                                Subtotal                    </td>
                                <td style="padding:3px 9px" align="right">
                                                <span class="m_3215089422822002770price">$ {{number_format($total,2)}}</span>                    </td>
                            </tr>
                                    <tr class="m_3215089422822002770shipping">
                                <td colspan="3" style="padding:3px 9px" align="right">
                                                Despacho                    </td>
                                <td style="padding:3px 9px" align="right">
                                                <span class="m_3215089422822002770price">$0.00</span>                    </td>
                            </tr>
                                                    <tr class="m_3215089422822002770grand_total">
                                <td colspan="3" style="padding:3px 9px" align="right">
                                                <strong>Total</strong>
                                            </td>
                                <td style="padding:3px 9px" align="right">
                                                <strong><span class="m_3215089422822002770price">$ {{number_format($total,2)}}</span></strong>
                                            </td>
                            </tr>
                                </tbody>
                        </table>
             
                                    <p style="font-size:12px;margin:0 0 10px 0">
                                    
                                    </p>
                                </td>
                            </tr>
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
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
</body>
</html>