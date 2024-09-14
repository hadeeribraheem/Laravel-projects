<?php

namespace App\Actions;

use App\Models\languages;
use Illuminate\Support\Str;

class HandleRulesValidation
{
    public static function handle($basic, $data)
    {
        /*$langs = languages::query()->select('prefix')
            ->get()->map(function ($e){
                return $e->prefix;
            });*/

        $langs = languages::query()->pluck('prefix'); // [ar, en]
        $basic = [];

        foreach($langs as $lang){
            foreach($data as $item){ // [name, info]
                // Extract the part before the colon (e.g., 'name' from 'name:required')
                $name = Str::before($item, ':'); // Extract name

                // Extract the part after the colon (e.g., 'required' from 'name:required')
                $validation = Str::after($item, ':'); // Extract required/nullable

                $basic[$lang . '_' . $name] = $validation;
            }
        }

        // name, info, user_id
        return $basic;
    }
}
