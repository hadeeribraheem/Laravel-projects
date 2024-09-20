<?php

namespace App\Actions;

use App\Models\languages;
use Illuminate\Support\Str;

class HandleDataBeforeSaveAction
{
    public static function handle($data)
    {
        /*
        * name = [
        *    'ar' => '',
        *    'en' => ''
        * ]
        * output[name]
        */

        $languages = languages::query()->pluck('prefix'); // ['ar', 'en']

        //$data['price']=100;
        $output = [];

        // Loop through the provided data
        foreach($data as $key => $value) { // e.g., ar_name , en_name

            $lang_exist_in_input = 0; //flag check if input has lang

            foreach($languages as $language) { // Loop through languages (e.g., 'ar', 'en')

                // Check if the key contains the language (e.g., ar_name)
                if (Str::contains($key, $language.'_')) {

                    // Replace language part and store in input_name
                    $input_name = Str::replace($language, '', $key); // Replace 'ar_name' with '_name'

                    // Further replace and clean the input name to extract the actual field
                    $input_name = Str::replace( '_', '', $input_name); // Replace '_name' with 'name'

                    // Store in the output array the corresponding language-specific value
                    $output[$input_name][$language] = $value; // Output will store like ['name']['ar'] = value

                    $lang_exist_in_input = 1;
                }
            }
            if($lang_exist_in_input == 0) {
                $output[$key] = $value;
            }
        }
        //dd( $output);

        foreach($output as $key => $value) {
            if(is_array($value)) {

                $output[$key] = json_encode($value, flags: JSON_UNESCAPED_UNICODE);

            }
        }
    return $output;
    }
}
