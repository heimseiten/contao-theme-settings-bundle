<?php

declare(strict_types=1);

namespace Heimseiten\ContaoThemeSettingsBundle\Listener;

use Contao\FrontendTemplate;
use Contao\Template;
use Contao\Module;

use Contao\ContentModel;
use Contao\Widget;

class HooksListener
{
    public function onParseTemplate(Template $template): void
    {
        
        if (TL_MODE == 'FE' && 'fe_page' === $template->getName()) {
            global $objPage;
            if ($GLOBALS['objPage']->layoutId) {
                $tl_layout = \Database::getInstance()->query("SELECT id, pid FROM `tl_layout` WHERE id =". $GLOBALS['objPage']->layoutId ." ;")->fetchAllAssoc();
                if (count($tl_layout) >= 1) {
                    $theme_id = $tl_layout[0]['pid'];
                }
                if ($theme_id) {
                    $tl_theme = \Database::getInstance()->query("SELECT id, primaryColor, secondaryColor, fontSize FROM `tl_theme` WHERE id =". $theme_id ." ;")->fetchAllAssoc();
                    if (count($tl_layout) >= 1) {
                        $primary_color = $tl_theme[0]['primaryColor'];
                        $secondary_color = $tl_theme[0]['secondaryColor'];
                        $font_size = $tl_theme[0]['fontSize'];
                    }
                }
            }
            $settings = '';
            
            if ($primary_color) {
                $settings .= '--primary_color: #' . $primary_color . ';';
            }
            if ($secondary_color) {
                $settings .= '--secondary_color: #' . $secondary_color . ';';
            }
            if ($font_size) {
                $settings .= '--font_size: ' . $font_size . ';';
            }
            
            if ($settings) {
                $template->stylesheets = '<style> body { '. $settings . '; } </style>' . $template->stylesheets;
            }
        }
    }

}
