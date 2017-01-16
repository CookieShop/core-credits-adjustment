<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adteam\Core\Credits\Adjustment;

/**
 * Description of Validate
 *
 * @author dev
 */
class Validate 
{

    protected $data;
    
    protected $items;
    
    protected $columns;
    
    protected $isUnikey;
    
    public function __construct($data,$items,$columns) {
        $this->data = $data;
        $this->items = $items;
        $this->columns = $columns;
    }

    public function isValid()
    {
        
    }
    
    /**
     * Valida que no tenga mas de un registro del
     * key definido mes-año
     * 
     * @param type $data
     * @throws \InvalidArgumentException
     */
    public function hasColumns()
    {
        foreach ($this->columns as $column){
                if(!isset($this->data[$column])){
                    throw new \Exception('Format_invalid_csv');                 
                }  
        }
    }  
}
