<?php

namespace chatrobot\controller;

use chatrobot\Database;
use chatrobot\model\QuestionAnswer;
use chatrobot\controller\IgnoredWordDAO;

class QuestionAnswerDAO
{
    const TABLE = 'questions_answers';

    private $database;
    private $pdo;

    public function __construct()
    {
        $this->database = Database::getInstance();
        $this->pdo = $this->database->getPdo();
    }

    // This method will be used to get each word, which is note in the ignoredWords table, and rank
    // the questions based on the relevance of each word in the context of all questions inserted on database
    private function rankQuestions($listQuestions)
    {
        // First we will need the array of ignored words
        $ignoredWords = new IgnoredWordDAO();
        $listIgnoredWords = $ignoredWords->getList();

        // First let remove the words that are ignored
        for($i = 0; $i < count($listQuestions); $i++)
        {
          echo $listQuestions[$i]->getQuestion() . "<br>";
        }
    }

    // Return a list of rows from the table questions_answers
    public function getList()
    {
        // Return the data from the table
        $sql = "SELECT id, question FROM " . self::TABLE;
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll(\PDO::FETCH_ASSOC);

        $list = array();

        if(count($data) > 0)
        {
            foreach($data as $row)
            {
                $questionAnswer = new QuestionAnswer();
                $questionAnswer->setId($row['id']);
                $questionAnswer->setQuestion(strtolower($row['question']));
                $list[] = $questionAnswer;
            }
            $this->rankQuestions($list);
        }

        return $list;
    }
}