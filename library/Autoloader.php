<?php

/**
 * Autoloader.
 */
class Autoloader
{
    protected $_basepath;

    /**
     * Constructor. Register autoloader.
     */
    public function __construct($basepath)
    {
        $this->_basepath = $basepath;

        spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * Autoload method.
     *
     * @param string $class
     */
    public function autoload($class)
    {
        // Autodiscover the path from the class name.
        $file = $this->_basepath . 'library/' . str_replace('_', '/', $class) . '.php';

        if (is_file($file)) {
            include $file;

            if (class_exists($class, false) || interface_exists($class, false)) {
                return true;
            }
        }

        echo '<pre>Failed autoloading ' . $class . "\n";
        debug_print_backtrace();
        die;

        # eval('class ' . $class . ' extends Exception{}');

        # throw new Exception('Library "' . $class . '" not found at "' . $file. '"');
        # eval('class ' . $class . ' extends Exception{}');
        # throw new Exception('Class "' . $class . '" was not found inside file "' . $file . '"');
    }
}