<?php

if ($handle = opendir('.')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

            echo "<p>$entry</p>\n";
        }
    }

    closedir($handle);
}