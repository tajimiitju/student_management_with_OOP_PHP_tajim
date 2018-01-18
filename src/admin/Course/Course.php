<?php

namespace App\admin\Course;
if(!isset($_SESSION)){
    session_start();
}
use App\Connection;
use PDOException;
use PDO;
class Course extends Connection
{
    private $title;
    private $credit;
    private $duration;
    private $id;
   public function set($data = array()){
        if(array_key_exists('title',$data)){
            $this->title = $data['title'];
        }
        if(array_key_exists('credit',$data)){
            $this->credit = $data['credit'];
        }
        if(array_key_exists('duration',$data)){
           $this->duration = $data['duration'];
       }
       if(array_key_exists('id',$data)){
           $this->id = $data['id'];
       }
        return $this;
   }

   public function store(){
       try {

         $stm =  $this->con->prepare("INSERT INTO `course`(`title`,`credit`,`duration`) 
                                        VALUES(:title,:credit,:duration)");
         $result =$stm->execute(array(
             ':title' => $this->title,
             ':credit' => $this->credit,
             ':duration' => $this->duration
         ));
        if($result){
            $_SESSION['msg'] = 'Data successfully Inserted !!!';
            header('location:index.php');
        }else{
            $_SESSION['message'] = 'Something is Missing !!!';
            header('location:create.php');
        }


       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }



   public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `course`");

           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }

    public function view($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `course` WHERE id = $id");

            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function delete($id){
        try {

            $stm =  $this->con->prepare("DELETE FROM `course` WHERE id = $id");
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Data successfully Deleted !!!';
                header('location:index.php');
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function update(){
        try {

            $stmt = $this->con->prepare("UPDATE `fahim`.`course` SET `title` = :title, `credit` = :credit, `duration` = :duration WHERE `course`.`id` = :id;");
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':credit', $this->credit, PDO::PARAM_STR);
            $stmt->bindValue(':duration', $this->duration, PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->id, PDO::PARAM_STR);
            $stmt->execute();
            if($stmt){
                $_SESSION['update'] = 'Data successfully Updated !!!';
                header('location:index.php');
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

















}
