<!DOCTYPE html>
<html lang = "zh-CN">
<link rel = "stylesheet" type = "text/css" href = "style.css">
<head>
  <meta charset = "utf-8">
  <title>19334017数据库实验7 题目4</title>
</head>
<body>
    <div class = "footer">
        <?php 
        //放个头部的链接区
        require("head.html"); 
        ?>
    </div>
    
    <div class = "container">
        <h2>题目四：添加新学生（旧版）</h2>
        <h4>Take a roll number, name and department name, and insert a new student record with tot_creds set to 0. Make sure you catch exceptions and report them (and test it with an incorrect department name, to see what happens when a foreign key constraint is violated, and similarly with a duplicate roll number, to see what happens when a primary key constraint is violated). Make sure also to close connections, even if there is an exception.</h4>
        <h4>获取ID、姓名和系名，并插入tot_creds设置为0的新学生记录。确保捕获异常并报告它们（并使用不正确的部门名称对其进行测试，以查看违反外键约束时会发生什么情况，同样，使用重复的卷号，以查看违反主键约束时会发生什么情况）。即使出现异常，也要确保关闭连接。</h4>
        <br></br>
        <form action = "" method = "get">
            <strong>防止页面滥用，请输入特定口令:</strong>
        	<input type = "text" name = "Pass" />
        	<br></br>
        	请输入ID:
        	<input type = "text" name = "ID_input" />
        	<br></br>
        	请输入姓名:
        	<input type = "text" name = "name_input" />
        	<br></br>
        	请输入系名:
        	<input type = "text" name = "dept_input" />
        	<br></br>
        	<input type = "submit" value = "点击插入新学生" />
        </form>
        <br></br>
        <?php	
            //判断输入是否合法
            if($_GET["Pass"] != "syw"){
            	echo "请输入正确的口令";
            	exit();  //如果没有数据则退出
            } 
            
            if(!($_GET["ID_input"])){
            	echo "没有输入学生的ID";
            	exit();  //如果没有数据则退出
            } 
            if(!($_GET["name_input"])){
            	echo "没有输入学生的姓名";
            	exit();  //如果没有数据则退出
            } 
            
            if(!($_GET["dept_input"])){
            	echo "没有输入学生的部门";
            	exit();  //如果没有数据则退出
            } 
            $ID_input = $_GET['ID_input'];
            $name_input = $_GET['name_input'];
            $dept_input = $_GET['dept_input'];
            
            //连接数据库返回$conn
            include 'mysql_connect.php';
            echo "以下是具体结果<br></br>";
            

            //具体查询(插入新学生记录)
            $sql = "insert into student values('".$ID_input."','".$name_input."','".$dept_input."','0')";
            echo ("具体使用的sql为<br></br>".$sql);
            $mysqli_result = $conn->query($sql);
            //如果有报错显示
            echo "<br></br>".$conn->error;
            
            if ($mysqli_result == TRUE) {
            	echo "<h1>学生数据插入成功</h1>";
            } else echo "<h1>学生数据插入失败</h1>";
            
            //关闭数据库
            mysqli_close($conn);
        ?>
    </div>
</body>
</html>
