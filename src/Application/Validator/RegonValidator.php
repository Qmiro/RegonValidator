<?php

/**
 * @name RegonValidator
 * @package Validator
 * @version 1.3.0
 * @author Miroslaw Kukuryka
 * @copyright (c) 2023 (https://www.appsonline.eu)
 * @link https://www.appsonline.eu
 */
declare(strict_types = 1);
namespace Application\Validator;

use Laminas\Validator\AbstractValidator;

final class RegonValidator extends AbstractValidator
{

    /**
     *
     * @var string
     */
    private const REGON_NOT_SCALAR = 'regonNotScalar';
    
    /**
     *
     * @var string
     */
    private const REGON_CHARSET = 'regonCharset';
    
    /**
     *
     * @var string
     */
    private const REGON_CORECT = 'regonCorect';

    /**
     *
     * @var array
     */
    protected $messageTemplates = [
        self::REGON_NOT_SCALAR => 'The REGON number must be a scalar value',
        self::REGON_CHARSET => 'Only numbers are allowed in the REGON number',
        self::REGON_CORECT => 'The entered REGON number is incorrect'
    ];

    /**
     *
     * @name isValid
     * @access public
     * @param string $value
     * @see \Laminas\Validator\ValidatorInterface::isValid()
     */
    public function isValid($value): bool
    {
        if (! is_scalar($value)) {
            $this->error(self::REGON_NOT_SCALAR);
            return false;
        }
        
        if (is_int($value) !== true) {
            $this->_error(self::REGON_CHARSET);
            return false;
        } else {
            
            $tab = [
                8,
                9,
                2,
                3,
                4,
                5,
                6,
                7
            ];
            $index = [
                0,
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8
            ];
            
            $sum = 0;
            for ($i = 0; $i < 8; $i ++) {
                $sum += substr((string) $value, $index[$i], 1) * $tab[$i];
            }
            
            $sum = ($sum % 11);
            if ($sum !== (int) substr((string) $value, 8, 1) ) {
                $this->error(self::REGON_CORECT);
                return false;
            }
            
        }
        
        return true;
    }
}