<?php
// API to get parameters passed by URL and returning the respective JSON of response

include 'autoload.php';
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json; charset=utf-8");
header('access-control-allow-methods: GET, POST');

$questionsAnswers = new chatrobot\controller\QuestionAnswerDAO();
$ignoredWords = new chatrobot\controller\IgnoredWordDAO();
if(isset($_GET['action']))
{
    $questionsAnswers->getList();
}
