<?php
    //使用sql命令获取数据并展示
    $mysqli_result = $conn->query($sql);
    
    //如果有报错显示
    echo $conn->error;
    
    echo "<br/>";
    //显示查询结果的属性
    echo "<table>\n<tr>";  //表格
    while ($field = $mysqli_result->fetch_field()) {
        echo "<th>$field->name</th>";    //$field的name属性
    }
    echo "</tr>\n";
    
    //显示查询结果的内容
    $ans_count = 0;
    while($ans = $mysqli_result->fetch_row()) {
    	$ans_count++;
        echo "<tr>";
        foreach($ans as $one)
    		if ($one == "null") {
    			echo "<th> </th>";
    		}
            else echo "<th>$one</th>";
        echo "</tr>\n";
    }
    echo "</table>";
    echo "总共查询到".$ans_count."条数据";
    $mysqli_result->close();
    
    //关闭数据库
    mysqli_close($conn);
?>
