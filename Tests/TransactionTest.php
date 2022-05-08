<?php

    namespace Tests;

    use PHPUnit\Framework\TestCase;
    use Services\Ledger;
    use Consumers\Transactions;

    class TransactionTest extends TestCase
    {
        protected $mock_ledger = null;

        public function setup()
        {
            $this->mock_ledger = $this->getMockBuilder(Ledger::class)
                                    ->setMethods(['get_data','put_data'])
                                    ->getMock();
        }

        public function testTransactionGetSuccess()
        {
            //prepare mock
            $this->mock_ledger
                ->expects($this->any())
                ->method('get_data')
                ->willReturn("TEST TRANSACTION2");

            $transaction_obj = new Transactions($this->mock_ledger);

            $this->assertEquals("TEST TRANSACTION2", $transaction_obj->get_transactions());
        }

        public function testTransactionGetFailure()
        {
            //prepare mock
            $this->mock_ledger
                ->expects($this->any())
                ->method('get_data')
                ->willReturn("TEST FAIL TRANSACTION");

            $transaction_obj = new Transactions($this->mock_ledger);

            $this->assertNotEquals("TEST TRANSACTION", $transaction_obj->get_transactions());
        }

        public function testTransactionPutSuccess()
        {
            //prepare mock
            $this->mock_ledger
                ->expects($this->any())
                ->method('put_data')
                ->willReturn("TEST TRANSACTION");

            $transaction_obj = new Transactions($this->mock_ledger);
            $data = "";

            $this->assertEquals("TEST TRANSACTION", $transaction_obj->put_transactions($data));
        }
        
        public function testShowSuccess()
        {
            $transaction_obj = new Transactions();
            $this->assertEquals(true, $transaction_obj->show());
        }
        
        
    }