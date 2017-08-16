<?php

namespace frontend;

class View
{
    function generate($content_view, $template_view, $data = null)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/frontend/views/' . $template_view;
    }
}
