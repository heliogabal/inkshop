<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  </head>
  <body>
    <table width="100%" border="0" cellspacing="0" cellpadding="1" align="center" bgcolor="#CCC">
      <tr>
        <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bgcolor="#FFF" style="font-family: verdana, arial, helvetica; font-size: 10px;">
            <tr>
              <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: verdana, arial, helvetica; font-size: 11px;">
                  <tr>
                    <td nowrap="nowrap" style="line-height: 1.6em;" valign="middle">

<p style="font-family: verdana, arial, helvetica; font-size: 15px; ">


<br><b>
<?php if ($info['order_status']<>t('completed')) 
print t('LIEFERSCHEIN'); 
else
print t('RECHNUNG'); ?>

<br></b>


<br>
INKOTA-netzwerk e.V. • Chrysanthemenstraße 1-3 • 10407 Berlin
<br>
USt-IdNr.: DE263662401
</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: verdana, arial, helvetica; font-size: 11px;">
                  <tr>
                    <th colspan="2"><?php print t('Order Summary'); ?></th>
                  </tr>
                  <tr>
                    <td colspan="2">

                      <table class="details" width="100%" cellspacing="0" cellpadding="0" style="font-family: verdana, arial, helvetica; font-size: 1em;">
                        <tr>
                          <td valign="top" width="50%">
                            <br/>
                            <b><?php print t('Account No:'); ?></b> <?php print $info['order_uid']; ?><br/>
                            <br/>
                            <b><?php print t('Invoice Date:'); ?></b> <?php print date('j F, Y', $info['order_created']); ?><br/>
                            <br/>
                            <b><?php print t('Billing Address:'); ?></b><br />
                            <?php print isset($info['customer_billing']) ? $info['customer_billing'] : ''; ?><br />
                          </td>
                          <td valign="top" width="50%">
                            <br/>
                            <b><?php print t('Invoice Number:'); ?></b> <?php print $info['order_number']; ?><br/>
                            <br/>
                            <b><?php print t('Email Address:'); ?></b> <?php print $info['order_mail']; ?><br/>
                            <br/>
                            <b><?php print t('Shipping Address:'); ?></b><br />
                            <?php print isset($info['customer_shipping']) ? $info['customer_shipping'] : ''; ?><br />
                          </td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table class="products" width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family: verdana, arial, helvetica; font-size: 11px;">
                  <tbody>
                    <tr>
                      <td class="line-items"><?php print isset($info['line_items']) ? $info['line_items'] : ''; ?></td>
                    </tr>
                    <tr>
                      <td><?php print isset($info['order_total']) ? $info['order_total'] : ''; ?></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table>
                  <tr>
                    <td colspan="2" style="background: #EEE; color: #666; padding: 1em; font-size: 0.9em; line-height: 1.6em; border-top: #CCC 1px dotted; text-align: left;">
<p><hr><i>Für Überweisungen aus dem Ausland:</i>
<b>BIC:</b> GENODED 1 DKD			  <b>IBAN:</b> DE06 3506 0190 1555 0000 10
<hr>
<br>
<br>


<br>
<i>
<?php if ($info['order_status']<>t('completed')) 
print  t('Vielen Dank für Ihr Interesse. Bitte überweisen Sie den Rechnungsbetrag innerhalb 
von 14 Tagen unter Angabe Ihres Namens und unserer Rechnungsnummer.')  ; ?>
<br>
<?php if ($info['order_status']==t('completed')) 
print t('Vielen Dank für Ihre Bestellung und für Ihre Zahlung'); ?>
</i>


<br>
<br>
Mit freundlichem Gruß<br>
Alexandra Rieg



<br>


i.A. INKOTA-netzwerk e.V.






</p>  
                  </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
