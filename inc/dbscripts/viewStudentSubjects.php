<?php

include('connection.php');


echo '
<form method="POST" action="">
    <table>
    <tr><th colspan="2"> Student Details</th></tr>
    <tr>       <td>ID</td>         <td><input type="text" name="code" placeholder="Subject code" value="'.@$code.'"/></td></tr>
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
';


?>