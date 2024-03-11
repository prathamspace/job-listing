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
function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.php");
    if (file_exists($viewPath)) {
        extract($data);
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
    $partialPath = basePath("App/views/partials/{$name}.php");
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial <strong><i>'{$partialPath}'</i></strong> doesn't exist";
    }
}


/**
 * Inspect a value
 *
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}


/**
 * Inspect a value and die
 *
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
    echo "<pre>";
    die(var_dump($value));

}