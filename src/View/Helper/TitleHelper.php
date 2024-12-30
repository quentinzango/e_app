<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

/**
 * Title helper
 */
class TitleHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    protected string $appName = "ZaqMarket";

    public function getTitle(?string $pageTitle = null, ?string $pageSubTitle = null): string
    {
        $title = "";

        if (!empty($pageTitle)) {
            $title .= $pageTitle;
        }

        if (!empty($pageSubTitle)) {
            $title .= (strlen($title) > 0 ? " - " : "") . $pageSubTitle;
        }

        $title .= (strlen($title) > 0 ? " - " : "") . $this->appName;
        return $title;
    }
}
