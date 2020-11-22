<?php

/**
 * Genero el menu lateral y devuelvo todo en una variable ($html) al controller para que lo grabe en un archivo html
 */

namespace app\helpers;

class menus_helper
{
    private function getHtmlMenu($array)
    {
        $html = "<ul class=\" menu-list \">";
        foreach ($array as $menu) {
            if (array_key_exists('Hijos', $menu)) {
                $html .= "<li><a href=\" index.php?c=" . $menu['Padre']['controller'] . "&a=" . $menu['Padre']['action'] . "&p=" . $menu['Padre']['params'] . " \">" . $menu['Padre']['nombre'] . "</a>" . $this->getHtmlMenu($menu['Hijos']) . "</li>";
            } else {
                $html .= "<li><a href=\" index.php?c=" . $menu['controller'] . "&a=" . $menu['action'] . "&p=" . $menu['params'] . " \">" . $menu['nombre'] . "</a></li>";
            }
        }
        $html .= "</ul>";
        return $html;
    }

    public function getMenu($array)
    {
        $html = "<aside class=\"menu is-hidden-mobile\" id=\"menu_lateral\">";
        $html .= $this->getHtmlMenu($array);
        $html .= "</aside>";
        return $html;
    }
}
