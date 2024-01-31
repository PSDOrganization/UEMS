<?php

namespace App;
class MockDatabase
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function executeQuery($query)
    {
        // For the sake of simplicity, let's assume the query is a SELECT statement
        // In a real scenario, you might want to implement more functionality
        return new MockQueryResult($this->data);
    }

    public function fetchAssoc($queryResult)
    {
        // Simulate fetching an associative array representing a row
        return $queryResult->fetch();
    }
}
?>