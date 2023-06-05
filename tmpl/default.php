<?php

// no direct access
/**
 * @module	RA Header
 * @author	Chris Vaughan
 * @copyright	Copyright (C) 2013 Chris Vaughan chris@cevsystems.co.uk All rights reserved.
 * @license	http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
// Add a reference to a CSS file
// The default path is 'media/system/css/'

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_myheader/css/myheaderstylesheet.css');
$background_style = $params->get('background_style');
if ($background_style == "") {
    $background_style = "part";
}

// Overall Div
$header = '';
$header .= '<div class="myheader ' . $background_style . ' ' . $moduleclass_sfx . '" >';
// Background image
$image = $params->get('horizon_image');
$h_height = $params->get('header_height');
$h_padding = $params->get('header_margin_top');
if ($h_padding == "") {
    $h_padding = "0";
}
if ($image != '') {
    $text = "div.myheader {background-image: url(" . JURI::base() . $image . "); padding-top:" . $h_padding . "px; height:" . $h_height . "px; }";
    $document->addStyleDeclaration($text);
}

// Logo
$limage = $params->get('logo_image');
if ($limage != '') {
    $width = $params->get('logo_width');
    $height = $params->get('logo_height');
    $url = $params->get('logo_url');
    $target = $params->get('logo_url_target');
    $logoMarginTop = $params->get('logo_margin_top');
    $header .= getMyheaderImage('myheader logo', $limage, $width, $height, $url, $target, $logoMarginTop);
    $text = "img.myheader.logo { height:" . $height . "px; }";
    $document->addStyleDeclaration($text);
}

// Title
$website_title = $params->get('website_title');
$title_color = $params->get('title_color');
if (trim($website_title) != '') {
    $header .= '<h1 class="myheader title" style="color:' . $title_color . '" >' . $website_title . '</h1>';
}
//SubTitle
$website_subtitle = $params->get('website_subtitle');
$subtitle_color = $params->get('subtitle_color');
if (trim($website_subtitle) != '') {
    $header .= '<h2 class="myheader subtitle" style="color:' . $subtitle_color . '" >' . $website_subtitle . '</h2>';
}
$header .= '</div>';
echo $header;

// end

function getMyheaderImage($class, $image, $width, $height, $url, $target, $logoMarginTop) {

    $text = "";
    if ($image != '') {
        $text .= '<img style="margin-top: ' . $logoMarginTop . 'px;" class="' . $class . '" alt="Image" src="' . $image . '" height="' . $height . 'px" width="' . $width . 'px" />';
        if ($url != '') {
            $text = '<a target="' . $target . '" href="' . $url . '">' . $text . '</a>';
        }
    }
    return $text;
}
