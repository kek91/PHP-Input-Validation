# PHP Input Validation

Easy to use PHP class for validating user input from HTML form input fields or anywhere else you may use it.

Please note this is only `validation`, for critical operations you may need to consider `sanitizing` before submitting user data to DB etc. I assume you're already well aware of the dangers.

### Usage example

**HTML form**
```
<form>
    <input type="text" name="email">
    <input type="submit">
</form>
```
**PHP processing**
```
$validate = new Validate();
$validation = $validate->check($_POST, array(
    'email' => array(
        'required' => true,
        'mailcheck' => true
    )
));

if($validation->passed()) {
    echo 'Validation passed!';
}
else {
    echo 'Validation errors:';
    echo '<ul>';
    foreach($validation->errors() as $error)
    {
        echo '<li>'.ucfirst($error).'</li>';
    }
    echo '</ul>';
}
```
