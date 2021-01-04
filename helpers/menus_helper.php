<?php

/**
 * Genero el menu lateral y devuelvo todo en una variable ($html) al controller 
 * para que lo grabe en un archivo html para importarlo directamente en el template
 * Estos menus se usarán constantemente, con esto evito una consulta la base de datos.
 */

namespace app\helpers;

class menus_helper
{
    /** Obtengo una lista desordenada en html */
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

    /** Ubico la lista ul en un menu lateral */
    public function getMenu($array)
    {
        $html = "<aside class=\"menu is-hidden-mobile\" id=\"menu_lateral\">";
        $html .= $this->getHtmlMenu($array);
        $html .= "</aside>";
        return $html;
    }
}
