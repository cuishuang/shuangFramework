<?php

/**
 * Description of CacheBase
 *
 * @author DeanHD
 */

namespace Bdtt;

use Phalcon\DiInterface;
use Phalcon\Di\InjectionAwareInterface;
use Bdtt\Enum\SecondEnum;

abstract class Cache implements InjectionAwareInterface {
    
    protected $di;
    protected $_db;

    public function setDI(DiInterface $di){
        $this->di = $di;
    }

    public function getDI(){
        return $this->di;
    }
    
    public function get($key)
    {
        $redis = $this->di->get($this->_db);
        $value = $redis->get($key);
        return unserialize($value);
    }
    
    public function getCallback($key, $callback, $lifetime = SecondEnum::A_MINUTE)
    {
        $redis = $this->di->get($this->_db);
        $value = $this->get($key);
        if (empty($value)) {
            $value = call_user_func($callback);
            $this->set($key, $value, $lifetime);
        }
        return $value;
    }
    
    public function set($key, $value, $lifetime = SecondEnum::A_MINUTE)
    {
        if (empty($value)) {
            return;
        }
        $redis = $this->di->get($this->_db);
        $redis->set($key, serialize($value), $lifetime);
        //上一行代码等同于此行
        //$redis->setEx($key, $lifetime, $value);  
    }
    
    public function delete($key)
    {
        $redis = $this->di->get($this->_db);
        $redis->delete($key);
    }
}
