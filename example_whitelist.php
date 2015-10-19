<?php
if(!empty($_POST)) {
    require("Validate.php");
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'code' => array(
            'required' => true,
            'whitelist' => array(
                'asd9i0', 'sd90ada', 'djasdj9a8', 'adk90k292kd', 'asdoakd3', '93nassd', '9fsjfd',
                '30dkas', 'asd09', 'xcv877', 'a9s0dzx', 'asd90jm', 'a9s0dz', 'olkm9a', 'a09sdj')
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
    Enter code:
    <input type="text" name="code">
    <input type="submit" value="Submit">
</form>
