<?php

    namespace Services;

    use Interfaces\DataSource;

    class Ledger implements DataSource 
    {    
        protected $source = "data.txt";

        /**
         * Read data from data source
         */
        public function get_data(){
            $fp = fopen($this->source, 'r');
            $d = fread($fp, 1024);

            fclose($fp);
            return $d.PHP_EOL;
        }

        /**
         * Writes data to data source
         */
        public function put_data($data){
            $fp = fopen($this->source, 'a+');

            fwrite($fp, $data, strlen($data.PHP_EOL));
            
            return fclose($fp);
        }

    }