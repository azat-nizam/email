<?php
namespace Azatnizam\Email;

class ValidatorByStr implements IValidator {

    public function validate(string $email) {
        return preg_match('/.+@.+\..+/i', $email);
    }

}
