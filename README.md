# vanhack-chatbot

Database
```
CREATE TABLE ignored_words(
  id INT(11) NOT NULL AUTO INCREMENT PRIMARY KEY,
  word VARCHAR(40) NOT NULL
);

CREATE TABLE questions_answers(
    id INT(11) NOT NULL AUTO INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL
);

```