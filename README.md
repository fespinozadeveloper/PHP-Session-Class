# PHP-Session-Class

Simple PHP Session Class ($_SESSION)

##Usage

  include "session.class.php";
  
  $instance = Session::getInstance();
  
  $instance->hello = "Hello Word";
  
##Functions

### getInstance()

  $instance = Session::getInstance();

### startSession()

  $instance->startSession();
  
### isset()

  if(isset($instance->hello))
    echo $instance->hello;
  
### unset()

  unset($instance->hello);

  if(isset($instance->hello))
    echo $instance->hello;
  else
    echo 'unset var hello';

### destroy()

  $instance->destroy();
  
### restart()

  $instance->restart();
  
### reset()

  $instance->reset();

##Credits

Based on the example of [linblow@hotmail.fr](mailto:linblow@hotmail.fr) in [http://php.net/manual/en/function.session-start.php#102460](http://php.net/manual/en/function.session-start.php#102460)

Copyright (c) 2016, [fespinozadeveloper](https://github.com/fespinozadeveloper)
