<?php
/**
 * MarkupsPlugin.class.php
 *
 * Integrates the following markups:
 *
 * - Markdown
 * - Textile
 *
 * @author  Jan-Hendrik Willms <tleilax+studip@gmail.com>
 * @version 1.0.1
 */

class MarkupsPlugin extends StudIPPlugin implements SystemPlugin {

    public function __construct() {
        parent::__construct();
        StudipFormat::addStudipMarkup('markdown', '\[markdown\]', '\[\/markdown\]', 'MarkupsPlugin::Markdown');
        StudipFormat::addStudipMarkup('textile', '\[textile\]', '\[\/textile\]', 'MarkupsPlugin::Textile');
    }
    
    public static function Markdown($markup, $matches, $contents) {
        require 'vendor/markdown/markdown.php';
        
        return Markdown($contents);
    }

    public static function Textile($markup, $matches, $contents) {
        require 'vendor/classTextile.php';
        
        $textile = new Textile;
        return $textile->TextileThis($contents);
    }

}
