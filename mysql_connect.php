<?php
    //数据库连接部分
	
	/*请使用给予的数据库账号密码*/
    $servername = "42.194.140.67";      //mysql服务器主机地址
    $username = "syw_lab7";             //mysql用户名
    $password = "";                     //mysql密码
     
	 
    // 创建连接
    $conn = new mysqli($servername, $username, $password);
    
    // 检测是否连接
    if ($conn->connect_error) {
        die("数据库连接失败: " . $conn->connect_error);
    } 
    else {
    	echo "成功连接上数据库";
    }
    echo "<br></br>";
    //设置字符编码
    $conn->set_charset('utf8');
    
    //使用数据表为syw_lab7	
    $conn->select_db("syw_lab7");
?>
