Proceed to Checkout

<form method=post action='https://www.sandbox.paypal.com'>
    <input type=hidden name=USER value='schedu_1357852582_biz_api1.gmail.com'>
    <input type=hidden name=PWD value='1357852601'>
    <input type=hidden name=SIGNATURE value='AcjbdLpyzOwwewC5D2WjKACP1MM4Aqs-5DWAIA4KGeSJql0Gc8vGMfx2'>
    <input type=hidden name=VERSION value='XX.0'>
    <input type=hidden name=PAYMENTREQUEST_0_PAYMENTACTION value='Sale'>
    <input name=PAYMENTREQUEST_0_AMT value='150'>
    <input type=hidden name=RETURNURL value='http://www.courtreservationonline.com/payment'>
    <input type=hidden name=CANCELURL value='http://www.courtreservationonline.com/payment'>
    <input type=submit name=METHOD value='SetExpressCheckout'>
</form>

<a href='<?php echo url_for('payment/index') ?>'>
  <img src="https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif">
</a>