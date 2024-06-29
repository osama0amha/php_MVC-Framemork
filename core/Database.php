<?php

namespace app\core;


class Database
{

    public \PDO $pdo;
    public array $ArrMigration;

    public function __construct($EnvData=[])
    {

        $hsd = $EnvData['hsd'];
        $username = $EnvData['username'];
        $password = $EnvData['password'];

        $this->pdo = new \PDO($hsd,$username,$password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function AplayMigration()
    {
        $this->CrateMigrationTable();
        $allMigration = $this->SelectAllMigration();

        $file = scandir(Application::$DirRoute.'/Migrations/');
        $migrationsDiff = array_diff($file,$allMigration);

         foreach ($migrationsDiff as $migration){
             if($migration == '.' || $migration == '..'){
                 continue;
             }

            require_once Application::$DirRoute.'/Migrations/'.$migration;

             $ClassName =  pathinfo($migration,PATHINFO_FILENAME);
             $ClassName = new $ClassName();
             $ClassName->up();
             $this->ArrMigration[]=$migration;
         }
        $this->saveMigration($this->ArrMigration);
    }

   public function CrateMigrationTable():void
    {
      $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(  
          id int(11),
          migration varchar(255),
          create_at date
         )");

    }
    public function SelectAllMigration()
    {
        $result = $this->pdo->prepare("SELECT migration FROM migrations");
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function SaveMigration(array $Emigration):void
    {
        $str = implode(',',array_map(fn($e) =>"('$e')",$Emigration));

        var_dump($str);
        $this->pdo->exec("INSERT INTO `migrations` (`migration`) VALUES $str");

    }
}