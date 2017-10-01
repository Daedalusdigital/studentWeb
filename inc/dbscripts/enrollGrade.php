<?php
include("connection.php");


//USER REGISTRATION

if(@$_POST['submit'] === "Enroll Grade"){
    
    $student = @$_POST['student'];      
    $grade = @$_POST['grade'];  

/*
     echo "Student ID : ". $student."</br>
              Subject Code : ". $subject."</br>
             ";
 */      
    if($student !== "<--select student -->"){
        if($grade !== "<--select grade -->"){
            
            $sql = "SELECT *
                        FROM usergrade 
                            WHERE user_number = '".$student."' AND grade = '".$grade."' LIMIT 1";
            
            $results = $conn->query($sql);
            
            if($results->num_rows > 0){
                echo "student already enrolled on this grade";
            }
            else{
                $sql ="INSERT INTO usergrade VALUES('','$student','$grade')";
                $conn->query($sql);
                echo "student was successfully enrolled";
            }
            
            $student = "<--select student -->";
            $grade = "<--select grade -->";
        }
        else{
            echo "grade not selected.Please select to continue";
        }
    }else{
        echo "student not selected.Please select to continue";
    }
}

echo '
    <form method="POST" action="">
        <table>
        <tr><th colspan="2"> Enroll User to Grade</th></tr>
        <tr>       <td>User :</td>            <td><select name="student" style="width:100%; value="'.@$student.'"">
                                                    <option value="<--select student -->"><--select student --></option>
                                                    ';
                                                    $SelectStudentSql = "SELECT *
                                                                FROM users";
                                                                    
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
      <tr>       <td>Subjct :</td>            <td><select name="grade" style="width:100%; value="'.@$grade.'"">
                                                    <option value="<--select grade -->"><--select grade --></option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>                                             </td></tr>
       <tr>       <td colspan="2"><input type="submit" name="submit" value="Enroll Grade" /></td></tr>
        </table>
    </form>
';

?>