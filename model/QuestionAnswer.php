<?php

namespace chatrobot\model;

class QuestionAnswer
{
    // Attributes of the class
    private $id;
    private $question;
    private $answer;
    // This attribute will be represent the average occurence of each important word of the question
    // If a word is repeated more times in another questions your weight will be not to high like a unique word for example
    private $rankWords;
    //This is a sliced array of words without the ignored ones
    private $slicedWords;

    // Default constructor
    public function __construct()
    { }

    // Getters & Setters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getRankWords()
    {
        return $this->rankWords;
    }

    /**
     * @param mixed $rankWords
     */
    public function setRankWords($rankWords)
    {
        $this->rankWords = $rankWords;
    }

    /**
     * @return mixed
     */
    public function getSlicedWords()
    {
        return $this->slicedWords;
    }

    /**
     * @param mixed $slicedWords
     */
    public function setSlicedWords($slicedWords)
    {
        $this->slicedWords = $slicedWords;
    }       

}

?>