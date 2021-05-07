<?php

function available_locales()
{
    return config('app.available_locales');
}

function translations($json)
{
    if(!file_exists($json)) {
        return [];
    }

    return json_decode(file_get_contents($json), true);
}