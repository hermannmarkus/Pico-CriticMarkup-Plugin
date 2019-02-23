<?php
/**
 * CriticMarkup Plugin
 *
 * Renders CriticMarkup to HTML
 *
 * @author  Markus Hermann
 * @link    https://github.com/hermannmarkus/Pico-CriticMarkup-Plugin
 * @license http://opensource.org/licenses/MIT The MIT License
 * @version 1.0
 */

class CriticMarkup extends AbstractPicoPlugin {
    /**
     * API version used by this plugin
     *
     * @var int
     */
    const API_VERSION = 2;

    /**
     * Triggered after Pico has prepared the raw file contents for parsing
     *
     * @see DummyPlugin::onContentParsing()
     * @see Pico::parseFileContent()
     * @see DummyPlugin::onContentParsed()
     *
     * @param string &$markdown Markdown contents of the requested page
     *
     * @return void
     */
    public function onContentPrepared(&$markdown) {
        $markdown = preg_replace('/(\{\+\+)(.*)(\+\+\})/m', '<ins>\2</ins>', $markdown);
        $markdown = preg_replace('/(\{\-\-)(.*)(\-\-\})/m', '<del>\2</del>', $markdown);
        $markdown = preg_replace('/(\{>>)(.*)(<<\})/m', '<span class="critic comment">\2</span>', $markdown);
        $markdown = preg_replace('/(\{~~)(.*)(~>)(.*)(~~\})/m', '<del>\2</del><ins>\4</ins>', $markdown);
    }
}