<div id="registerarea">

    <div id="loginbox">
        <form action="<?php echo url_for('cms/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
            <?php echo $form->renderHiddenFields(false) ?>
            <ul>
              <li><div class='form-label'>Page Url:</div> <?php echo $form['page_url_id'] ?></li>
              <li class="error">&nbsp; <?php echo $form['page_url_id']->getError() ?></li>
              <li><div class='form-label'>Content Name:</div> <?php echo $form['content_name'] ?></li>
              <li class="error">&nbsp; <?php echo $form['content_name']->getError() ?></li>
              <li><div class='form-label'>Content Text:</div> <?php echo $form['content_text'] ?></li>
              <li class="error">&nbsp; <?php echo $form['content_text']->getError() ?></li>
              <li><div class='form-label'>Content Image:</div> <?php echo $form['content_image'] ?></li>
              <li class="error">&nbsp; <?php echo $form['content_image']->getError() ?></li>
              <li><a href='<?php echo url_for('cms/remove?id='.$form->getObject()->getId()) ?>'>Delete</a></li>
              <li style="float:right;"><input name="Submit" type="submit" value="Submit" class="boxbutton"/></li>
            </ul> 
            <div class="clearfix"></div>
        </form>
    </div>

</div>