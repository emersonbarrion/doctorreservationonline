Proceed to Checkout

<form action="<?php echo url_for('payment/index') ?>" method="post">
    <input name='amount' value='150'>
    <a href='<?php echo url_for('payment/index') ?>'>
        <img src="https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif">
    </a>
</form>