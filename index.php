<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="Liuyan.css" >
<style type="text/css"> 
.must {color:#FF0004}
div {padding: 0px 0em 0ex 23%;
color:#FF0004;}
</style>
<title>留言板</title>
</head>

<body>
<?php

echo $time_1;
$flag=0;
$yemian="index.php";
$name=$message="";
$nameErr=$messageErr=$emailErr="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST['name']))
	{
		$nameErr="请填写姓名...";
		$flag=0;
	}
	else
	{
		$name = test_input ($_POST['name']);
		$flag=1;
	}
	if (!empty($_POST["email"]))
	{
   		 $email = test_input($_POST["email"]);
   		 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) 
		{
   		   $emailErr = "请填写有效的E-mail地址...";
		   $flag=0; 
  		}
	}
	if(empty($_POST['message']))
	{
		$messageErr="请填写留言...";
		$flag=0;
	}
	else
	{
		$message = test_input ($_POST['message']);
	}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if ($flag==1)
{
	$yemian="input.php";
	
}
?>


<form action="<?php echo $yemian?>" method="post" class="basic-grey">
<h1>留言板
<span>请输入您的留言.<span class="must">&nbsp;&nbsp;&nbsp;输入框前有*为必填 </span></span>
</h1>

<label>
<span>您的姓名 :<span class="must">*</span></span>
<input id="name" type="text" name="name"  value="<?php echo $name;?>" placeholder="请输入您的姓名..." value="<?php echo $name;?>" />
</label>
<div style="text-align: inherit" class="must"><?php echo $nameErr;?></div>
<label>
<span>您的邮箱 :</span>
<input id="email" type="email" name="email" placeholder="请输入邮箱地址..." value="<?php echo $email;?>"/>
</label>
<div class="must"  align="50%"><?php echo $emailErr;?></div>
<label>
<span>您的留言 :<span class="must">*</span></span>
<textarea id="message" name="message" placeholder="请输入您的留言..."><?php echo $message ?></textarea>
</label>
<div class="must" ><?php echo $messageErr;?></div>
<label>
<span>&nbsp;</span>
<input type="submit"  class="button" value="提交" />
<input type="button"  class="button"  onClick="window.open('all.php')" value="查看其它人的留言" />
</label>
</form>



</body>
</html>
