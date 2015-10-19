<?php
class Validate
{
    private $_passed = false,
            $_errors = array();

    public function check($source, $items = array())
    {
        foreach($items as $item => $rules)
        {
            $value = htmlspecialchars(trim($source[$item]), ENT_QUOTES, 'UTF-8');
            foreach($rules as $rule => $rule_value)
            {
                switch($rule)
                {
                    case 'required':
                        if(empty($value)) {
                            $this->add_error("<b>{$item}</b> is required.");
                        }
                        break;
                    case 'length_min':
                        if(strlen($value) < $rule_value) {
                            $this->add_error("<b>{$item}</b> must contain minimum <b>{$rule_value}</b> characters.");
                        }
                        break;
                    case 'length_max':
                        if(strlen($value) > $rule_value) {
                            $this->add_error("<b>{$item}</b> can't contain more than <b>{$rule_value}</b> characters.");
                        }
                        break;
                    case 'matches':
                        if($value != htmlspecialchars(trim($source[$rule_value]), ENT_QUOETS, 'UTF-8')) {
                            $this->add_error("<b>{$rule_value}</b> must match <b>{$item}</b>.");
                        }
                        break;
                    case 'mailcheck':
                        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->add_error("<b>{$value}</b> is not a valid email address.");
                        }
                        break;
                    case 'numeric':
                        if(!ctype_digit($value)) {
                            $this->add_error("<b>{$item}</b> contains illegal characters. Only numbers 0-9 are allowed.");
                        }
                        break;
                    case 'alphabetic':
                        if (!ctype_alpha(str_replace(array(' ', "'", '-'), '', $value))) {
                            $this->add_error("<b>{$item}</b> contains illegal characters. Only alphabetic letters A-Z, \"'\", \" \" and \"-\" are allowed.");
                        }
                        break;
                    case 'alphanumeric':
                        if(!ctype_alnum($value)) {
                            $this->add_error("<b>{$item}</b> contains illegal characters. Only alphabetic and numeric characters (A-Z and 0-9) are allowed.");
                        }
                        break;
                    case 'blacklist':
                        foreach($rule_value as $blocked_word) {
                            if($value == $blocked_word) {
                                $this->add_error("<b>{$value}</b> is blocked");
                            }
                        }
                        break;
                }
            }
        }
        if(empty($this->_errors))
        {
            $this->_passed = true;
        }
        return $this;
    }

    private function add_error($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}
