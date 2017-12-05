<!DOCTYPE html>

<html>
<head>
<title>Nos Mudamos</title>

</head>
	<body>	
 <table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody><tr>
        <td style="padding:20px 0 20px 0" align="center" valign="top">
            <table style="text-align:left" width="650" cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff">
                <tbody><tr>
                    <td valign="top">
                        <h1 style="color:#014ab9;font-size:16px;font-weight:bold;line-height:25px;margin:0 0 11px 0">
                            Estimado {{Auth::user()->name ." ". Auth::user()->apellido}},
                        </h1>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0">Gracias por tu reciente compra en <strong><em>Empresa - El Salvador</em></strong>.</p>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0">Tu pedido <strong>{!!$idpedido!!}</strong> aún no ha sido procesado, ya que es necesario verificar algunos datos de pago para fines de seguridad.</p>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0">Para confirmar la información y entrega de tu producto, te estaremos contactando en las próximas 48 horas al número que previamente has colocado en el pedido o puedes contactarnos al <a href="tel:2133%200200" value="+50321330200" target="_blank">(503) 2133-0200</a> (Local) - 1866.200.4040 (USA) y uno de nuestros agentes de servicio al cliente será el encargado de ayudarte. Nuestros horarios de atención son de Lunes a Sabado de 7:00 am a 9:00 pm  y Domingo de 10:00 am a 7:00pm.</p>
						<p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0">Los días de entrega empiezan a contar una vez que la transacción haya sido verificada por el banco emisor de la tarjeta.</p>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0">No olvides tener a la mano tu número de pedido para atenderte de manera más rápida y eficiente.</p>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0">Si no logramos contactarnos contigo en un lapso de 48 horas tu pedido será cancelado.</p>
                        <p style="color:#58585a;font-size:14px;line-height:16px;margin:0px 0 16px 0">Tú completa satisfacción es muy importante para nosotros. Lamentamos este inconveniente, pero este proceso es pensado en tu seguridad y pronto tú y los tuyos estarán disfrutando de tu compra.</p>
                        <p style="color:#58585a;font-size:14px;margin:0">Gracias por confiar en nosotros. Si tienes cualquier duda o consulta escríbenos a soporte_sv@tienda.com o llámanos a los números arriba mencionados y con gusto te atenderemos.</p>
                    </td>
                </tr>
                <tr>
                    <td>

                        <br><br>
                        Atentamente,
                        <br>

                        <p style="color:#58585a;font-size:14px;margin:0">
                            <strong>Empresa - El Salvador</strong>
                        </p>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>
</body>
</html>