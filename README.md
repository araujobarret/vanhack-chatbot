# ChatRobot

Project Link: https://github.com/araujobarret/vanhack-chatbot

Author: Carlos Alberto de Araujo Barreto
Date: 09/04/2017

## Intro

This is a chat robot with inserted questions and answers.

## Install Instructions

- Copy this project to your website directory.
- Create the database chatrobot on your MySQL.
- Import the app.sql to the chatrobot database.
- Configure the user and password for accessing the database on the file database.php

## Use Instructions

This robot is implemented with supervised learning, so inserting overfitting data may cause
malfunction and errors to the expected answers.

## API instructions

The API returns JSON with 2 properties, status(200, 400 and 404) and the respective message of the action.

* **URL** 

`http://yourdomain/vanhack-chatbot/api.php`

* **Supported Methods** 

`GET`

* **URL Params** 

  ** Required: **
	`action=[string]`
	
* **Success Response:**

	**Content:** `{ status : 200, message: <message from the server> }`

* **Error Response:**

	**Content:** `{ status : 400, message: <message from the server> }`
							 `{ status : 404, message: <message from the server> }`

