<h1>
    hello 
</h1>
<?php foreach ($data as $key => $val){ ?>
    <p>
        stt: <?php echo $key + 1?>
    </p>
    <p>
        name: <?php echo $val['name_user'] ?>
    </p>
    <p>
        email: <?php echo $val['email_user'] ?>
    </p>
    <p>
        phone: <?php echo $val['phone_number_user'] ?>
    </p>
<?php } ?>