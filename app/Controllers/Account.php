<?php
namespace App\Controllers;

class Account {
    function account1() {
        global $db;
        try {

            // Start a transaction
            $db->beginTransaction();
        
            // Perform multiple operations within the transaction
            $stmt1 = $db->prepare("UPDATE accounts SET balance = balance - 100 WHERE account_id = 1");
            $stmt1->execute();
        
            $stmt2 = $db->prepare("UPDATE accounts SET balance = balance + 100 WHERE account_id = 2");
            $stmt2->execute();
        
            // Commit the transaction
            $db->commit();
        
            echo "Transaction successful: Money transferred.";
        } catch (\PDOException $e) {
            // Rollback the transaction in case of error
            $db->rollBack();
            echo "Transaction failed: " . $e->getMessage();
        }    
    }

    function account2() {
        global $db;
        try {

            // Start a transaction
            $db->beginTransaction();
        
            // Perform multiple operations within the transaction
            $stmt1 = $db->prepare("UPDATE accounts SET balance = balance - 100 WHERE account_id = 1");
            $stmt1->execute();
        
            $affected_account1 = $stmt1->rowCount();

            $stmt2 = $db->prepare("UPDATE accounts SET balance = balance + 100 WHERE account_id = 999");
            $stmt2->execute();
        
            $affected_account2 = $stmt2->rowCount();

            // Commit the transaction
            if($affected_account1 && $affected_account2) {
                $db->commit();
            } else {
                throw new \PDOException("some account not affecteds");
            }
            echo "Transaction successful: Money transferred.";
        } catch (\PDOException $e) {
            // Rollback the transaction in case of error
            $db->rollBack();
            echo "Transaction failed: " . $e->getMessage();
        } 
    }
}