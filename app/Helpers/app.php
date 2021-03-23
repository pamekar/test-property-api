<?php

use Illuminate\Support\Facades\App;

function public_asset($path)
{
    $asset_base = App::environment('local') ? '' : 'public';

    return asset(str_replace('//', '/', "{$asset_base}/{$path}"));
}