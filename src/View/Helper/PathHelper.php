<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

/**
 * Path helper
 */
class PathHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = []; // Assurez-vous que $_defaultConfig est un tableau sans typage incorrect.

    /**
     * Get the base URL of the application.
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return "http://" . $_SERVER["HTTP_HOST"] . "/e_commerce/";
    }

    /**
     * Get the template path URL.
     *
     * @return string
     */
    public function getTemplatePath(): string
    {
        return $this->getBaseUrl() . "template/";
    }
}
