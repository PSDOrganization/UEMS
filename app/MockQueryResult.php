<?php

namespace App;
class MockQueryResult
{
    private $data;
    private $position;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->position = 0;
    }

    public function fetch()
    {
        // Simulate fetching a row from the result set
        if (isset($this->data[$this->position])) {
            $row = $this->data[$this->position];
            $this->position++;
            return $row;
        } else {
            return null;
        }
    }
}
?>