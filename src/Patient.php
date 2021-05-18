<?php
namespace Patient;

class Patient
{
    public string $name;
    public int $code;
    public $next;

    /**
     * Patient constructor.
     */
    public function __construct(string $name, int $code)
    {
        $this->name = $name;
        $this->code = $code;
        $this->next = null;
    }

    public function __toString(): string
    {
        return "Name: " . $this->name . " , Code: " . $this->code;
    }


}