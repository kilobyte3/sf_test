<?php
declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * contact
 */
final class Contact
{
    #[Assert\NotBlank(
        message: 'A név mezőt ki kell tölteni!'
    )]
    protected string $name;

    #[Assert\Email(
        message: 'Hiba! Kérjük e-mail címet adjál meg!',
    )]
    #[Assert\NotBlank(
        message: 'Az email mezőt ki kell tölteni!'
    )]
    protected string $email;

    #[Assert\NotBlank(
        message: 'Az üzenet mezőt ki kell tölteni!'
    )]
    protected string $message;

    /**
     * set name
     *
     * @param $v - value
     */
    public function setName(?string $v) : void
    {
        $this->name = (string)$v;
    }

    /**
     * get name
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * set email
     *
     * @param $v - value
     */
    public function setEmail(?string $v) : void
    {
        $this->email = (string)$v;
    }

    /**
     * get email
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * set message
     *
     * @param $v - value
     */
    public function setMessage(?string $v) : void
    {
        $this->message = (string)$v;
    }

    /**
     * get message
     */
    public function getMessage() : string
    {
        return $this->message;
    }
}