<?php
namespace Azatnizam\Email;

class Validator {
    /**
     * Validate email by all rules defined in config
     * @param string $email
     * @return bool
     */
    public function validateAll(string $email) {
        /** If validator undefined */
        $status = null;

        $arValidators = $this->getValidatorsList();

        /** Initial value */
        if ( count($arValidators) > 0 ) {
            $status = true;
        }

        foreach ($arValidators as $validator) {
            $objValidator = new $validator;

            if ($objValidator instanceof IValidator) {
               $status =  $status && $objValidator->validate($email);
            }
        }

        return $status;
    }

    /**
     * Return array of validators Class names
     * @return mixed
     */
    protected function getValidatorsList() {
        $config = file_get_contents(dirname(__DIR__) . '/config.json');

        return json_decode($config)->validators;
    }

}
