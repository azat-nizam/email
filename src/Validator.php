<?php
namespace Azatnizam\Email;

class Validator {

    public function validate(string $email) {
        return $this->validateByString($email) && $this->validateByDns($email);
    }

    protected function validateByString(string $email) {
        return preg_match('/.+@.+\..+/i', $email);
    }

    /**
     * @param string $email
     * @return bool
     * Extract domain from email and check it MX record
     */
    protected function validateByDns(string $email) {
        $arValidate = explode('@', $email);

        if ( count($arValidate) < 2 ) {
            return false;
        }

        return getmxrr($arValidate[1], $arMXHosts);
    }

}
