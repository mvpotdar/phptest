<?php

    require ('./vendor/autoload.php');

    use Consumers\Transactions;
    use Services\Ledger;

    $source = new Ledger();

    try{
        $transaction_obj = new Transactions($source);

        echo $transaction_obj->get_transactions();
    
        $transaction_obj->put_transactions("TRANSACTION NEW DATA");
        echo "First Commit";
    
        echo $transaction_obj->get_transactions();

    }catch(\Exception $e){
        echo "There was an error :". $e->getMessage();
    }
