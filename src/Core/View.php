<?php


namespace App\Core;


class View
{
    /**
     *
     * @param string $content_view файл с контентом
     * @param string|null $template_view Шаблон вывода, если null вывод произойдет без шаблона
     * @param array|null $data данные для передачи в шаблон, разложится в переменные
     */
    function generate($content_view, $template_view = null, $data = null)
    {
        if ($data !== null) {
            extract($data);
        }
        if ($template_view === null) {
            include dirname(__FILE__)."/../views/$content_view";
        } else {
            include dirname(__FILE__)."/../views/layouts/$template_view";
        }

    }
}