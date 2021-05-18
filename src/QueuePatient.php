<?php
namespace Patient;
use JetBrains\PhpStorm\Pure;

include_once "../vendor/autoload.php";

class QueuePatient
{
    public $head = null;

    public function isEmpty(): bool
    {
        return is_null($this->head);
    }

    public function enqueue($name, $code)
    {
        $precedence=$this->head;
        $current = $this->head;
        $patient = new Patient($name, $code);
        if ($this->isEmpty()) {
            $this->head = $patient;
        } else {
            if ($patient->code < $this->head->code) {
                $patient->next = $this->head;
                $this->head = $patient;
            } else {
                while ($current->next != null && $patient->code >= $current->code) {
                    $precedence=$current;
                    $current = $precedence->next;
                }
                if ($patient->code > $current->code) {
                    $patient->next = $current->next;
                    $current->next = $patient;
                }else{
                    $patient->next = $precedence->next;
                    $precedence->next = $patient;
                }
            }
        }
    }

    public function dequeue()
    {
        if($this->isEmpty()){
            return null;
        }
        $removedPatient= $this->head;
        $this->head=$this->head->next;
        return $removedPatient;
    }

    #[Pure] public function getData(): ?array
    {
        if ($this->isEmpty()){
            return null;
        }
        $current = $this->head;
        $currentData = [];
        while ($current !== null ){
            $currentName = $current->name;
            $currentCode = $current->code;
            $current = $current->next;
            $currentData[$currentName] = $currentCode;
        }
        return $currentData;
    }
}
