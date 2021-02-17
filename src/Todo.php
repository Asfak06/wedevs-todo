<?php
namespace Wedevs;

include 'Config.php';

class Todo{
        private $host=HOST;
        private $user=USER;
        private $pass=PASS;
        private $db=DB;
        private $connection;
        public function __construct(){
          $info=new \mysqli($this->host,$this->user,$this->pass,$this->db);
        	$this->connection=$info;

        }
    public function store($data){
        $data=$this->connection->query("INSERT INTO todos (content) VALUES('$data')");
    }
    public function load(){
        $data='';
        $run=$this->connection->query("select * from todos");
        if(mysqli_num_rows($run)>0){
          while($row=mysqli_fetch_array($run)){

            if($row['completed']){
              $text="<i class='complete btn far fa-check-circle text-primary invisible'></i>
              <span id='".$row['id']."' class='par'><s>".$row['content'] ."</s></span>";
            }else{
              $text="
              <i class='complete btn far fa-circle text-secondary invisible'></i>
              <span id='".$row['id']."' class='par'>".$row['content'] ."</span>";
            }

            $data.="
            <p class='sect'>
            $text
            <i class='delete fas fa-times float-right text-danger btn invisible'></i>
            </p>";
          }
        }
       
        return $data;
    }
   public function loadActive(){
        $data='';
        $run=$this->connection->query("select * from todos where completed=0");
        if(mysqli_num_rows($run)>0){
          while($row=mysqli_fetch_array($run)){  
            $text="
            <i class='complete btn far fa-circle text-secondary invisible'></i>
            <span id='".$row['id']."' class='paractive'>".$row['content'] ."</span>";

            $data.="
            <p class='sect'>
            $text
            <i class='delete fas fa-times float-right text-danger btn invisible'></i>
            </p>";
          }
        }else{
          $data .='<p class="mb-3 ml-5">nothing to do</p>';
        }
       
        return $data;
    }
   public function loadCompleted(){
        $data='';
        $run=$this->connection->query("select * from todos where completed=1");
        if(mysqli_num_rows($run)>0){
          while($row=mysqli_fetch_array($run)){  
            $text="
            <i class='complete btn far fa-check-circle text-primary invisible'></i>
            <span id='".$row['id']."' class=''><s>".$row['content'] ."</s></span>";

            $data.="
            <p  class='sect'>
            $text
            <i class='delete fas fa-times float-right text-danger btn'></i>
            </p>";
          }
        }else{
          $data='<p class="mb-3 ml-5">nothing completed yet</p>';
        }
       
        return $data;
    }

    public function update($id,$content){
      $this->connection->query("update todos set content='$content' where id='$id' ");
    }

    public function complete($id){
      $this->connection->query("update todos set completed=1 where id='$id' ");
    }
    public function delete($id){
      $this->connection->query("delete from todos  where id='$id' ");
    }
    public function clear(){
      $this->connection->query("delete from todos  where completed=1 ");
    }
    public function anyCompleted(){
      $run=$this->connection->query("select * from todos where completed=1");
      $walk=$this->connection->query("select * from todos");
      $num=mysqli_num_rows($run);
      $total=mysqli_num_rows($walk);
      $remains=$total-$num;
      $arr=array();
      if($num>0){
        $arr['status']=true;
      }else{
        $arr['status']=false;
      }
        $arr['remains']=$remains;
        $arr['total']=$total;
      return json_encode($arr);
    }
}

?>