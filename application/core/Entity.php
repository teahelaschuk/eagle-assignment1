<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entity
 *
 * @author Lancelei
 */
class Entity extends CI_Model {
// Task Properties:
// id,task,priority,size,group,deadline,status,flag


    // If this class has a setProp method, use it, else modify the property directly
    public function __set($key, $value) {
        // if a set* method exists for this key, 
        // use that method to insert this value. 
        // For instance, setName(...) will be invoked by $object->name = ...
        // and setLastName(...) for $object->last_name = 
        $method = 'set' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
        if (method_exists($this, $method))
        {
                $this->$method($value);
                return $this;
        }

        // Otherwise, just set the property value directly.
        $this->$key = $value;
        return $this;
    }
    
    public function __get($property){
        
        $method = 'get' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $property)));
        if (method_exists($this, $method))
        {
                return $this->$method();
        }
        
    }
    
    

}
