<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Course - Let's Teach</title>

<?php
	include('header.php');
?>

<body>

<?php
	include('menu.php');
?>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Courses</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span>Courses</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
	<!--  End header section-->


<?php
if(isset($unseen))
{
	foreach ($unseen as $key) 
	{
?>
	<a onclick="abc(<?= $key->userID ?>)"><?= $key->username?></a>
<?php
	}
}		
?>

<div id="chatbox" style="height: 500px;width: 500px;border-style: ridge;border-color: black">
	
</div>

<input type="text" id="msg" name=""><input type="button" value="add Message" onclick="addMsg()" name="">

<script type="text/javascript">
	/*function abc(id)
	{
		alert(id);
	}*/
$(document).ready(function(){
    $("#subjectDisplay").click(function(){
        $("#subject").slideToggle(500);
    });
});
var userID=null;
	      function loadChat()
	      {
	  //alert("nacho");
	         var url=" <?php echo site_url('/Message_c/get_user_chat/');?>"+userID;
	         var ReqObj=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
                ReqObj.open("GET",url,true);
                ReqObj.send();
                ReqObj.onreadystatechange=function()
                {
	                 if(ReqObj.readyState==4 && ReqObj.status==200)
	                 {	
	                    document.getElementById("chatbox").innerHTML=ReqObj.responseText;
					}
               	}

	      }
 /*function new_chat()
	      {
	  
	         var url=" <?php echo site_url('/Message_c/get_new_chat/');?>";
	         var ReqObj=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
                ReqObj.open("GET",url,true);
                ReqObj.send();
                ReqObj.onreadystatechange=function()
                {
	                 if(ReqObj.readyState==4 && ReqObj.status==200)
	                 {	
	                    document.getElementById("new_chat_list").innerHTML=ReqObj.responseText;
					}
               	}

	      }
*/
function abc(id)
{	
	//alert("abc");	
	userID=id;
	//alert(userID);
		setInterval(loadChat, 1000);
	
}
function addMsg()
		{
			
			var msg=document.getElementById("msg").value;
			var url=" <?php echo site_url('/Message_c/add_msgs/');?>"+encodeURIComponent(msg)+'/'+userID;
	         var ReqObj=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
                ReqObj.open("GET",url,true);
                ReqObj.send();

            $("msg").val("");    
             
		}
</script>

<?php
	include('footer.php');
?>