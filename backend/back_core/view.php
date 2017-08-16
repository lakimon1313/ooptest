<?php

namespace backend;

class View
{
    function generate($content_view, $template_view, $data = null)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/backend/views/' . $template_view;
    }
}
