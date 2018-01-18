<?php

namespace App\admin\Student;
if(!isset($_SESSION)){
    session_start();
}
use App\Connection;
use PDOException;
use PDO;
class Student extends Connection
{
    private $name;
    private $department;
    private $address;
    private $image;
    private $id;
   public function set($data = array()){
        if(array_key_exists('name',$data)){
            $this->name = $data['name'];
        }
        if(array_key_exists('department',$data)){
            $this->department = $data['department'];
        }
        if(array_key_exists('address',$data)){
           $this->address = $data['address'];
       }
       if(array_key_exists('image',$data)){
           $this->image = $data['image'];
       }
       if(array_key_exists('id',$data)){
           $this->id = $data['id'];
       }
        return $this;
   }

   public function store(){
       try {

         $stm =  $this->con->prepare("INSERT INTO `students`(`name`,`department`,`address`, `image`, `unique_id`) 
                                        VALUES(:n,:d,:a, :image, :unique_id)");
         $result =$stm->execute(array(
             ':n' => $this->name,
             ':d' => $this->department,
             ':a' => $this->address,
             ':image' => $this->image,
             ':unique_id' => md5(time())

         ));
        if($result){
            $_SESSION['msg'] = 'Data successfully Inserted !!!';
            header('location:index.php');
        }

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }
   public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `students` WHERE `deleted_at` = '0000-00-00 00:00:00'");

           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }
    public function trash(){
           try {

               $stm =  $this->con->prepare("SELECT * FROM `students` WHERE `deleted_at` != '0000-00-00 00:00:00'");

               $stm->execute();
               return $stm->fetchAll(PDO::FETCH_ASSOC);

           } catch (PDOException $e) {
               print "Error!: " . $e->getMessage() . "<br/>";
               die();
           }
       }

    public function view($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `students` WHERE unique_id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                return $stm->fetch(PDO::FETCH_ASSOC);
            }else{

            }


        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function tmp_delete($id){
        try {
            $stm =  $this->con->prepare("UPDATE `students` SET `deleted_at` = NOW() WHERE unique_id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
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
       public function restore($id){
            try {
                $stm =  $this->con->prepare("UPDATE `students` SET `deleted_at` = '0000-00-00 00:00:00' WHERE unique_id = :id");
                $stm->bindValue(':id', $id, PDO::PARAM_STR);
                $stm->execute();
                if($stm){
                    $_SESSION['msg'] = 'Data successfully Restored !!!';
                    header('location:trash.php');
                }

            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

    public function delete($id){
        try {

            $stm =  $this->con->prepare("DELETE FROM `students` WHERE unique_id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Data successfully Deleted !!!';
                header('location:trash.php');
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function update(){
        try {

            $stmt = $this->con->prepare("UPDATE `students` SET `name` = :name, `department` = :department, `address` = :address, `image` = :image WHERE `students`.`unique_id` = :id;");
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':department', $this->department, PDO::PARAM_STR);
            $stmt->bindValue(':address', $this->address, PDO::PARAM_STR);
            $stmt->bindValue(':image', $this->image, PDO::PARAM_STR);
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
