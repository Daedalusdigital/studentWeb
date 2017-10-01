<?php
include("connection.php");


//USER REGISTRATION

if(@$_POST['submit'] === "Enroll"){
    
    $teacher = @$_POST['teacher'];      
    $subject = @$_POST['subject'];  

/*
     echo "teacher ID : ". $teacher."</br>
              Subject Code : ". $subject."</br>
             ";
 */      
    if($teacher !== "<--select teacher -->"){
        if($subject !== "<--select subject -->"){
            
            $sql = "SELECT *
                        FROM studentsubject 
                            WHERE user_number = '".$teacher."' AND subject_code = '".$subject."' LIMIT 1";
            
            $results = $conn->query($sql);
            
            if($results->num_rows > 0){
                echo "teacher already enrolled on this subject";
            }
            else{
                $sql ="INSERT INTO studentsubject VALUES('','$teacher','$subject')";
                $conn->query($sql);
                echo "teacher was successfully enrolled";
            }
            
            $teacher = "<--select teacher -->";
            $subject = "<--select subject -->";
        }
        else{
            echo "subject not selected.Please select to continue";
        }
    }else{
        echo "teacher not selected.Please select to continue";
    }
}
echo '
    <form method="POST" action="">
        <table>
        <tr><th colspan="2"> Enroll teacher to Subject</th></tr>
        <tr>       <td>teacher :</td>            <td><select name="teacher" style="width:100%; value="'.@$teacher.'">
                                                    <option value="<--select teacher -->"><--select teacher --></option>
                                                    ';
                                                    $SelectteacherSql = "SELECT *
                                                                FROM users 
                                                                    WHERE role = 'Teacher'";
                                                                    
                                                    $teacherResults = $conn->query($SelectteacherSql);
                                                    while($row = $teacherResults->fetch_assoc()){
                                                        $idnumber = $row["user_number"];
                                                        $firstname = $row['firstname'];
                                                        $lastname = $row['lastname'];
                                                        $finit = substr($firstname,0,1);
                                                        echo '<option value="'.$idnumber.'">'.$idnumber.' '.$finit.' '.$lastname.'</option>';
                                                    }
                                                    echo '
                                                </select>                                               </td></tr>
      <tr>       <td>Subject :</td>            <td><select name="subject" style="width:100%; value="'.@$subject.'">
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
       <tr>       <td colspan="2"><input type="submit" name="submit" value="Enroll" /></td></tr>
        </table>
    </form>
';

?>