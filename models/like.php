<?php 
// connect to database
include "include/init.php";
// include "include/nav.php";



$conn=new Database();


class Like{
  public static $table_name = "post_like";
  protected static $db_table_fields = array("user_id", "post_id ","like_action");
    public $id;
    public $user_id;
    public $post_id;
    public $like_action;
        // Get tot=al number of likes from post_like
         public static function getLikes($id)
        {
          global $conn;
          // $conn=new Database();
          $sql = "SELECT COUNT(*) FROM post_like
                WHERE post_id = $id AND like_action	='like'";
              
              $rs= mysqli_query($conn->conn, $sql);
              $result = mysqli_fetch_array($rs);
          return $result[0];
        }



        // // // Get total number of likes for a particular post
        public static  function getRating($id)
        {
        //    $conn=new Database();
        global $conn;
          $rating = array();
          $likes_query = "SELECT COUNT(*) FROM post_like WHERE post_id = $id AND like_action='like'";          
          $likes_rs = mysqli_query($conn->conn,$likes_query);
          $likes = mysqli_fetch_array($likes_rs);
          $rating = [
            'likes' => $likes[0],
          ];
          return json_encode($rating);
        }

        // Check if user already likes post or not
        public static  function userLiked($post_id)
        {
          // $conn=new Database();
          // global $user_id;
          global $conn;
          $sql = "SELECT * FROM post_like WHERE  post_id=$post_id AND like_action='like'";
                // var_dump($sql);
          $result = mysqli_query($conn->conn,$sql);
          $result2=mysqli_fetch_array($result);
          if ($result2 > 0) {
            return true;
          }else{
            echo mysqli_error($conn->conn);
          }
          
        }

}

 ?>