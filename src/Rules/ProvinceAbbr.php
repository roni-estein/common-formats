<?php

namespace CommonFormats\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProvinceAbbr implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array(strtoupper($value),['AB','BC','MB','NB','NL','NS','NT','NU','ON','PE','QC','SK','YT']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a 2 letter province abbreviation.';
    }
}
