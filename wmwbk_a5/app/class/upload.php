<?php
require_once("app.php");
$act = isset($_GET['act']) ? $_GET['act'] : '';
if( isset($_FILES['picture']) && !empty($_FILES['picture']['name']) )
{
	if( !$admin )
	{		 
		upmsg(1,'not login');
	}
	else
	{
       //if($_FILES['picture']['size'] > 0‬)
       if($_FILES['picture']['size'] > 5242880 )
		{
 
			upmsg(1,'图片不能超过5M');
		}
		else
		{
			$imgInfo = @getimagesize($_FILES['picture']['tmp_name']);

			if( !$imgInfo || !in_array($imgInfo[2], array(1,2,3)) )
			{			 
				upmsg(1,'您上传的不是一张有效的图片');
				exit();
			}
			switch($imgInfo[2])
				{
					case 1:
						$fileType = ".gif";
						break;
					case 2:
						$fileType = ".jpg";
						break;
					case 3:
						$fileType = ".png";
						break;
				}

				$savePath = date('Y/m');
				$saveName = "_".date('His')."_".rand().$fileType;		 
				
				mkDirs(ROOT_PATH."assets/file/".$savePath);

				
				if($act == 'thum'){ $saveImage = ROOT_PATH."assets/file/".$savePath."/s".$saveName;}else{
				   $saveImage = ROOT_PATH."assets/file/".$savePath."/b".$saveName;
				}

				if( @move_uploaded_file($_FILES['picture']['tmp_name'], $saveImage) )
				{					
					if($act == 'thum'){
					    createImg($saveImage,$saveImage,$imgInfo,ImgW,ImgH,1);
					}else{
					if( $imgInfo[0] > 560 || $imgInfo[1] > 560 )
					{
						createImg($saveImage,$saveImage,$imgInfo,560,560);
					}
					}
					$resImage = str_replace(ROOT_PATH,'',$saveImage);
					upmsg(0,'',$resImage);
				}
				else
				{					 
					upmsg(1,'上传失败');
				}			 
			 
		} //end login else
	}
}

function upmsg($e,$m,$u=''){
  $arr['error'] = $e;
  $arr['message'] = $m;
  $arr['url']=$u;
  echo json_encode($arr);
  exit();
}