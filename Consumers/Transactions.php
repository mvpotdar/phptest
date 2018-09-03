<?php

namespace Consumers;

use Interfaces\DataSource;

class Transactions{

    protected $data_source = '';

    public function __construct(DataSource $source = null) {
        $this->data_source = $source;
    }

    public function get_transactions(){
        $data = '';

        try{
            $data = $this->data_source->get_data();
        }catch(\Exception $e)
        {
            // logging
            return $e->getMessage();
        }

        return $data;
    }

    public function put_transactions($data) {
        return $this->data_source->put_data($data);
    }
    
    public function show(){
        return true;
    }

}
