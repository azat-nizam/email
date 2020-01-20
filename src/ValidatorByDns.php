<?php
namespace Azatnizam\Email;

class ValidatorByDns implements IValidator {

    /**
     * @param string $email
     * @return bool
     * Extract domain from email and check it MX record
     */
    public function validate(string $email) {
        $arValidate = explode('@', $email);

        if ( count($arValidate) < 2 ) {
            return false;
        }

        return getmxrr($arValidate[1], $arMXHosts);
    }

}
