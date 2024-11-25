<?php

trait Singleton_Trait {

     /**
     * Get property as defined in class
     * 
     * @return mixed
     */
    private function get_property($prop_name) {
        return $this->$prop_name;
    }


    /**
     * Instance of the object.
     * @static
     * @access public
     * @var null|object
     */
    public static $instance = null;


    /**
     * Access the single instance of this class.
     * @return Class
     */
    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    /**
     * Initialize the init
     * @return void
     */
    abstract public function init();
}
