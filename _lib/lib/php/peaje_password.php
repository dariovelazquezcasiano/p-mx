<?php

if (!function_exists('peaje_password_hash')) {
    function peaje_password_hash($plain)
    {
        return password_hash((string) $plain, PASSWORD_DEFAULT);
    }
}

if (!function_exists('peaje_password_is_legacy_md5')) {
    function peaje_password_is_legacy_md5($stored)
    {
        return is_string($stored) && preg_match('/^[a-f0-9]{32}$/i', $stored);
    }
}

if (!function_exists('peaje_password_verify')) {
    function peaje_password_verify($plain, $stored)
    {
        $stored = (string) $stored;

        if (peaje_password_is_legacy_md5($stored)) {
            return hash_equals(strtolower($stored), md5((string) $plain));
        }

        $info = password_get_info($stored);
        if (!empty($info['algo'])) {
            return password_verify((string) $plain, $stored);
        }

        return false;
    }
}

if (!function_exists('peaje_password_needs_rehash')) {
    function peaje_password_needs_rehash($stored)
    {
        $stored = (string) $stored;

        if (peaje_password_is_legacy_md5($stored)) {
            return true;
        }

        $info = password_get_info($stored);
        return !empty($info['algo']) && password_needs_rehash($stored, PASSWORD_DEFAULT);
    }
}
