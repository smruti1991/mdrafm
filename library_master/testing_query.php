<?php
include '../admin/database.php'; 
$db = new Database(); 
// $sql = "SELECT * FROM `tbl_new_recruite`";
// $db->select_sql($sql);
// $res_tranie = $db->getResult();
// //print_r($res_faculty);
// foreach($res_tranie as $row)
//  {
//        $phone_num=$row['phone'];
//        if(!empty($phone_num))
//        {
//           $sql = "SELECT id,username FROM tbl_user WHERE username= '".$phone_num."'";
//           $db->select_sql($sql);
//           $res_count_user = $db->getResult();
//        foreach($res_count_user as $res)
//        {
//         $user_id=$res['id'];
//         $username=$res['username'];
//         if(!empty($username))
//         {
//           $sql_updt = "update tbl_new_recruite set user_id='".$user_id."' where phone=$username";
//           $db->update_dir($sql_updt);
//           $res2 = $db->getResult();
//         }
//        }
//       }
//  }
$sql = "SELECT * FROM `tbl_faculty_master`";
$db->select_sql($sql);
$res_faculty = $db->getResult();
//print_r($res_faculty);
foreach($res_faculty as $row)
 {
       $phone_num=$row['phone'];
       if(!empty($phone_num))
      {
       $sql = "SELECT id,username FROM tbl_user WHERE username= '".$phone_num."'";
       $db->select_sql($sql);
       $res_count_user = $db->getResult();
       foreach($res_count_user as $res)
       {
        $user_id=$res['id'];
        $username=$res['username'];
        if(!empty($username))
        {
          $sql_updt = "update tbl_faculty_master set user_id='".$user_id."' where phone=$username";
          $db->update_dir($sql_updt);
          $res2 = $db->getResult();
        }
       }
      }
 }
// $db->select_sql($sql);
//$db->select('tbl_book_list',"book_name,author_name",null,null,null,null);
//  $sql = "SELECT * FROM `tbl_book_list` GROUP BY `book_name`,`author_name`";
// $db->select_sql($sql);
// $res_book = $db->getResult();
// //print_r($res_book); exit;
// $sl=1;
// foreach($res_book as $row)
// {
//     //echo $sl++.'</br>';
//    //echo $sl++.'.'.$book_name=$db->mysqli->real_escape_string($row['book_name']).'</br>';
//    $book_name=$db->mysqli->real_escape_string($row['book_name']);
//    $author_name=$db->mysqli->real_escape_string($row['author_name']);
//    //Book type
//    $sql = "SELECT book_ref_no,book_name,author_name,edition,year_of_publication,place_publisher,page,price,location,row,subject_name,quantity FROM tbl_book_list WHERE book_name= '".$book_name."' and author_name= '".$author_name."'";
//    $db->select_sql($sql);
//    $res_count_book = $db->getResult();
//    //echo '<pre>',print_r($res_count_book),'</pre>'; 
//    foreach($res_count_book as $res)
//    {
            // $bk_name=$db->mysqli->real_escape_string($res['book_name']);
            // $auth_name=$db->mysqli->real_escape_string($res['author_name']);
            // $edition=$db->mysqli->real_escape_string($res['edition']);
            // $book_ref_no= $res['book_ref_no'];
            // $quantity= $res['quantity'];
            // $year_of_publication= $res['year_of_publication'];
            // $place_publisher=$db->mysqli->real_escape_string($res['place_publisher']);
            // $page= $res['page'];
            // $price= $res['price'];
            // $location= $res['location'];
            // $row= $res['row'];
            // $subject_name= $res['subject_name'];
            // if($subject_name == "Commerce" || $subject_name == "Economics" || $subject_name == "Financial Management" || $subject_name == "General Law")
            // {
            // $book_type='1';
            // }else if($subject_name == "Government")
            // {
            // $book_type='3';
            // }else if($subject_name == "Gifted Book")
            // {
            // $book_type='4';
            // }else{
            // $book_type='0';
            // }
            // //Subject name
            // if($subject_name == "Commerce")
            // {
            // $subject_id='1';
            // }else if($subject_name == "Dictionary")
            // {
            // $subject_id='2';
            // }
            // else if($subject_name == "Economics")
            // {
            // $subject_id='3';
            // }
            // else if($subject_name == "English Fiction")
            // {
            // $subject_id='4';
            // }
            // else if($subject_name == "Financial Management")
            // {
            // $subject_id='5';
            // }else if($subject_name == "General Law")
            // {
            // $subject_id='6';
            // }
            // else if($subject_name == "Gifted Book")
            // {
            // $subject_id='7';
            // }
            // else if($subject_name == "Government")
            // {
            // $subject_id='8';
            // }
            // else
            // {
            // $subject_id='';
            // }
           
            // $sql_ins = "INSERT INTO tbl_book_details(book_name,author_name,quantity,subject_id,book_type,status,created_date)
           //  VALUES('".$bk_name."','".$auth_name."','".$quantity."','".$subject_id."','".$book_type."',0,NOW())";
//$db->insert_sql($sql_ins);
           //$res = $db->getResult();
           // print_r($get_res_book);
         //   
         //    $sql_inst = "INSERT INTO tbl_book_reference_no(tbl_book_id,reference_no,edition,year_of_publication,place_publisher,page,price,location,row,status) 
         //   VALUES('".$book_auto_id."','".$book_ref_no."','".$edition."','".$year_of_publication."','".$place_publisher."',
         //    '".$page."','".$price."','".$location."','".$row."',0)";
         //   $db->insert_sql($sql_inst);
         //     $res2 = $db->getResult();
         //     print_r($res2);
         //    $last_insert_id='';
         //    if(count($get_res_book) > 0)
         //     {
         //       $book_auto_id=$get_res_book[0]['id'];
         //       $sql_upd = "UPDATE tbl_book_details set quantity=quantity+1 where id= $book_auto_id";
         //       $db->update_dir($sql_upd);
         //       $res = $db->getResult();
         //       $last_insert_id=$book_auto_id;

         //     }else{
         //     $sql_ins = "INSERT INTO tbl_book_details(book_name,author_name,quantity,subject_id,book_type,status,created_date) VALUES('".$bk_name."','".$auth_name."','".$quantity."','".$subject_id."','".$book_type."',0,NOW())";
         //     $db->insert_sql($sql_ins);
         //     $res = $db->getResult();
         //    echo $last_insert_id=$res['0'];
         //     }
         //   //$last_insert_id=$res['0'];
         //      //
         //       //$last_insert_id=$res['0'];
            //  $sql = "SELECT id,book_name,author_name FROM tbl_book_details
            // WHERE book_name= '".$bk_name."' and author_name= '".$auth_name."'";
            // $db->select_sql($sql);
            // $get_res_book = $db->getResult();
            // $book_auto_id=$get_res_book[0]['id'];
            // $sql_inst = "INSERT INTO tbl_book_reference_no(tbl_book_id,reference_no,book_name,author_name,edition,year_of_publication,place_publisher,page,price,location,row,status) 
            // VALUES('".$book_auto_id."','".$book_ref_no."','".$bk_name."','".$auth_name."','".$edition."','".$year_of_publication."','".$place_publisher."',
            // '".$page."','".$price."','".$location."','".$row."',0)";
            // $db->insert_sql($sql_inst);
            // $res2 = $db->getResult();
         //    echo $last_insert_id2=$res2['0'];
           
            //}

//}
?>