<?php

function factoryMethod($class, $method, $attributes = [], $times = null)
{
    return factory($class, $times)->$method($attributes);
}

function create($class, $attributes = [], $times = null)
{
    return factoryMethod($class, 'create', $attributes, $times);
}

function make($class, $attributes = [], $times = null)
{
    return factoryMethod($class, 'make', $attributes, $times);
}