<!DOCTYPE html>
<html lang="zh-CN">
<link rel="stylesheet" type="text/css" href="style.css">
<head>
  <meta charset="utf-8">
  <title>19334017数据库实验7 题目2</title>
</head>
<body>
    <div class = "footer">
        <?php 
        //放个头部的链接区
        require("head.html"); 
        ?>
    </div>
    
    <div class="container">
        <h2>题目二：课程模糊查询</h2>
        <h4>Accept a word, and find all courses whose title contains that word</h4>
        <h4>接受一个单词，并查找其标题包含该单词的所有课程</h4>
        <h4>实验展示：(实验采用的是小数据，为了有结果显示，可以输入S，A等方便查找出，如果输入为空则是显示所有课程)</h4>
        <br></br>
        
        <form action = "" method = "get">请输入想查找的课程标题:<input type = "text" name = "word_input" />
        	<input type = "submit" value = "点击进行数据库查询" />
        </form>
        <br></br>

        <?php	
            $Text_input = $_GET['word_input'];
            //连接数据库
            include 'mysql_connect.php';
            echo "以下是对课程标题：  ".$Text_input."  的查询结果";
            
            
            //具体查询(使用likes进行查询)
            $sql = "select*from course where course.title like '%".$Text_input."%'";
            
            //使用$sql执行并展示数据
            include 'sql_execute.php';
        ?>
    </div>
</body>
</html>
