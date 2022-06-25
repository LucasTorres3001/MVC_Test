<?php
    /**
     * User: Lucas Torres
     * Date: 23/06/2022
     * Time: 18:31
     */
    namespace Source\App\Core;
    /**
     * Model class
     * 
     * @abstract
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    abstract class Model
    {
        public function loadData($data)
        {
            foreach ($data as $key => $value)
            {
                if (property_exists($this, $key))
                {
                    $this->{$key} = $value;
                }
            }
        }
        public function validate()
        {}
    }