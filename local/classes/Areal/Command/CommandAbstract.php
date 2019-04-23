<?php

namespace Areal\Command;

abstract class CommandAbstract
{
    private $error;

    public function execute(array $params = [])
    {
        $this->params = $params;
        if ($this->validate()) {
            return $this->executeImpl();
        }
        return false;
    }

    public function getError()
    {
        return $this->errors;
    }

    protected function setError($error)
    {
        $this->error = $error;
    }

    abstract protected function executeImpl();
    abstract protected function validate();
}
