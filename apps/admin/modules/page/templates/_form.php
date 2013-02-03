<div id="registerarea">

    <div id="loginbox">
        <form action="<?php echo url_for('page/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
            <?php echo $form->renderHiddenFields() ?>
            <ul>
              <li><div class='form-label'>Page Url:</div> <?php echo $form['page_url'] ?></li>
              <li class="error">&nbsp; <?php echo $form['page_url']->getError() ?></li>
              <li><div class='form-label'>Description:</div> <?php echo $form['description'] ?></li>
              <li class="error">&nbsp; <?php echo $form['description']->getError() ?></li>
              <li><a href='<?php echo url_for('page/remove?id='.$form->getObject()->getId()) ?>'>Delete</a></li>
              <li style="float:right;"><input name="Submit" type="submit" value="Submit" class="boxbutton"/></li>
            </ul> 
            <div class="clearfix"></div>
        </form>
    </div>

</div>