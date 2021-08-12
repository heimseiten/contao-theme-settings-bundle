<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

PaletteManipulator::create()
    ->addLegend('layoutSettingsLegend', 'title_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('primaryColor', 'layoutSettingsLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('secondaryColor', 'layoutSettingsLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('fontSize', 'layoutSettingsLegend', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_theme');


$GLOBALS['TL_DCA']['tl_theme']['fields']['primaryColor'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_theme']['primaryColor'],
    'inputType' => 'text',
    'eval'      => array('maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_theme']['fields']['secondaryColor'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_theme']['secondaryColor'],
    'inputType' => 'text',
    'eval'      => array('maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
    'sql'       => "text NULL"
];
    
$GLOBALS['TL_DCA']['tl_theme']['fields']['fontSize'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_theme']['fontSize'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];
