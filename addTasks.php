<?php include('inc/main.header.php');?>
<?php

if(@$_POST['submit'] === "Add Tasks"){
    
    $code = @$_POST['code'];      
    $name = @$_POST['name'];      
    $grade = @$_POST['grade'];

    
    if($grade !== "<--select subjectcode -->"){
            /*
             echo "Code : ". $code."</br>
              Name : ". $name."</br>
              Grade : ". $grade."</br>
             ";
            */
            
            $sql = "SELECT *
                        FROM subjects 
                            WHERE subject_code = '".$code."' LIMIT 1";
            
            $results = $conn->query($sql);
            
            if($results->num_rows > 0){
                echo "subject already exists";
            }
            else{
                $sql ="INSERT INTO subjects VALUES('','$code','$name','$grade')";
                $conn->query($sql);
                echo "subject was successfully added";
            }
            
            $code = $name =  " ";
            $grade = "<--select grade -->";
    }
    else{
         echo "grade not selected.Please select to continue";
    }
}

echo '
<div class="content">
    <form method="POST" action="" style="border:none;">
        <table>
        <tr><th colspan="2"> Add Task</th></tr>
        <tr>       <td>Task Name </td>         <td><input type="text" name="task_header" placeholder="Task Header" value="'.@$taskHeader.'"/></td></tr>
        <tr>       <td>Description </td>         <td><input type="text" name="name" placeholder="Description" value="'.@$description.'"/></td></tr>
        <tr>       <td>Date Due</td>               <td><input style="width:100%;padding-left:20px;" type="date" name="dueDate"></td></tr>
        <tr>       <td>Grade </td>               <td><select name="grade" style="width:100%;" value="'.@$grade.'"">
                                                            <option value="<--select grade -->"><--select grade --></option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                                                         </td></tr>
                                                                                         <tr>       <td>Subject </td>            <td><select name="subject" style="width:100%;" value="'.@$subject.'">
                                                                                         <option value="<--select subject -->"><--select subject --></option>
                                                                                         ';
                                                                                         $SelectSubjectsSql = "SELECT *
                                                                                                     FROM subjects ";
                                                                                                         
                                                                                         $SubjectsResults = $conn->query($SelectSubjectsSql);
                                                                                         while($row = $SubjectsResults->fetch_assoc()){
                                                                                             $subject_id = $row["subject_id"];
                                                                                             $subject_code = $row['subject_code'];
                                                                                             $subject_name = $row['subject_name'];
                                                                                             $subject_grade = $row['subject_grade'];
                                                                                             echo '<option value="'.$subject_code.'">'.$subject_name.' '.$subject_grade.'</option>';
                                                                                         }
                                                                                         echo '
                                                                                     </select>                                               </td></tr>
        <tr>       <td colspan="2"><input type="submit" name="submit" value="Add Tasks" /></td></tr>
        </table>
    </form>
    </div>
';

?>