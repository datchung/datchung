<?php

class MainTemplate {
      public static function render($f3, $filePath) {
        $pageContent = json_decode(file_get_contents('./' . $filePath, FILE_USE_INCLUDE_PATH), true);
        $f3->set('pageContent', $pageContent);

        $UI_PATH = $f3->get('UI_PATH');
        $CONTENT_PATH = $f3->get('CONTENT_PATH');
        $f3->set('contentPath', $CONTENT_PATH);
        $f3->set('submenu', $UI_PATH . 'sub-menu.html');
        $f3->set('sections', $UI_PATH . 'sections.html');
        $f3->set('year', date('Y'));
        echo Template::instance()->render($UI_PATH . 'template.html');
      }
}