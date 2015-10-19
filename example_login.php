<?php
if(!empty($_POST)) {
    require("Validate.php");
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username' => array(
            'required' => true,
            'length_min' => 3,
            'length_max' => 15,
            'alphabetic' => true
        ),
        'password' => array(
            'required' => true,
            'length_min' => 8
        )
    ));

    if($validation->passed()) {
        echo 'Validation passed!';
    }
    else {
        echo '<b>Error:</b>';
        echo '<ul>';
        foreach($validation->errors() as $error)
        {
            echo '<li>'.ucfirst($error).'</li>';
        }
        echo '</ul>';
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Enter username...">
    <input type="password" name="password" placeholder="Enter password...">
    <input type="submit" value="Submit">
</form>
