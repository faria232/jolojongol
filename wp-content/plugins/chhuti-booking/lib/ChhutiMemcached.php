<?php

namespace Chhuti\Plugins\Booking;

if(class_exists('\Memcached')) {
  class ChhutiMemcached
  {
    /**
     * object of Memcached class
     * @var \Memcached
     */
    private $memcached;

    public function __construct()
    {
      // create memcahced configuration from wp-config
      $this->memcached = new \Memcached();
      $this->memcached->addServer(MEMCACHED_HOST, MEMCACHED_PORT);
    }

    public function get($key)
    {
      return $this->memcached->get($key);
    }

    public function set($key, $value)
    {
      return $this->memcached->set($key, $value);
    }

    public function test()
    {
      $this->memcached->set('test', 'This is test');
      $this->memcached->get('test');
    }
  }
}

