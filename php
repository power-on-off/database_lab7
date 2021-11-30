<!DOCTYPE html>
<html lang = "zh-CN">
<link rel = "stylesheet" type = "text/css" href = "style.css">
<head>
  <meta charset = "utf-8">
  <title>19334017数据库实验7 题目1</title>
</head>
<body>
    <div class = "footer">
        <?php 
        //放个头部的链接区
        require("head.html"); 
        ?>
    </div>
    
    <div class = "container">
        <h2>题目一：查询学生信息</h2>
        <h4>Accept a roll number, and display the following data about the student: name, department, and all courses taken, in tabular form: list the course id, title, credits and grade (show a blank if the grade is null).</h4>
        <h4>接受学号，并以表格形式显示有关学生的以下数据：姓名、系和所修的所有课程：列出课程id、标题、学分和成绩（如果成绩为空，则显示空白）</h4>
        <h4>实验展示：(实验采用的是小数据，为了有结果显示，可以输入00128，12345，45678，98988等已经存在的学生ID)，其中学号98988的 BIO-301 课程成绩为 null </h4>
        <br></br>

        <form action = "" method = "get">请输入想查询的学生ID:<input type = "text" name = "word_input" />
	    <input type = "submit" value = "点击进行数据库查询" />
        </form>
        <br></br>
        
        <?php
            //判断输入是否合法
            if(!($_GET["word_input"])){
            	exit();  //如果没有数据则退出
            } 
            	
            $ID_input = $_GET['word_input'];
            //连接数据库的php
            include 'mysql_connect.php';
 
            echo "以下是对学生ID：  ".$ID_input."  的查询结果";
            //具体查询(使用ID_input进行查询)
            $sql = "select s.ID, s.name, s.dept_name, t.course_id, c.title, c.credits, t.grade 
                    from student as s, takes as t, course as c
                    where s.ID = t.ID and c.course_id = t.course_id and s.ID = '".$ID_input."'";
                    
            //使用$sql执行并展示数据
            include 'sql_execute.php';
        ?>
    </div>
</body>
</html>
