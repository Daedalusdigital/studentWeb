<?php include('inc/main.header.php');?>
<?php

if(@$_POST['submit'] === "Add Subject"){
    
    $code = @$_POST['code'];      
    $name = @$_POST['name'];      
    $grade = @$_POST['grade'];

    
    if($grade !== "<--select grade -->"){
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
        <tr><th colspan="2"> Add Subject</th></tr>
        <tr>       <td>Code :</td>         <td><input type="text" name="code" placeholder="Subject code" value="'.@$code.'"/></td></tr>
        <tr>       <td>Name :</td>         <td><input type="text" name="name" placeholder="Subject Name" value="'.@$name.'"/></td></tr>
        <tr>       <td>Grade :</td>               <td><select name="grade" style="width:100%; value="'.@$grade.'"">
                                                    <option value="<--select grade -->"><--select grade --></option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                                                                               </td></tr>
       <tr>       <td colspan="2"><input type="submit" name="submit" value="Add Subject" /></td></tr>
        </table>
    </form>
    </div>
';

?>