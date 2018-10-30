<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 8:34
 */

namespace App\View;


class View
{
    /**
     * Render template
     *
     * @param string $template
     * @param array $variables
     * @return bool
     * @throws \Exception
     */
    public function render(string $template, array $variables = []): bool
    {
        $file = __DIR__ . '/../../resources/' . $template . '.php';

        if(! is_readable($file)) {
            throw new \Exception("Template '$file' does not found.");
        }

        extract($variables, EXTR_OVERWRITE);

        require $file;

        return true;
    }
}