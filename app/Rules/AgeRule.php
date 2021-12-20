<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class AgeRule implements Rule
{
    protected $defaultAge;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $defaultAge)
    {
        $this->defaultAge = $defaultAge;
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
        return (Carbon::now()->format('Y') - Carbon::parse($value)->format('Y')) >= $this->defaultAge;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.custom.age.invalid');
    }
}
