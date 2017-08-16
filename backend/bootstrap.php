<?php

namespace backend;

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/back_core/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/controller.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/back_core/route.php';
Route::start();
