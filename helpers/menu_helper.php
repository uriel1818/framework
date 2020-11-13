<?php

namespace app\helpers;

class menu_helper
{
    public function getHtmlMenu($array)
    {
        $html = "<ul class=\"menu-list\">";
        
        foreach ($array as $menu) {
            if (array_key_exists('Hijos', $menu)) {
                $html .= "<li><a>" . $menu['Padre']['nombre'] . " " . $menu['Padre']['id'] . "</a>" . $this->getHtmlMenu($menu['Hijos']) . "</li>";
            } else {
                $html .= "<li><a>" . $menu['nombre'] . " " . $menu['id'] . "</a></li>";
            }
        }
        $html .= "</ul>";
       
        return $html;
    }
    public function getMenu($array){
       $html = "<aside class=\"menu\">";
       $html.= $this->getHtmlMenu($array);
       $html.= "</aside>";
       return $html;
    }
}
