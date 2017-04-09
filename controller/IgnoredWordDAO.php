<?php

namespace chatrobot\controller;

use chatrobot\Database;
use chatrobot\model\IgnoredWord;

class IgnoredWordDAO
{
    const TABLE = 'ignored_words';

    private $database;
    private $pdo;

    public function __construct()
    {
        $this->database = Database::getInstance();
        $this->pdo = $this->database->getPdo();
    }

    public function getList()
    {
        // Return the data from the table
        $sql = "SELECT * FROM " . self::TABLE;
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll(\PDO::FETCH_ASSOC);
        $ignoredWord = new IgnoredWord();

        $list = array();

        if(count($data) > 0)
        {
            foreach($data as $row)
            {
                $ignoredWord->setId($row['id']);
                $ignoredWord->setWord($row['word']);
                $list[] = $ignoredWord;
            }
        }

        return $list;
    }

}