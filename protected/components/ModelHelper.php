<?php

trait ModelHelper
{
    public function __toString()
    {
        return get_class($this) . ':' .$this->id;
    }
}