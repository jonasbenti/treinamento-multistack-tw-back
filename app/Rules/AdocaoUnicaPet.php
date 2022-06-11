<?php

namespace App\Rules;

use App\Models\Adocao;
use Illuminate\Contracts\Validation\Rule;

class AdocaoUnicaPet implements Rule
{
    /**
     * Id do pet
     *
     * @var integer
     */
    private int $petId;

    /**
     * mensagem de validacao do pet
     *
     * @var string
     */
    private $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($petId, $message = null)
    {
        $this->petId = $petId;
        $this->message = $message;
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
        $jaAdotou = Adocao::where('email', $value)
            ->where('pet_id', $this->petId)
            ->first();

        return !$jaAdotou;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message ?? 'você já adotou o pet como esse :attribute';
    }
}
