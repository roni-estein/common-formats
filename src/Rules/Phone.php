<?php

namespace CommonFormats\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
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
    * @param  string $attribute
    * @param  mixed $value
    * @return bool
    */
   public function passes($attribute, $value)
   {
      $value = preg_replace('/\D/', '', $value);
      $pattern = '~^\(?([2-9][0-9]{2})\)?([2-9](?!11)[0-9]{2})([0-9]{4})$~';

      $passes = preg_match($pattern, $value);
//       dd($passes);
      return $passes;
   }

   /**
    * Get the validation error message.
    *
    * @return string
    */
   public function message()
   {
      return 'The :attribute must be a valid phone number.';
   }

   public function redirectAfterCreation()
   {


      //appointment->open_wpounds or appointment->with_koban
         //NO: appointment->has_rx =>
            //YES: book date
            //NO: verify_physician
         //YES:
   }
}
