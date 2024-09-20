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
       // $basic = [];

        foreach($langs as $lang){
            foreach($data as $item){ // [name, info]
                $name = Str::before($item, ':'); // Extract name

                $validation = Str::after($item, ':');

                $basic[$lang . '_' . $name] = $validation;
            }
        }
      //  dd($basic);
        // name, info, user_id
        //dd($basic);
        return $basic;
    }
}
