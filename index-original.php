<?php
session_start();
if(!empty($_GET['productid'])){
$_SESSION['productid'] = $_GET['productid'];
}
if($PROOF!="Y") {
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
}
?>
<!DOCTYPE html>
<html>
<head>
<?php
/*****config*****/
include "../_includes/config.php";
$base_url=$domain."apps/european-license-plate/";

$PID = $_GET['productid'];
//meta description and in app help content
$help_content="These are authentic style embossed Custom European License Plates. Your plate is custom made using genuine German equipment. Tap or click away to create your own customized European License Plate using this convenient app!"; 
?>
<meta charset="UTF-8">
<meta name="description" content="<?php echo $help_content; ?>">
<title>European Custom License Plate</title>
<style>
  #animation_container, #_preload_div_ {
	position:absolute;
	margin:auto;
	left:0;right:0;
  }
</style>
<?php

if(isset($_GET['PROOF'])) {
    	$PROOF=$_GET['PROOF'];
	}
if($PROOF=="Y") {
	//include "../../plates/_Y/".$ST.".php";
	$cur_year=date('Y');
}else{
	$PROOF="N";
	$cur_year=date('Y');
		if(isset($_GET['SN'])) {
    		if(isset($_GET['productid'])){
				$SN22 = $_GET['productid']."-".trim($_GET['SN'],'-');
				$SN = trim($SN22,'-');
			}else{
				$SN = trim($_GET['SN'],'-');
			}
			if ($SN=="") {
				$SN=time();
	  			$SN222 = $PID."-".$SN;
				$SN = trim($SN222,'-');
			}
		}else{
			$SN=time();
	  		$SN33 = $PID."-".$SN;
			$SN = trim($SN33,'-');
		}
}

	if(isset($_GET['KT'])) {
    	$KT=$_GET['KT'];
	}else{
	  	$KT= "0";
	}
	if(isset($_GET['ID'])) {
    	$ID=$_GET['ID'];
	}else{
	  	$ID= "0";
	}
	if(isset($_GET['BF'])) {
    	$BF=$_GET['BF'];
	}else{
	  	$BF= "0";
	}
	if(isset($_GET['CF'])) {
    	$CF=$_GET['CF'];
	}else{
	  	$CF= "0";
	}

	/**/
	if(isset($_GET['pr'])) {
    	$pr="y";
	}else{
		$pr="";
	}
	if(isset($_GET['EM'])) {
    	$EM=$_GET['EM'];
	}else{
	}
	if(isset($_GET['TXT'])) {
    	$TXT=$_GET['TXT'];
	}else{
	}
	if(isset($_GET['plate_color'])) {
    	$plate_color=$_GET['plate_color'];
	}else{
	}
	if(isset($_GET['type'])) {
    	$type=$_GET['type'];
	}else{
	}
	if(isset($_GET['T_color'])) {
    	$T_color=$_GET['T_color'];
	}else{
	}
	if ($type=="") {
		$type="euro";
	}
	if ($EM=="") {
		$EM="D";
	}
	if ($plate_color=="") {
		$plate_color="White";
	}
	if ($T_color==""){
		$T_color="black";
	}
	$cur_year=date('Y');
    echo "<script>\n";
	echo "var PROOF = ".json_encode($PROOF).";\n";
	echo "var help_content = ".json_encode($help_content).";\n";
	echo "var license = ".json_encode($license).";\n";
	echo "var cur_year = ".json_encode($cur_year).";\n";
	echo "var SN = ".json_encode($SN).";\n";
	echo "var EM = ".json_encode($EM).";\n";
	echo "ID = ".json_encode($ID).";\n";
	echo "KT = ".json_encode($KT).";\n";
	echo "BF = ".json_encode($BF).";\n";
	echo "CF = ".json_encode($CF).";\n";
	echo "var type = ".json_encode($type).";\n";
	echo "var TXT = ".json_encode($TXT).";\n";
	echo "var plate_color = ".json_encode($plate_color).";\n";
	echo "var T_color = ".json_encode($T_color).";\n";
	echo "var base_url = ".json_encode($base_url).";\n";
	echo "var cart_url_base = ".json_encode($cart_url_base).";\n";
	echo "var pr = ".json_encode($pr).";\n";
	
		if ($TXT[0]!= ""){
					$pp1="t".$TXT[0];			
					if($pp1=="t-"){
						$pp1="tDASH";
					}else if($pp1=="t,"){
						$pp1="tUMa";
					}else if($pp1=="t."){
						$pp1="tUMo";
					}else if($pp1=="t!"){
						$pp1="tUMu";
					}else if($pp1=="t*"){
						$pp1="tSPACE";
					}			
			echo "var pp1 = ".json_encode($pp1).";\n";
		}else{
			echo "var pp1=\"\";"."\n";
		}
			
			
		if ($TXT[1]!= ""){
			$pp2="t".$TXT[1];
			if ($pp2=="t-"){
				$pp2="tDASH";
			}else if($pp2=="t,"){
				$pp2="tUMa";
			}else if($pp2=="t."){
				$pp2="tUMo";
			}else if($pp2=="t!"){
				$pp2="tUMu";
			}else if($pp2=="t*"){
						$pp2="tSPACE";
					}
			echo "var pp2 = ".json_encode($pp2).";\n";
		}else{
			echo "var pp2=\"\";"."\n";
		}		
		if ($TXT[2]!=""){
			$pp3="t".$TXT[2];
			if ($pp3=="t-"){
				$pp3="tDASH";
			}else if($pp3=="t,"){
				$pp3="tUMa";
			}else if($pp3=="t."){
				$pp3="tUMo";
			}else if($pp3=="t!"){
				$pp3="tUMu";
			}else if($pp3=="t*"){
						$pp3="tSPACE";
					}
			echo "var pp3 = ".json_encode($pp3).";\n";
		}else{
			echo "var pp3=\"\";"."\n";
		}
		if ($TXT[3]!=""){
			$pp4="t".$TXT[3];
			if ($pp4=="t-"){
				$pp4="tDASH";
			}else if($pp4=="t,"){
				$pp4="tUMa";
			}else if($pp4=="t."){
				$pp4="tUMo";
			}else if($pp4=="t!"){
				$pp4="tUMu";
			}else if($pp4=="t*"){
						$pp4="tSPACE";
					}
			echo "var pp4 = ".json_encode($pp4).";\n";
		}else{
			echo "var pp4=\"\";"."\n";
		}
		if ($TXT[4]!=""){
			$pp5="t".$TXT[4];
			if ($pp5=="t-"){
				$pp5="tDASH";
			}else if($pp5=="t,"){
				$pp5="tUMa";
			}else if($pp5=="t."){
				$pp5="tUMo";
			}else if($pp5=="t!"){
				$pp5="tUMu";
			}else if($pp5=="t*"){
						$pp5="tSPACE";
					}
			echo "var pp5 = ".json_encode($pp5).";\n";
		}else{
			echo "var pp5=\"\";"."\n";
		}
		if ($TXT[5]!=""){
			$pp6="t".$TXT[5];
			if ($pp6=="t-"){
				$pp6="tDASH";
			}else if($pp6=="t,"){
				$pp6="tUMa";
			}else if($pp6=="t."){
				$pp6="tUMo";
			}else if($pp6=="t!"){
				$pp6="tUMu";
			}else if($pp6=="t*"){
						$pp6="tSPACE";
					}
			echo "var pp6 = ".json_encode($pp6).";\n";
		}else{
			echo "var pp6=\"\";"."\n";
		}
		if ($TXT[6]!=""){
			$pp7="t".$TXT[6];
			if ($pp7=="t-"){
				$pp7="tDASH";
			}else if($pp7=="t,"){
				$pp7="tUMa";
			}else if($pp7=="t."){
				$pp7="tUMo";
			}else if($pp7=="t!"){
				$pp7="tUMu";
			}else if($pp7=="t*"){
						$pp7="tSPACE";
					}
			echo "var pp7 = ".json_encode($pp7).";\n";
		}else{
			echo "var pp7=\"\";"."\n";
		}
		if ($TXT[7]!=""){
			$pp8="t".$TXT[7];
			if ($pp8=="t-"){
				$pp8="tDASH";
			}else if($pp8=="t,"){
				$pp8="tUMa";
			}else if($pp8=="t."){
				$pp8="tUMo";
			}else if($pp8=="t!"){
				$pp8="tUMu";
			}else if($pp8=="t*"){
						$pp8="tSPACE";
					}
			echo "var pp8 = ".json_encode($pp8).";\n";
		}else{
			echo "var pp8=\"\";"."\n";
		}
		if ($TXT[8]!=""){
			$pp9="t".$TXT[8];
			if ($pp9=="t-"){
				$pp9="tDASH";
			}else if($pp9=="t,"){
				$pp9="tUMa";
			}else if($pp9=="t."){
				$pp9="tUMo";
			}else if($pp9=="t!"){
				$pp9="tUMu";
			}else if($pp9=="t*"){
						$pp9="tSPACE";
					}
			echo "var pp9 = ".json_encode($pp9).";\n";
		}else{
			echo "var pp9=\"\";"."\n";
		}
