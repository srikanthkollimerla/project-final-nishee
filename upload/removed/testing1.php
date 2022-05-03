<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-chosen.css">
<style>
ul{
	overflow: scroll;
	width:100%;
	min-height:93.99vh;
	    max-height:95vh;
		display: -webkit-box;
display: -ms-flexbox;
display: block;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
padding-left: 0;
margin-bottom: 0;
}
ul li{
	list-style:none;
	width:100%;
    padding: .15rem .25rem;
	white-space: nowrap;
    
}

.treestruct{
	    min-height:93.99vh;
	    max-height:98vh;
	    
		
}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
<div class="treestruct">
<ul style="">
<li value="0"><span class="fa fa-folder" level="0"  onclick="treextract(this,'n0')"></span> Project</li>

</ul>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min1.js"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<script type="text/javascript">

function hidelevels(cls)
{
	var x = document.getElementsByClassName('n'+cls);
    var i;
	var v="";
	
	
	//	$('.n'+cls).remove();
    for (i = 0; i < x.length; i++) {
    v=x[i].getAttribute("value");
	     hidelevels(v);
	  $('.n'+v).remove();
	  console.log('.n'+v);
	}
	$('.n'+cls).remove();
	
}
function treextract(e,cls){
	$(e).removeClass("fa-folder");
	$(e).addClass("fa-folder-open");
	$(e).attr("onclick","treecompress(this,'"+cls+"')");
	var level=1;
	level+=parseInt($(e).attr("level"));
	var delimit="";
	for(var j=0;j<(3*level);j++)
	{
		delimit+="&nbsp;";
	}
	var str="";
	var pid=cls.substr(1);
		$.ajax({
		url:'testing1a.php',
		type:'post',
		dataType:'json',
		data:{pid:pid},
		success:function(d)
		{
			var fawe="";
			var caction="";
			for(var i=0;i<(d.length);i++)
			{	
		        if(d[i].p_type.substr(0,1)=="A")
				{
					fawe="fa fa-folder";
					caction='onclick="treextract(this,\'n'+d[i].id+'\')"';
				}
				else if(d[i].p_type=="FA"){
					fawe="fa fa-folder";
					caction='onclick="treextract(this,\'n'+d[i].id+'\')"';
				}
				else if(d[i].p_type=="FP"){
					fawe="fa fa-facebook";
				}
				else if(d[i].p_type=="BP"){
					fawe="fa fa-bold";
				}
			    str+='<li class="n'+d[i].pid+'" value="'+d[i].id+'" >'+delimit+'<span level="'+level+'" class="'+fawe+'"    '+caction+'   ></span>&nbsp;&nbsp;'+d[i].description+'</li>';	
			}
			$(e).parent().after(str);
		}
		
		
	});
}
function treecompress(e,cls){
	$(e).removeClass("fa-folder-open");
	$(e).addClass("fa-folder");
	$(e).attr("onclick","treextract(this,'"+cls+"')");
	hidelevels($(e).parent().attr("value"));

}
</script>
</body>
</html>