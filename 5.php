<!DOCTYPE html>
<html lang = "zh-CN">
<link rel = "stylesheet" type = "text/css" href = "style.css">
<head>
  <meta charset = "utf-8">
  <title>19334017数据库实验7 题目5</title>
</head>
<body>
    <div class = "footer">
        <?php 
        //放个头部的链接区
        require("head.html"); 
        ?>
    </div>
    
    <div class = "container">
        <h2>题目五：添加新学生或新老师（下拉版）</h2>
        <h4>Create form interfaces to insert records for the student and instructor tables, with a drop-down menu for the department name, showing all valid department names. As before, exceptions should be caught and reported. </h4>
        <h4>作业的这一部分说明了创建生成 HTML 的函数而不是直接编写它是多么有用。创建表单界面以插入学生和教师表的记录，并带有系名称的下拉菜单，显示所有有效的系名称。和以前一样，异常应该被捕获和报告。</h4>
        <br></br>

        <form action = "" method = "post">
            <strong>防止页面滥用，请输入特定口令:</strong>
        	<input type = "text" name = "Pass" />
        	<br></br>
        	请输入ID:
        	<input type = "text" name = "ID_input" />
        	<br></br>
        	请输入姓名:
        	<input type = "text" name = "name_input" />
        	<br></br>
        	请选择所在系:
        	
            <select name = "select_dept">
                <option value = "0">请选择</option>
                
            <?php
                //连接数据库返回$conn
                include 'mysql_connect.php';
                $sql_op = "select dept_name from department";
                $mysqli_result = $conn->query($sql_op);  
                
                //<option value = "部门名">部门名</option>
                while($ans = $mysqli_result->fetch_row()) {
                    foreach($ans as $one) {
                        echo "<option value = \"".$one."\"".">";
                        echo $one;
                        echo "</option>\n";
                    }
                }
            ?>      
            </select>  
        	
        	<br></br>
        	 请输入教师的工资（添加教师时使用）
        	<input type = "text" name = "salary_input" />
        	<br></br>
        	<input type = 'submit' name = 'submit' value = '添加新学生'/>
        	<input type = 'submit' name = 'submit' value = '添加新教师'/>
        </form>
        <br></br>
        <?php	
            //判断输入是否合法
            if($_POST["Pass"] != "syw"){
            	echo "请输入正确的口令";
            	mysqli_close($conn);
            	exit();  //如果没有数据则退出
            } 
            
            if(!($_POST["ID_input"])){
            	echo "没有输入学生的ID";
            	mysqli_close($conn);
            	exit();  //如果没有数据则退出
            } 
            if(!($_POST["name_input"])){
            	echo "没有输入姓名";
            	mysqli_close($conn);
            	exit();  //如果没有数据则退出
            } 
            
            if($_POST['select_dept'] == "0"){
            	echo "没有选择部门";
            	mysqli_close($conn);
            	exit();  //如果没有数据则退出
            } 
            $ID_input = $_POST['ID_input'];
            $name_input = $_POST['name_input'];
            $dept_input = $_POST['select_dept']; 
            $salary_input = $_POST['salary_input'];
            $if_insert_salary =  "0";
            
            echo "以下是具体结果<br></br>";
            
            if ($_POST["submit"] == "添加新学生") {
                $insert_who = "student";
            }  
            if($_POST["submit"] == "添加新教师") {
                $insert_who = "instructor";
                if (!$salary_input) {
                 	echo "没有输入教师工资";
                	mysqli_close($conn);
                	exit();  //如果没有数据则退出                   
                }
                //mysql的check不起作用，所以这里增加判断进行约束
                if ((int)$salary_input <= 29000) {
                 	echo "教师工资输入有误,请输入大于29000的工资";
                	mysqli_close($conn);
                	exit();  //如果没有数据则退出                   
                }
                $if_insert_salary = $salary_input;
            }
            
            //具体查询(增添新学生或教师记录)
            $sql = "insert into ".$insert_who." values('".$ID_input."','".$name_input."','".$dept_input."','".$if_insert_salary."')";
            echo ("具体使用的sql为<br></br>".$sql);
            $mysqli_result = $conn->query($sql);
            //如果有报错显示
            echo "<br></br>".$conn->error;
            
            if ($mysqli_result == TRUE) {
            	echo "<h1>".$insert_who."数据添加成功</h1>";
            } else echo "<h1>".$insert_who."数据添加失败</h1>";
            
            //关闭数据库
            mysqli_close($conn);
        ?>
    </div>
</body>
</html>
