<?php

/**
 * @filesource example-RegonValidator.php
 * 
 * Message templates
 * regonNotScalar - Numer REGON musi być wartością skalarną
 * regonCharset - W numerze REGON dozwolone są tylko cyfry
 * regonCorect - Podany numer REGON jest nieprawidłowy
 */
declare(strict_types = 1);
use Application\Validator\RegonValidator;

include __DIR__ . '/vendor/autoload.php';

$numerRegon = 260903456;

$validator = new RegonValidator();

if ($validator->isValid($numerRegon) !== false) {
    echo 'Podany numer REGON jest prawidłowy!<br/>';
} else {
    echo 'Podany numer REGON jest nie prawidłowy!<br/>';
    $messages = $validator->getMessages();
    foreach ($messages as $key => $value) {
        echo $key . ' => ' . $value . '<br/>';
    }
}