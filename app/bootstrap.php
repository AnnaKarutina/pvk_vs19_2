<?php
// laadime vajalikud raamatukogud
spl_autoload_register(function ($className) {
  require_once 'libraries/'.$className.'.php';
});
