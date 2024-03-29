<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Models\Order;

class ValidOrder implements Rule
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

        // il vaue è l'id del ordine

        if (Order::find($value)) {
            return true;
        } else {
            return false;
        };
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ordine non trovato';
    }
}
