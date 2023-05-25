<?php

//exam_subject_question_action.php

include('database.php');

$object = new database();

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		 $where_query = 'WHERE 1=1 ';
		 if($_POST["syllabus_id"] != 0 ){
			$where_query .= ' AND s.id = '.$_POST["syllabus_id"];
		 }
		 if($_POST["term_id"] != 0 ){
			$where_query .= ' AND t.id = '.$_POST["term_id"];
		 }
		 if($_POST["paper_id"] != 0 ){
			$where_query .= ' AND p.id =  '.$_POST["paper_id"];
		 }

		$order_column = array('s.descr', 't.term', 'p.paper_code');

		$output = array();

		 $main_query = "
				SELECT q.exam_subject_question_id,s.descr,t.term,p.paper_code,q.exam_subject_question_title,q.exam_subject_question_answer FROM `exam_subject_question` q 
				JOIN `tbl_sylabus_master` s ON q.syllabus_id= s.id
				JOIN `tbl_term_master` t ON q.term_id = t.id
				JOIN `tbl_paper_master` p ON q.paper_id = p.id 
				".$where_query;

		$search_query = '';

		if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '' )
		{
			$search_query .= ' AND q.exam_subject_question_title LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR s.descr LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR p.paper_code LIKE "%'.$_POST["search"]["value"].'%" ';
		}

		if(isset($_POST["order"]))
		{
			$order_query = ' ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_query = ' ORDER BY p.paper_code DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
//echo $sql = $main_query . $search_query . $order_query;
		$object->query = $main_query . $search_query . $order_query;

		$object->execute();

		$filtered_rows = $object->row_count();

		$object->query .= $limit_query;

		$result = $object->get_result();

		$object->query = $main_query;

		$object->execute();

		$total_rows = $object->row_count();

		$data = array();
//print_r($result);
		foreach($result as $row)
		{
			$sub_array = array();
			$sub_array[] = html_entity_decode($row["descr"]);
			$sub_array[] = html_entity_decode($row["term"]);
			$sub_array[] = html_entity_decode($row["paper_code"]);
			$sub_array[] = $row["exam_subject_question_title"];
			$sub_array[] = $object->Get_question_option_data($row['exam_subject_question_id'], 1);
			$sub_array[] = $object->Get_question_option_data($row['exam_subject_question_id'], 2);
			$sub_array[] = $object->Get_question_option_data($row['exam_subject_question_id'], 3);
			$sub_array[] = $object->Get_question_option_data($row['exam_subject_question_id'], 4);
			$sub_array[] = $row["exam_subject_question_answer"] . ' Option';

			$sub_array[] = '
			<div align="center">
			<button type="button" name="edit_button" class="btn btn-warning btn-circle btn-sm edit_button" data-id="'.$row["exam_subject_question_id"].'"><i class="fas fa-edit"></i></button>
			&nbsp;
			<button type="button" name="delete_button" class="btn btn-danger btn-circle btn-sm delete_button" data-id="'.$row["exam_subject_question_id"].'"><i class="fas fa-times"></i></button>
			</div>
			';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"    			=> 	intval($_POST["draw"]),
			"recordsTotal"  	=>  $total_rows,
			"recordsFiltered" 	=> 	$filtered_rows,
			"data"    			=> 	$data
		);
			
		echo json_encode($output);

	}

	if($_POST['action'] == 'fetch_subject')
	{
		$object->query = "
		SELECT subject_wise_exam_detail.exam_subject_id, subject_soes.subject_name 
		FROM subject_wise_exam_detail 
		INNER JOIN exam_soes 
		ON exam_soes.exam_id = subject_wise_exam_detail.exam_id 
		INNER JOIN subject_soes 
		ON subject_soes.subject_id = subject_wise_exam_detail.subject_id 
		WHERE exam_soes.exam_id = '".$_POST["exam_id"]."' 
		ORDER BY subject_soes.subject_id ASC";

		$result = $object->get_result();
		$html = '<option value="">Select Subject</option>';
		foreach($result as $row)
		{
			if($object->Can_add_question_in_this_subject($row['exam_subject_id']))
			{
				$html .= '<option value="'.$row['exam_subject_id'].'">'.$row['subject_name'].'</option>';
			}
		}
		echo $html;
	}

	if($_POST["action"] == 'Add')
	{
		$error = '';

		$success = '';
		// print_r($_POST);
		// exit;
		$data = array(
			':syllabus_id'					=>	$_POST["syllabus_id"],
			':term_id'				        =>	$_POST["term_id"],
			':paper_id'				        =>	$_POST["paper_id"],
			':exam_subject_question_title'	=>	$_POST["exam_subject_question_title"],
			':exam_subject_question_answer'	=>	$_POST["exam_subject_question_answer"]
		);

		$object->query = "
		INSERT INTO exam_subject_question 
		(syllabus_id, term_id, paper_id, exam_subject_question_title, exam_subject_question_answer) 
		VALUES (:syllabus_id, :term_id, :paper_id, :exam_subject_question_title, :exam_subject_question_answer)
		";

		$object->execute($data);

	  	$exam_subject_question_id = $object->connect->lastInsertId();

		for($count = 1; $count <= 4; $count++)
		{
			//echo $count; 
			$num = $object->clean_input($_POST['option_title_' . $count]);
			$data_option = array(
				':exam_subject_question_id'		=>	$exam_subject_question_id,
				':question_option_number'		=>	$count,
				':question_option_title'		=>	$object->clean_input($_POST['option_title_' . $count])
			);
        //   echo $sql = "INSERT INTO question_option 
		// 	(exam_subject_question_id, question_option_number, question_option_title) 
		// 	VALUES ($exam_subject_question_id,$count, '".$num."')";

			// $object->query = "
			// INSERT INTO question_option 
			// (exam_subject_question_id, question_option_number, question_option_title) 
			// VALUES ('".$exam_subject_question_id."','".$count."','".$num."')
			// ";
			$object->query = "
			INSERT INTO question_option 
			(exam_subject_question_id, question_option_number, question_option_title) 
			VALUES (:exam_subject_question_id,:question_option_number,:question_option_title)
			";
				
			$object->execute($data_option);
		}

		$success = '<div class="alert alert-success">Question Added</div>';

		$output = array(
			'error'		=>	$error,
			'success'	=>	$success
		);

		echo json_encode($output);

	}

	if($_POST["action"] == 'fetch_single')
	{
		$object->query = "
		SELECT * FROM exam_subject_question 
		WHERE exam_subject_question_id = '".$_POST["exam_subject_question_id"]."'
		";

		$result = $object->get_result();

		$data = array();

		foreach($result as $row)
		{
			$data['syllabus_id'] = $row['syllabus_id'];
			$data['term_id'] = $row['term_id'];
			$data['paper_id'] = $row['paper_id'];
			$data['exam_subject_question_title'] = $row['exam_subject_question_title'];
			$data['exam_subject_question_answer'] = $row['exam_subject_question_answer'];
			
		}

		$object->query = "
		SELECT * FROM question_option 
		WHERE exam_subject_question_id = '".$_POST["exam_subject_question_id"]."'
		";

		$result = $object->get_result();

		foreach($result as $row)
		{
			$data['option_title_'.$row["question_option_number"].''] = $row["question_option_title"];
		}

		

		echo json_encode($data);
	}

	if($_POST["action"] == 'Edit')
	{
		$error = '';

		$success = '';

		// print_r($_POST);
		// exit;
		$data = array(
			':syllabus_id'					=>	$_POST["syllabus_id"],
			':term_id'				        =>	$_POST["term_id"],
			':paper_id'				        =>	$_POST["paper_id"],
			':exam_subject_question_title'	=>	$_POST["exam_subject_question_title"],
			':exam_subject_question_answer'	=>	$_POST["exam_subject_question_answer"]
		);

		$object->query = "
		UPDATE exam_subject_question 
		SET syllabus_id = :syllabus_id, 
		term_id = :term_id,
		paper_id = :paper_id, 
		exam_subject_question_answer = :exam_subject_question_answer,     
		exam_subject_question_title = :exam_subject_question_title
		WHERE exam_subject_question_id = '".$_POST['hidden_id']."'
		";

		$object->execute($data);

		for($count = 1; $count <= 4; $count++)
		{
			$data = array(
				':exam_subject_question_id'		=>	$_POST['hidden_id'],
				':question_option_number'		=>	$count,
				':question_option_title'		=>	$object->clean_input($_POST['option_title_' . $count])
			);

			$object->query = "
			UPDATE question_option 
			SET question_option_title = :question_option_title 
			WHERE exam_subject_question_id = :exam_subject_question_id 
			AND question_option_number = :question_option_number
			";
				
			$object->execute($data);
		}

		$success = '<div class="alert alert-success">Exam Subject Question Data Updated</div>';
		
		$output = array(
			'error'		=>	$error,
			'success'	=>	$success
		);

		echo json_encode($output);

	}

	if($_POST["action"] == 'delete')
	{
		$object->query = "
		DELETE FROM exam_subject_question_soes 
		WHERE exam_subject_question_id = '".$_POST["id"]."'
		";

		$object->execute();

		$object->query = "
		DELETE FROM question_option_soes 
		WHERE exam_subject_question_id = '".$_POST["id"]."'
		";

		echo '<div class="alert alert-success">Exam Subject Question Data Deleted</div>';
	}

	if($_POST["action"] == 'select_qustion_term')
	{

		$object->query = " SELECT * FROM `tbl_term_master` WHERE syllabus_id  = '".$_POST["syllabus_id"]."' ";

        $result = $object->get_result();
		echo '<option value="0" >Select term</option>';
		foreach($result as $row)
		{
			echo '<option value="'.$row['id'].'">'.$row['term'].'</option>';
		}


	}
	if($_POST["action"] == 'select_paper')
	{
      // echo "SELECT * FROM `tbl_paper_master` term_id = '".$_POST["term_id"]."'";
		$object->query = " SELECT * FROM `tbl_paper_master` WHERE term_id = '".$_POST["term_id"]."' ";

        $result = $object->get_result();
        echo '<option value="0" >Select Paper</option>';
		foreach($result as $row)
		{
			echo '<option value="'.$row['id'].'">'.$row['paper_code'].'-'.$row['title'].'</option>';
		}


	}		


}

?>