<?php

/**
 * Get the Base Path
 *
 * @param string $path
 * @return string
 */
function basePath($path = ' ')
{
    return __DIR__ . '/' . $path;
}


/**
 * Load a view
 *
 * @param string $name
 * @return void
 */
function loadView($name)
{
    $viewPath = basePath("views/{$name}.php");


    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo "View <strong><i>'{$viewPath}'</i></strong> doesn't exist";
    }

}


/**
 * Load a Partial
 *
 * @param string $name
 * @return void
 */
function loadPartial($name)
{
    $partialPath = basePath("views/partials/{$name}.php");
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial <strong><i>'{$partialPath}'</i></strong> doesn't exist";
    }
}