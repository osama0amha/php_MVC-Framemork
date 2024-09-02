<?php



class m0002_someting
{
    public function up():void
    {
       \Os\MvcFramework\Application::$app->dp->pdo->exec("CREATE TABLE users(  
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(255),
          email varchar(255),
          password varchar(255),
          create_at DATE NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (id)
         )");
    }
}