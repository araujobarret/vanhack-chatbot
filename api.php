<?php
// API to get parameters passed by URL and returning the respective JSON of response

include 'autoload.php';
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=utf-8");
header('access-control-allow-methods: GET, POST');

$questionsAnswers = new chatrobot\controller\QuestionAnswerDAO();
$ignoredWords = new chatrobot\controller\IgnoredWordDAO();
if(isset($_GET['action']))
{
    echo $questionsAnswers->question(urlencode(strtolower($_GET['action'])) );
}
else
    echo json_encode(array('status'=> 400, 'message'=> 'This action is not available'));
