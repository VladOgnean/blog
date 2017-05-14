<?php
class Users_model extends CI_Model {

    public $user_name;


  public function login($email, $password)
  {

    $this -> db -> select('id, email, password, user_name');
    $this -> db -> from('users');
    $this -> db -> where('email', $email);
    $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     $row = $query->result()[0];
     if(password_verify($password, $row->password))
      return $row;
    else
      return false;
   }
   else
   {
     return false;
   }
 }
}
// echo password_hash('blogvlad', PASSWORD_BCRYPT, ["cost" => 12]);
?>