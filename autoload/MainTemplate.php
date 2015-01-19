<?php

class MainTemplate {
      public static function setup($f3, $submenuItems, $submenuOffset, $content) {
        $UI_PATH = $f3->get('UI_PATH');

        $f3->set('submenuItems', $submenuItems);

        $f3->set('submenuOffset', $submenuOffset);
        $f3->set('submenu', $UI_PATH . 'sub-menu.html');
        $f3->set('content', $UI_PATH . $content);
      }
}