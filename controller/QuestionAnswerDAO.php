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
    // Three dimensional array for the words with a each word and the weight of each one
    private $words;
    // List of ignored words
    private $ignoredWords;

    public function __construct()
    {
        $this->database = Database::getInstance();
        $this->pdo = $this->database->getPdo();
        $this->words= array();
        // Get the list of ignored words
        $ignoredWordsDAO = new IgnoredWordDAO();
        $this->ignoredWords = $ignoredWordsDAO->getList();
    }

    // Method to remove the punctuation
    private function normalizePunctuationWord($word)
    {
        // Remove the punctuation
        $word = str_replace(array("?", "!", ".", "...", ","), "", $word);
        $word = str_replace(array("(", ")"), " ", $word);
        return $word;
    }

    // Method to remove the ignored words from the question
    private function removeIgnoredWords($word)
    {
        // We split the question into words
        $wordExploded = explode(" ",  $word);

        // now lets compare each word to see if be in the ignored list of words
        for($i = 0; $i < count($this->ignoredWords); $i++)
            for($j = count($wordExploded)-1; $j >= 0; $j--)
            {
                // If matches we need to remove the ignored word from the question
                if($this->ignoredWords[$i] == $wordExploded[$j])
                    array_splice($wordExploded, $j, 1);
                // If the element exploded is a null value remove it
                else
                    if($wordExploded[$j] == null)
                    array_splice($wordExploded, $j, 1);
            }
        return $wordExploded;
    }

    // This method will be used to get each word, which is note in the ignoredWords table, and rank
    // the questions based on the relevance of each word in the context of all questions inserted on database
    private function rankQuestions($listQuestions)
    {
        // First we will need the array of ignored words
        $ignoredWords = new IgnoredWordDAO();
        $listIgnoredWords = $ignoredWords->getList();

        // First let remove the words that are ignored, punctuation and organize the array
        for($i = 0; $i < count($listQuestions); $i++)
        {
            // We need to remove the punctuation
            $listQuestions[$i]->setQuestion($this->normalizePunctuationWord($listQuestions[$i]->getQuestion()));

            // Lets remove the ignored words from the question
            $this->words[$i]['words'] = $this->removeIgnoredWords($listQuestions[$i]->getQuestion());
        }

        // Now lets see the weight about each word in the context of all questions to calculate your respective weight
        for($i = 0; $i < count($listQuestions); $i++)
        {
            $sumWeight = 0;
            // Go though the words array and search word by word
            // Note: In a larger system would be interesting compare this processing to do on the database by procudere
            // or something like this, so on each update, delete or insert on the database the weights of each signifcant
            // is updated and you will not need the calculation above anymore
            for($j = 0; $j < count($this->words[$i]['words']); $j++)
            {
                $this->words[$i]['weight'][$j] = 0;
                $sumWord = 0;
                // Lets go to the array of questions and search if is there another words
                for($k = 0; $k < count($listQuestions); $k++)
                {
                    // We don't need to check in the same question
                    if($i != $k)
                        for($l = 0; $l < count($this->words[$k]['words']); $l++)
                        {
                            if($this->words[$i]['words'][$j] == $this->words[$k]['words'][$l])
                                $sumWord++;
                        }
                }

                // The most important calculation of this robot, the weight of each word
                $this->words[$i]['weight'][$j] = (count($listQuestions) - $sumWord)/count($listQuestions);
                $sumWeight += $this->words[$i]['weight'][$j];
            }
            $this->words[$i]['sumWeights'] = $sumWeight;
        }

    }

    // Set the list of rows from the table questions_answers and convert into the words array and do the calculation
    // of the weights of each word
    private function setList()
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
    }

    // Method to return the answer to the user
    private function getAnswer($key)
    {
        // Because the id in the MySQL doesn't begin with 0
        $key++;
        // Return the data from the table
        $sql = "SELECT id, answer FROM " . self::TABLE . " WHERE id=$key";
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll(\PDO::FETCH_ASSOC);

        // Check if get the row
        if(count($data) > 0)
            return $data[0]['answer'];
        else
            return null;
    }

    // Function called by the API to do the processing and return the answer
    public function question($question)
    {
        $question = urldecode($question);
        $this->setList();

        // This is the key of the most relevant question that correspond to the question made by the user
        $relevantQuestionKey = -1;
        $relevantQuestionWeight = 0;

        // Removing the ignored words from the user input
        $questionNormalized = $this->removeIgnoredWords($question);

        // Go through the list of words of the question
        for($i = 0; $i < count($this->words); $i++)
        {
            // Sum of weight of each word that has a corresponded word in the question made by the user
            $sumWeightsQuestion = 0;
            for($j = 0; $j < count($questionNormalized); $j++)
            {
                for($k = 0; $k < count($this->words[$i]['words']); $k++)
                {
                    if($questionNormalized[$j] == $this->words[$i]['words'][$k])
                        $sumWeightsQuestion += $this->words[$i]['weight'][$k];
                }
            }
            // Calculate the wheighted average
            $sumWeightsQuestion = $sumWeightsQuestion / $this->words[$i]['sumWeights'];
            // Update the data of the best fitting answer
            if($sumWeightsQuestion > $relevantQuestionWeight && $sumWeightsQuestion > 0.5)
            {
                $relevantQuestionKey = $i;
                $relevantQuestionWeight = $sumWeightsQuestion;
            }

        }

        // Here we can put a threshold to filter the relevant data
        if($relevantQuestionWeight != 0 && $relevantQuestionKey != -1)
        {
            $message = $this->getAnswer($relevantQuestionKey);
            if(!isset($message))
                return json_encode(array('status'=> 400, 'message'=> $relevantQuestionKey. ' Error in the database request'));
            else
                return json_encode(array('status'=> 200, 'message'=> $message), JSON_UNESCAPED_UNICODE);
        }
        else
            return json_encode(array('status'=> 404, 'message'=>'I don\'t have any answer for this question'));
    }

}