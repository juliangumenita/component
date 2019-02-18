<?php
  class Component{
    private static $options = [
      "state" => "default",
      "dir" => "component/",
      "slug" => ".html"
    ];

    private static function options($options){
      if(is_array($options)){
        return [
          "state" =>
            (array_key_exists("state", $options))
            ? $options["state"]
            : self::$options["state"],
          "dir" =>
            (array_key_exists("dir", $options))
            ? $options["dir"]
            : self::$options["dir"],
          "slug" =>
            (array_key_exists("slug", $options))
            ? $options["slug"]
            : self::$options["slug"]
        ];
      } else {
        return [
          "state" => $options,
          "dir" => self::$options["dir"],
          "slug" => self::$options["slug"]
        ];
      }
    }

    private static function between($string, $start, $end){
      $string = " " . $string;
      $ini = strpos($string, $start);
      if($ini == 0){
        return null;
      }
      $ini += strlen($start);
      $len = strpos($string, $end, $ini) - $ini;
      return substr($string, $ini, $len);
      /*
      * Get a string
      * between two values.
      */
    }
    public static function get($name, $parameters = [], $options = "default"){
      $options = self::options($options);
      $file = @file_get_contents($options["dir"] . $name . $options["slug"]);
      /* Getting the contents. */
      $component = self::between($file, "@{$options["state"]}", "{$options["state"]}@");
      /* Getting the state. */
      foreach ($parameters as $key => $param) {
        $component = str_replace("{{$key}}", $param, $component);
      }
      /* Replacing all of the parameters. */
      $component = preg_replace("/{[\s\S]+?}/", null, $component);
      /* Cleaning all unused parameters. */
      return $component;
    }
  }
?>
