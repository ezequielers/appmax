<?php

namespace App\Helpers;

class SkuHelper
{
    /**
     * Generate SKU randomly
     *
     * @return string
     */
    public static function generateSKU()
    {
        $faker = \Faker\Factory::create();
        $alpha = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',
            'T', 'U', 'V', 'X', 'Y', 'Z', 'W');
        $prefix = $faker->randomElements($alpha, 5, true);
        return implode($prefix) . '-' . rand(1000000000, 9999999999);
    }
}
