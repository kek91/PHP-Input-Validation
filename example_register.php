<?php
if(!empty($_POST)) {
    require("Validate.php");
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username' => array(
            'required' => true,
            'length_min' => 3,
            'length_max' => 20,
            'alphabetic' => true,
            'blacklist' => array(
                'administrator',
                'root',
                'tux')
        ),
        'pw_1' => array('required' => true, 'length_min' => 8),
        'pw_2' => array('required' => true, 'matches' => 'pw_1'),
        'firstname' => array('required' => true, 'alphabetic' => true, 'length_max' => 30),
        'lastname' => array('required' => true, 'alphabetic' => true, 'length_max' => 20),
        'telephone' => array('required' => true, 'numeric' => true, 'length_max' => 15),
        'email' => array('required' => true, 'mailcheck' => true)
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
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="pw_1" placeholder="Password"><br>
    <input type="password" name="pw_2" placeholder="Confirm password"><br>
    <input type="text" name="firstname" placeholder="Firstname"><br>
    <input type="text" name="lastname" placeholder="Lastname"><br>
    <input type="text" name="telephone" placeholder="Telephone"><br>
    <input type="text" name="email" placeholder="email"><br>
    <input type="submit" value="Submit">
</form>
