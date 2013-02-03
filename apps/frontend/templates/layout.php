<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <!--[if !IE 7]>
    <style type="text/css">
        #pagewrap {display:table;height:100%}
    </style>
    <![endif]-->
</head>

<body>
    <div class="dim transparent"></div>
    <div id='pagewrap'>
        <div id='sub-pagewrap'>
            <?php include_component('common', 'header') ?>
            <div class="clearfix"></div>
            <div id="contentarea">
                <div id=main-container>
                    <?php echo $sf_content ?>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    <?php include_component('common', 'footer') ?>
</body>

</html>