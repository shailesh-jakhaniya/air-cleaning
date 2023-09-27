<?php

if (!function_exists('includeRouteFiles')) {

    /**
     * @param $folder
     * @since 09-26-2023
     *
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @author Shailesh Jakhaniya
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory . $filename)) {
                array_push($directory_list, $directory . $filename . '/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory . '*.php') as $filename) {
                require $filename;
            }
        }
    }
}
