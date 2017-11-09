<html>

<head>
<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
</head>

<body>

<ul>
    <li><a href="oneFileStyle.php"><strong>Home</strong></a></li>
<li><a href="oneFileStyle.php?content=passwordAction"><strong>User/Password</strong></a></li>
  
  <!-- <li><a href="oneFileStyle.php?content="><strong>Calculate Age</strong></a></li>  -->
 
</ul>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <?php
             if (!isset($_REQUEST['content']))
                echo "<h1>Running Two PHP scripts At Once!</h1>";
             else
             {
                $content = $_REQUEST['content'];
                $nextpage = $content . ".php";
                include($nextpage);
             }
           ?>
		   </div>


</body>
</html>