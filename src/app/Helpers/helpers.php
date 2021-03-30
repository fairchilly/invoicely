<?php

if (! function_exists('parseJsonDate')) {
    function parseJsonDate($timestring, $convertToUTC = false, $format = 'd-m-Y H:i:s') {

        if (empty(trim($timestring))) {
            return null;
        }

        $date = \Carbon\Carbon::parse(date_create_from_format('D M d Y H:i:s e+', $timestring));

        if ($convertToUTC) {
            $date->tz('UTC');
        }

        return $date->format($format);
    }
}

if (! function_exists('parseOrNull')) {
    function parseOrNull($array, $key) {
        return array_key_exists($key, $array) ? $array[$key] : null;
    }
}

if (! function_exists('formatCurrency')) {
    function formatCurrency($amount) {
        return '$' . number_format($amount / 100, 2);
    }
}