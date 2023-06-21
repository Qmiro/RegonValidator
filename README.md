# RegonValidator
Weryfikacja numeru REGON

Walidator służący do weryfikacji numeru REGON obowiązujący na terenie Polski. Jest on rozszerzeniem dostępnych walidatorów dla <b>Laminas Framework</b> (dawniej <b>Zend Frameworok</b>).

Użycie walidatora

```php

<?php

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
```
 Message templates
 - regonNotScalar - Numer REGON musi być wartością skalarną
 - regonCharset - W numerze REGON dozwolone są tylko cyfry
 - regonCorect - Podany numer REGON jest nieprawidłowy
