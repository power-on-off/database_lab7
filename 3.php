<!DOCTYPE html>
<html lang = "zh-CN">
<link rel = "stylesheet" type="text/css" href = "style.css">
<head>
  <meta charset="utf-8">
  <title>19334017数据库实验7 题目3</title>
</head>
<body>
    <div class = "footer">
        <?php 
        //放个头部的链接区
        require("head.html"); 
        ?>
    </div>
    
    <div class = "container">
        <h2>题目三：查找两次及以上不合格的学生</h2>
        <h4>Show all students with two or more fail grades; no need to show the courses they have failed, and I don't care if they passed the course subsequently.</h4>
        <h4>显示所有成绩2次及以上不合格的学生；不需要显示他们没有通过的课程，不在乎他们是否随后通过了课程。</h4>
        <br></br>
        
        <?php	
            //连接数据库
            include 'mysql_connect.php';
            echo "以下是查询结果";

            
            //具体查询(使用likes进行查询)
            $sql = "create temporary table not_pass
                select ID, course_id, grade
            	from takes as T
            	where grade = 'F'";
            $mysqli_result = $conn->query($sql);
            //如果有报错显示
            echo $conn->error;
            
            $sql = "select ID, name, dept_name
                    from not_pass natural left join student
                    group by not_pass.ID
                    having count(not_pass.ID) >= 2";
            //使用$sql执行并展示数据,数据量为$ans_count
            include 'sql_execute.php';
            
            echo "<br></br>总共有 ".$ans_count." 人2次及以上的不及格";
        ?>
     </div>
</body>
</html>
