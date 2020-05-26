<?php

namespace CommonFormats\Rules;

use Illuminate\Contracts\Validation\Rule;

class Postalcode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Determine if the validation rule passes.
     *
     * A Canadian postal code is a six-character string that forms part of a postal address in Canada.
     * A valid canadian postcode is –
     *   in the format A1A 1A1, where A is a letter and 1 is a digit.
     *   a space separates the third and fourth characters.
     *   do not include the letters D, F, I, O, Q or U.
     *   the first position does not make use of the letters W or Z.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        $pattern = '/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z][\ \-]?[0-9][A-Z][0-9]$/';
        preg_match($pattern, strtoupper($value), $matches);
        
        return count($matches);
    }
    
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid postal code.';
    }
}
