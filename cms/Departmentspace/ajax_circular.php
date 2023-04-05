<?php 
  include ('../database.php') ;
  $db = new Database();

  if(isset($_POST['action']) && $_POST['action'] == 'sub_category_list'){
    $cat_id = $_POST['cat_id'];
    $sub_cat_id = 0;
    if(isset($_POST['sub_cat_id'])){
        $sub_cat_id = $_POST['sub_cat_id'];
    }
    
    $db->select('tbl_circular_sub_group',"*",null,"group_id = ".$cat_id,null,null);
    // print_r( $db->getResult());
    $res = $db->getResult();
   
    if($res){
        ?>
<option value="0">Select Sub Category</option>
<?php
        foreach($res as $sub_cat){
            ?>
<option value="<?php echo $sub_cat['id'] ?>" <?php echo ($sub_cat_id == $sub_cat['id'])?'selected':''; ?> ><?php echo $sub_cat['sub_group_name'] ?></option>
<?php
          }
    }else{
         echo "<option value='0' >No Sub Category Found  </option>";
    }
     
  }
  
  if(isset($_POST['action']) && $_POST['action'] == 'search_data'){
     //print_r($_POST);
     if($_POST['circular_no'] !='' ){
        $sql = "SELECT c.id,c.dept_id,g.group_name,s.sub_group_name,c.circular_no,c.year,c.date,c.subject,c.file_name FROM `tbl_circular` c 
                LEFT JOIN `tbl_circular_group` g ON c.group = g.id 
                LEFT JOIN `tbl_circular_sub_group` s ON c.sub_group = s.id 
                WHERE c.dept_id = '".$_POST['dept_id']."' AND  c.circular_no = '".$_POST['circular_no']."' " ;
     }else{
        $where = " a.dept_id = '".$_POST['dept_id']."' ";

        if($_POST['subject'] != ''){
            $where .= " AND (a.group_name LIKE '%".$_POST['subject']."%' OR  a.sub_group_name LIKE '%".$_POST['subject']."%' OR  a.subject LIKE '%".$_POST['subject']."%') ";
        }
        
        if( isset($_POST['category_list']) && $_POST['category_list'] != ''){
            $where .= " AND a.group_name ='".$_POST['category_list']."' ";
        }
        if( isset($_POST['sub_category_list']) && $_POST['sub_category_list'] != ''){
            $where .= " AND a.sub_group_name ='".$_POST['sub_category_list']."'  ";
        }
        if(  $_POST['date'] != ''){
            $date = Date("Y-m-d",strtotime($_POST['date']));

            $where .= " AND a.date ='".$date."' ";
        }
        if(  $_POST['year'] != ''){
           
            $where .= " AND a.year ='".$_POST['year']."' ";
        }

        $sql = "SELECT a.id,a.dept_id,a.group_name,a.sub_group_name,a.circular_no,a.year,a.date,a.subject,a.file_name FROM 
                    ( SELECT c.id,c.dept_id,g.group_name,s.sub_group_name,c.circular_no,c.year,c.date,c.subject,c.file_name FROM `tbl_circular` c 
                    LEFT JOIN `tbl_circular_group` g ON c.group = g.id 
                     LEFT JOIN `tbl_circular_sub_group` s ON c.sub_group = s.id )a 
                     WHERE  ". $where." ORDER BY  a.year DESC , a.date ASC";
     }

     ?>
<table id="circular" class="table">
    <thead class="" style="background: #315682;color:#fff;">

        <th style="width:50px;">Sl No</th>
        <th style="width:130px">Circular No/Date </th>
        <th style="width:100px">Category</th>
        <th style="width:100px">Sub Category</th>
        <th style="width:130px;">Subject</th>
        <!-- <th style="text-align:center;width: 100px">Date</th> -->

        <th style="width:100px;text-align:center;">File</th>
        <th  style="width:50px">Action</th>
    </thead>
    <tbody>
        <?php 
                               
                              
                               $count = 0;
                             
                               $db->select_sql($sql);
                              // print_r( $db->getResult());
                              $result = $db->getResult();
                              if($result){
                                    foreach($result as $row){
                                        //print_r($row); 
                                        $count++;
                                        $folder = "";
                                        $parent_folder = "";
                                        switch ($row['dept_id']) {
                                            case '10':
                                                $parent_folder='fin_circular';
                                                $folder = $row['year'];
                                                // if($row['year'] < 1987){
                                                //     $folder = "archive";
                                                   
                                                //    }else{
                                                //     $folder = $row['year'];
                                                //    }
                                                break;
                                            case '2':
                                                $parent_folder='ga_circular';
                                                $folder = $row['year'];
                                                break;
                                            
                                        }
                                        
                                        $path = "circulars/".$parent_folder."/".$folder."/".$row['file_name'];
                                        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td style="width:130px"><?php echo $row['circular_no']." <br>". Date("d-m-Y",strtotime($row['date'])); ?></td>
            <td style="width:100px"><?php echo $row['group_name']; ?></td>
            <td style="width:100px"><?php echo $row['sub_group_name']; ?></td>
            <td style="width:130px"><?php echo $row['subject']; ?> </td>

            <td style="text-align:center;width:100px">
               <?php
                 if($row['file_name'] != ""){
                    ?>
                     <a href=<?php echo $path; ?> target="_blank" style="color:#4164b3"><img src="../assets/images/document_pdf.png" />
                       circular</i></a>
                    <?php
                 }else{
                    echo "No File Found";
                 }
               
               ?>
               

            </td>
            <td style="width:50px">
            <a href="#" class="text-primary" id="<?php echo $row['id']; ?> " data-toggle="tooltip" data-placement="top" title="Edit Circular" onclick="edit(this.id)" ><span class="pcoded-micon"><i class="feather icon-edit" style="font-size: 1.7rem;"></i></span></a>
            <a href="#" class="text-danger" id="<?php echo $row['id']; ?> " onclick="drop_alert(this.id)" data-toggle="tooltip" data-placement="top" title="Drop Circular" ><span class="pcoded-micon"><i class="feather icon-trash" style="font-size: 1.7rem;"></i></span></a>
            </td>
        </tr>
        <?php
                                    }
                              }else{
                                echo "No Record Found";
                              }
                               
                      
                               
                              ?>

    </tbody>
</table>
<?php
  }



  if(isset($_POST['action']) && $_POST['action'] == 'add_circular'){
    // print_r($_POST);
    // print_r($_FILES);

     $circular_no = $_POST['circular_no'];
     $circular_subject = $_POST['circular_subject'];
     $date = date('Y-m-d', strtotime($_POST['date'])); 
     $category = $_POST['category'];
     $sub_category = 0;
     $dept_id = $_POST['dept_id'];
     if(isset($_POST['sub_category'])){
        $sub_category = $_POST['sub_category'];
     }
    // $date;
     $get_year = explode('/', $_POST['date']);
     $year =  $get_year[2];
     $folder_name = "";
    //get dept folder name

     $db->select("tbl_department","dept_folder",null,"id = ".$dept_id,null,null);
     $result = $db->getResult();
     foreach($result as $row1){
        $folder_name = $row1['dept_folder'];
     }
    
        //create circular folder with name year if not exists
        $folder_path = "/mdrafm/cms/Departmentspace/circulars/".$folder_name;
        $path =  $_SERVER["DOCUMENT_ROOT"].$folder_path."/".$year;
       
        if (!file_exists($path)) {
          
            mkdir($path, 0777, true);
        }
        echo $path;
    //  $filename = strtolower(basename($_FILES['circular_file']['name']));
    //  $ext = substr($filename, strrpos($filename, '.') + 1);
    //  $new_filename = $circular_no.".".$ext;
    // // echo $new_filename;
    //  $upload_path = "circulars/".$folder_name."/".$year."/".$new_filename;
    //  //checking circular is present or not

    //  $db->select("tbl_circular","circular_no",null,"circular_no = '".$circular_no."' AND  year = ".$year,null,null);
    //  $result_dup = $db->getResult();
    //  if(count($result_dup) > 0 ){
    //      echo "dup# Circular is Present ";
    //  }else{
        
    //  $sql_insert = "INSERT INTO `tbl_circular` (`id`, `dept_id`, `group`, `sub_group`, `circular_no`, `year`, `date`, `subject`, `file_name`) 
    //  VALUES (NULL, '$dept_id', '".$category."', '".$sub_category."', '".$circular_no."', '".$year."', '".$date."', '".$circular_subject."', '".$new_filename."')";

    //  $db->insert_sql($sql_insert);
    //  $res = $db->getResult();

    //  if($res[0]>1){
    //     if(move_uploaded_file($_FILES['circular_file']['tmp_name'],$upload_path)){
    //       echo "success#".$res[1];;
          
    //     }

    //  }else{
      
    //     echo "error#".$res[0];
    //  }

    //  }
  
   
  }

  // fetch edit code
 if( isset($_POST['action']) && $_POST['action'] == 'edit'){
  
    $edit_id = $_POST['edit_id'];
    $table = $_POST['table'];
   
    $db->select($table,"*",null,'id='.$edit_id,null,null);
    
     $res = $db->getResult();
     //print_r($res);
     echo json_encode($res);
 }

 if(isset($_POST['action']) && $_POST['action'] == 'remove_circular'){
    $circular_id = $_POST['circular_id'];
    $dept_folder = $_POST['dept_folder'];

    $db->select("tbl_circular","file_name,year",null,"id = '".$circular_id."' ",null,null);
    $result = $db->getResult();
    foreach($result as $circular){
        $folder_path = "/cms/Departmentspace/circulars/".$dept_folder;
        $path =  $_SERVER["DOCUMENT_ROOT"].$folder_path."/".$circular['year']."/".$circular['file_name'];

        if($path){
            unlink($path);

            $db->update('tbl_circular', ["file_name" => "" ],'id='.$circular_id);
             $res = $db->getResult();
             if($res){
                 echo "success#".$res[1];
             }
             else{
                 //print_r($db->getResult());
                 echo "error#".$res[0];
             }
        }else{
            echo "error#File Not Found";
        }
    }
 }

 if(isset($_POST['action']) && $_POST['action'] == 'drop_circular'){
    $circular_id = $_POST['circular_id'];
    $dept_folder = $_POST['dept_folder'];

    $db->select("tbl_circular","*",null,"id = '".$circular_id."' ",null,null);
    $result = $db->getResult();
    foreach($result as $circular){
        // $folder_path = "/mdrafm/cms/circulars/".$dept_folder;
        // $path =  $_SERVER["DOCUMENT_ROOT"].$folder_path."/".$circular['year']."/".$circular['file_name'];

        $file_name = "circulars/".$dept_folder."/".$circular['year']."/".$circular['file_name'];
        $new_file = "circulars/drop_circular/".$circular['file_name'];
       if(rename($file_name,  $new_file)){
        //echo "success";
         $db->delete('tbl_circular','id='.$circular['id']);
         //$db->update('tbl_circular', ["status" => 0 ],'id='.$circular_id);
         $res = $db->getResult();
         if($res[0]==1){
           $db->insert('tbl_drop_circular',["circular_id"=>$circular_id, "dept_id"=>$circular['dept_id'],
           "`group`"=>$circular['group'],"sub_group"=>$circular['sub_group'],"circular_no"=>$circular['circular_no'],
           "year"=>$circular['year'],"date"=>$circular['date'],"subject"=>$circular['subject'],"file_name"=>$circular['file_name'] ]);

           $insert_drop = $db->getResult();
           if($insert_drop > 0){
              echo "success#Circular Dropped";
           }
         }
       }

    }
 }


 
 if(isset($_POST['action']) && $_POST['action'] == 'update_circular'){
    // print_r($_POST);
    // print_r($_FILES);
    // exit;
     $circular_no = $_POST['circular_no'];
     $circular_subject = $_POST['circular_subject'];
     $date = date('Y-m-d', strtotime($_POST['circular_date'])); 
     $category = $_POST['category'];
     $sub_category = 0;
     $dept_id = $_POST['dept_id'];
     $update_id =$_POST['update_id'];

     if(isset($_POST['sub_category'])){
        $sub_category = $_POST['sub_category'];
     }
    // $date;
     $get_year = explode('-', $_POST['circular_date']);
     $year =  $get_year[2];
     $folder_name = "";
    //get dept folder name
    if($_FILES['circular_file']['size'] > 0){
        //update if circular file update
        $db->select("tbl_department","dept_folder",null,"id = ".$dept_id,null,null);
        $result = $db->getResult();
        foreach($result as $row1){
           $folder_name = $row1['dept_folder'];
        }
       
           //create circular folder with name year if not exists
           $folder_path = "/mdrafm/cms/circulars/".$folder_name;
           $path =  $_SERVER["DOCUMENT_ROOT"].$folder_path."/".$year;
           //echo $path;
           if (!file_exists($path)) {
             
               mkdir($path, 0777, true);
           }
     
        $filename = strtolower(basename($_FILES['circular_file']['name']));
        $ext = substr($filename, strrpos($filename, '.') + 1);
        $new_filename = $circular_no.".".$ext;
       // echo $new_filename;
        $upload_path = "circulars/".$folder_name."/".$year."/".$new_filename;
      

        $db->update('tbl_circular',['`group`'=>$category,"sub_group"=>$sub_category,"circular_no"=>$circular_no,
                    "year"=>$year,"date"=>$date,"subject"=>$circular_subject,"file_name"=> $new_filename],'id='.$update_id);

        $res = $db->getResult();
        print_r($res);
        if($res[0]==1){
           if(move_uploaded_file($_FILES['circular_file']['tmp_name'],$upload_path)){
             echo "success#".$res[1];;
             
           }
   
        }else{
         
           echo "error#".$res[0];
        }
   
        
     
    }else{
        $db->update('tbl_circular',['`group`'=>$category,"sub_group"=>$sub_category,"circular_no"=>$circular_no,
        "year"=>$year,"date"=>$date,"subject"=>$circular_subject],'id='.$update_id);

         $ressult = $db->getResult();

         if($ressult[0]==1){
            echo "success#".$ressult[1];;
    
         }else{
          
            echo "error#".$ressult[0];
         }
    }
    exit;
   
   
  }
?>