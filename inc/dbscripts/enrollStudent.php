<?php
include("connection.php");


//USER REGISTRATION

if(@$_POST['submit'] === "Enroll"){
    
    $student = @$_POST['student'];      
    $subject = @$_POST['subject'];  

/*
     echo "Student ID : ". $student."</br>
              Subject Code : ". $subject."</br>
             ";
 */      
    if($student !== "<--select student -->"){
        if($subject !== "<--select subject -->"){
            
            $sql = "SELECT *
                        FROM studentsubject 
                            WHERE user_number = '".$student."' AND subject_code = '".$subject."' LIMIT 1";
            
            $results = $conn->query($sql);
            
            if($results->num_rows > 0){
                echo "student already enrolled on this subject";
            }
            else{
                $sql ="INSERT INTO studentsubject VALUES('','$student','$subject')";
                $conn->query($sql);
                echo "student was successfully enrolled";
            }
            
            $student = "<--select student -->";
            $subject = "<--select subject -->";
        }
        else{
            echo "subject not selected.Please select to continue";
        }
    }else{
        echo "student not selected.Please select to continue";
    }
}
echo '
    <form method="POST" action="">
        <table>
        <tr><th colspan="2"> Enroll Student to Subject</th></tr>
        <tr>       <td>Student :</td>            <td><select name="student" style="width:100%; value="'.@$student.'">
                                                    <option value="<--select student -->"><--select student --></option>
                                                    ';
                                                    $SelectStudentSql = "SELECT *
                                                                FROM users 
                                                                    WHERE role = 'Student'";
                                                                    
                                                    $StudentResults = $conn->query($SelectStudentSql);
                                                    while($row = $StudentResults->fetch_assoc()){
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