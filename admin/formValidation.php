<?php 
//include 'database.php';

class Validation
{
   
    public function checkValidation($request_data,$rules){
    
       
      //  print_r($request_data);
      //  print_r($rules);
      //   exit;
        foreach ($request_data as $key => $value) {
          // check for which field rules is define.
          if(array_key_exists($key,$rules)){
            // if one filed have multiple validation then explode validation methods.
            $validationRule = explode("|",$rules[$key]);
            // call that all validation method.
            foreach ($validationRule as $methodName) {
    
              $dbValidation = explode(":",$methodName);
              // print_r($dbValidation);
              // exit;
              if(sizeof($dbValidation)>=2){
                // mendetory fields
                // print_r($dbValidation);
                $methodName = $dbValidation[0];
                $table = $dbValidation[1];
                $fieldName = $key;
                // optional fields
                $program_id =  (isset($dbValidation[2]) && !empty($dbValidation[2])?$dbValidation[2]:"");
                $trng_type = (isset($dbValidation[3]) && !empty($dbValidation[3])?$dbValidation[3]:"");
                $returnData = $this->$methodName($value,$fieldName,$table,$program_id,$trng_type);
              }else {
                // make a validation rule name as a function name.
                $returnData = $this->$methodName($value,$key);
              }
              //if error so it return json error message.
              if($returnData!=$value){
                // return a error message.
                return $returnData;
              }
            }
          }
        }
        // if all rules are setisfying conditions then return true.
        return true;
    }

    /*
   Check a given email is valid or not.
  */
  public function email($value,$fieldName){
    if(filter_var($value,FILTER_VALIDATE_EMAIL) === false){
      // to send error message we are calling a Formatter class's method for display alert and error with their message.
      $msg = "Invalide $fieldName address";
      // $msg = "Invalide ".$this->customMsg[$fieldName]." address";
      return $this->errorAlertMessage($msg,$fieldName,"input");
    }else {
      return $value;
    }
  }
  /*
  Check given param is empty or not
  */
  public function required($value,$fieldName){
    if(trim($value)==""){

      // Uncomment line for a use of custom lable in error message.
      // $msg = "Please enter ".$this->customMsg[$fieldName];
      $msg = "Please enter ".str_replace("_"," ",$fieldName);

      return $this->errorAlertMessage($msg,$fieldName,"input");
    }else {
      return $value;
    }
  }
  /*
  Check given dropdown is select or not
  */
  public function select($value,$fieldName){
    if(trim($value)==0){

      $msg = "Please select ".str_replace("_"," ",$fieldName);

      return $this->errorAlertMessage($msg,$fieldName,"select");
    }else {
      return $value;
    }
  }
  /*
    preg match for a contact number
  */
  public function contactNumber($value,$fieldName){
    if(!preg_match('/^[6-9][0-9]{9}$/', $value))
    {
      $msg = "Invalid ".str_replace("_"," ",$fieldName);
      // $msg = "Invalid ".$this->customMsg[$fieldName];
      return $this->errorAlertMessage($msg,$fieldName,"input");
    }else {
      return $value;
    }
  }

  /*
 restrict a duplicate value into database.
  */
  // That check a data value must be unique at the time of insert data into database.
  public function unique($value,$fieldName,$table,$program_id="",$trng_type=""){
    
    $db = new Database;

    $extraCondition = "";
    if(!empty($program_id) && !empty($trng_type)){
      $extraCondition =  " and program_id = ".$program_id." AND trng_type = '".$trng_type."'";
    }
    $query = "SELECT id from ".$table." WHERE ".$fieldName."='".$value."'".$extraCondition."";
     $db->select_sql($query);
     $res = $db->getResult();
    if( count($res)>0){
      $msg = str_replace("_"," ",$fieldName)." is already taken";
     
      return $this->errorAlertMessage($msg,$fieldName,"input");
    }else {
      return $value;
    }
  }

  /*
  Check a given input for the parameter is an integer or not.
  */
  public function integer($value,$fieldName){
    if(!preg_match('/^[0-9]*$/',$value))
    {
      $msg = str_replace("_"," ",$fieldName)." must be number";
      
      return $this->errorAlertMessage($msg,$fieldName,"input");
    }else {
      return $value;
    }
  }

  
  /*
   success message you want to send as response.
  */
  public function successDataFormat($request_data){
    $data['data'] = $request_data;
    return json_encode($data);
  }

  /*
   error message 
  */
  public function errorAlertMessage($msg,$fieldName,$type){
   // $msg = array("error"=>array("message"=>$msg,"fieldName"=>$fieldName));
   //return json_encode($msg);
      $msg = "error#message:".$msg."#fieldName:".$fieldName."#".$type;
    return $msg;
  }
}


?>