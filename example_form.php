<?php
/* Example validation for a login form */
if(isset($_POST)) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username' => array(
            'required' => true,
            'length_min' => 6,
            'length_max' => 15,
            'blacklist' => array(
                'administrator',
                'qwerty',
                'roottoor',
                'superman',
                'sudosu')
        ),
        'password' => array(
            'required' => true,
            'length_min' => 8)
    ));

    if($validation->passed()) {
        /* Validation ok, do whatever you want from here on */
    }
    else {
        /* Validation failed, output errors from Validation class */
        echo '<b>Error:<br><br></b>';
        foreach($validation->errors() as $error)
        {
            echo '- ', ucfirst($error), '<br>';
        }
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Enter username...">
    <input type="password" name="password" placeholder="Enter password...">
    <input type="submit" value="Submit">
</form>