echo "</script>\n";
?>
<?php if($PROOF=="Y") { ?>
<script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
<script src="../../<?php echo $T_color ?>.js"></script>
<?php }else{ ?>
<script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
<script src="<?php echo $T_color ?>.js"></script>
<?php } ?>
<script>
var canvas, stage, exportRoot, anim_container, dom_overlay_container, fnStartAnimation;
function init() {
	canvas = document.getElementById("canvas");
	anim_container = document.getElementById("animation_container");
	dom_overlay_container = document.getElementById("dom_overlay_container");
	var comp=AdobeAn.getComposition("44AC8F3E9C26D34D93727BF6948A1B8C");
	var lib=comp.getLibrary();
	var loader = new createjs.LoadQueue(false);
	loader.addEventListener("fileload", function(evt){handleFileLoad(evt,comp)});
	loader.addEventListener("complete", function(evt){handleComplete(evt,comp)});
	var lib=comp.getLibrary();
	loader.loadManifest(lib.properties.manifest);
}
function handleFileLoad(evt, comp) {
	var images=comp.getImages();	
	if (evt && (evt.item.type == "image")) { images[evt.item.id] = evt.result; }	
}
function handleComplete(evt,comp) {
	//This function is always called, irrespective of the content. You can use the variable "stage" after it is created in token create_stage.
	var lib=comp.getLibrary();
	var ss=comp.getSpriteSheet();
	var queue = evt.target;
	var ssMetadata = lib.ssMetadata;
	for(i=0; i<ssMetadata.length; i++) {
		ss[ssMetadata[i].name] = new createjs.SpriteSheet( {"images": [queue.getResult(ssMetadata[i].name)], "frames": ssMetadata[i].frames} )
	}
	var preloaderDiv = document.getElementById("_preload_div_");
	preloaderDiv.style.display = 'none';
	dom_overlay_container.style.display = canvas.style.display = 'block';
	exportRoot = new lib.EuroKeyTag();
	stage = new lib.Stage(canvas);
	stage.enableMouseOver();	
	//Registers the "tick" event listener.
	fnStartAnimation = function() {
		stage.addChild(exportRoot);
		createjs.Ticker.setFPS(lib.properties.fps);
		createjs.Ticker.addEventListener("tick", stage);
	}	    
	//Code to support hidpi screens and responsive scaling.
	AdobeAn.makeResponsive(true,'both',true,1,[canvas,preloaderDiv,anim_container,dom_overlay_container]);	
	AdobeAn.compositionLoaded(lib.properties.id);
	fnStartAnimation();
}
</script>
</head>
<?php if($PROOF=="Y"){ 	?>
<body onLoad="init();" style="margin:0px;">
<?php }else{ ?>
<body onLoad="init();" style="margin:0px; background-image:url(images/carbon-fibre.png);">
 <center><div style= 'height:33px; width: 425px; background-color:rgba(255, 255, 255, 0); text-align:center;'><a href="<?php echo $domain; ?>"><img src="<?php echo $header; ?>"></a></div></center>
<div style=' text-align:center;'><B><font face="Arial, Helvetica, sans-serif" size="+3" color="333333">Custom European License Plate - <font color="#990000">$34.95</font></font></B></div>
 <?php } ?>
	<div id="animation_container" style="background-color:rgba(255, 255, 255, 0); width:425px; height:420px">
   
		<canvas id="canvas" width="425" height="420" style="position: absolute; display: none; background-color:rgba(255, 255, 255, 0);"></canvas>
		<div id="dom_overlay_container" style="pointer-events:none; overflow:hidden; width:425px; height:420px; position: absolute; left: 0px; top: 0px; display: none;">        
		</div>       
	</div>    
    <div id='_preload_div_' style='display: inline-block; height:420px; width: 425px; vertical-align=middle;position:absolute;left:0px;top:0px;text-align: center;'>	<span style='display: inline-block; height: 100%; vertical-align: middle;'></span>
    <?php if($PROOF=="Y") { ?>	
   
    <?php }else{ ?>
    <img src=images/_preloader.gif style='vertical-align: middle; max-height: 100%'/>
    <?php } ?>
    </div>
</body>
</html>