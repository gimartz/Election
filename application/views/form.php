<html>
    <head>
        <title>Create Contact Form Using CodeIgniter</title>
        <link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="http://localhost/CodeIgniter/css/styles.css">
    </head>
    <body>
        <div id="container">
        <?php echo form_open('main_controller'); ?>
        <h1>Create Contact Form Using CodeIgniter</h1><hr/>
        
        <?php echo form_label('Student Name :'); ?><br />
        <?php echo form_input(array('id' => 'dname', 'name' => 'dname')); ?><br />

        <?php echo form_label('Student Email :'); ?><br />
        <?php echo form_input(array('id' => 'demail', 'name' => 'demail')); ?><br />

        <?php echo form_label('Student Mobile No. :'); ?><br />
        <?php echo form_input(array('id' => 'dmobile', 'name' => 'dmobile')); ?><br />

        <?php echo form_label('Student Address :'); ?><br />
        <?php echo form_input(array('id' => 'daddress', 'name' => 'daddress')); ?><br />

        <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>

        <?php echo form_close(); ?>
        
        <div id="fugo">
          <a href="http://www.formget.com/app/"><img src="http://localhost/CodeIgniter/images/formGetadv-1.jpg" /></a>  
        </div>
       </div>
    </body>
</html>