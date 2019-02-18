<?php
  require "Component.php";

  echo Component::get("text", [
    "value" => "This is the default component."
  ]);
  /* Basic usage. */

  echo Component::get("text", [
    "value" => "You can use other states as well."
  ], "bold");
  /* Using states. */

  echo Component::get("text", [
    "target" => "_blank",
    "link" => "http://google.com",
    "value" => "You can specify the directory too."
  ], [
    "state" => "link",
    "dir" => "component/"
  ]);
  /* Complex structure. */
?>
