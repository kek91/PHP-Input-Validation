# PHP Input Validation

Easy to use PHP class for validating user input from HTML form input fields or anywhere else you may use it.

Please note this is only `validation`, for critical operations you may need to consider `sanitizing` before submitting user data to DB etc. I assume you're already well aware of the dangers.

### Features

- Whitelist: if input should ONLY contain one of these words
- Blacklist: if input should NOT contain one of these words
- Custom error messages for each input field
- Lightweight and fast
- Validate different types of input:
 - Verify valid email address
 - Alphabetic only
 - Numeric only
 - ++

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
