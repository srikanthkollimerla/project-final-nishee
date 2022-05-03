<?php
//fetch.php
$db1=$_POST['tab'];;
require "DB_connect.php";
$query = "
 SELECT id,pid,description FROM ".$db1."_parts where del_status=0 order by pid,description";
$result = mysqli_query($con1, $query);
//$output = array();
while($row = mysqli_fetch_array($result))
{
 $sub_data["id"] = $row[0];
 $sub_data["text"] = $row[2];
 $sub_data["parent_id"] = $row[1];
 $sub_data["state"]=array("expanded"=>true);
 $data[] = $sub_data;
}
foreach($data as $key => &$value)
{
 $output[$value["id"]] = &$value;
}
foreach($data as $key => &$value)
{
 if($value["parent_id"] && isset($output[$value["parent_id"]]))
 {
  $output[$value["parent_id"]]["nodes"][] = &$value;
 }
}
foreach($data as $key => &$value)
{
 if($value["parent_id"] && isset($output[$value["parent_id"]]))
 {
  unset($data[$key]);
 }
}
echo json_encode($data);
/*echo '<pre>';
print_r($data);
echo '</pre>';*/

?>