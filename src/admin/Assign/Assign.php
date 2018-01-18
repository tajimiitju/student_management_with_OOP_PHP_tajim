<?php

namespace App\admin\Assign;
if(!isset($_SESSION)){
    session_start();
}
use App\Connection;
use PDOException;
use PDO;
class Assign extends Connection
{
    private $student_id;
    private $course_id;
    private $id;
   public function set($data = array()){
        if(array_key_exists('student_id',$data)){
            $this->student_id = $data['student_id'];
        }
        if(array_key_exists('course_id',$data)){
            $this->course_id = $data['course_id'];
        }
        if(array_key_exists('id',$data)){
           $this->id = $data['id'];
        }
        return $this;
   }

   public function store(){
       try {

         $stmt =  $this->con->prepare("INSERT INTO `course_student` (`student_id`,`course_id`) 
                                        VALUES(:student_id,:course_id)");
            $stmt->bindParam(':student_id', $this->student_id, PDO::PARAM_INT);
            $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
            foreach ($this->course_id as $course_id){
               $stmt->execute();
            }
            if($stmt){
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



   public function student_index(){
       try {

           $stm =  $this->con->prepare("SELECT students.name, students.id, count(course_student.student_id) as Total FROM `students` LEFT JOIN course_student ON students.id = course_student.student_id GROUP BY students.name");

           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }

    public function course_index(){
        try {

            $stm =  $this->con->prepare("SELECT course.title, course.id, count(course_student.course_id) as Total FROM `course` LEFT JOIN course_student ON course.id = course_student.course_id GROUP BY course.title");

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
