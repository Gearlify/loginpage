
$host="sql309.infinityfree.com";
$user="if0_38369159";
$pass="YgcpAy5B26dH6ba";
$db="if0_38369159_loginpage";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>
