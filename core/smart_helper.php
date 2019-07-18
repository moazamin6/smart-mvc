<?php


function extractNamespace($file)
{
    $ns = NULL;
    $handle = fopen($file, "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            if (strpos($line, 'namespace') === 0) {
                $parts = explode(' ', $line);
                $ns = rtrim(trim($parts[1]), ';');
                break;
            }
        }
        fclose($handle);
    }
    return $ns;
}

function researchFile($folder, $pattern)
{
    $iti = new RecursiveDirectoryIterator($folder);
    foreach (new RecursiveIteratorIterator($iti) as $file) {
        if (strpos($file, $pattern) !== false) {
            return $file;
        }
    }
    return false;
}