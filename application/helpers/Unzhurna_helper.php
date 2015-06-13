<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function cleanteks($teks)
{
	$find = array('|[_]{1,}|','|[ ]{1,}|','|[^0-9A-Za-z\-.]|','|[-]{2,}|','|[.]{2,}|'); 
	$replace = array('.','.','','.','.'); 
	$newname = strtolower(preg_replace($find,$replace,$teks));
	return $newname;
}
	
function get_image_attached($post)
{
	preg_match_all('/data-rev=(["\'])(.*?)\1/', $post, $matches);
	$img = $matches[2];
	return $img;
	return false;
}
	
function get_image_src($post)
{
	preg_match_all('/src=(["\'])(.*?)\1/', $post, $matches);
	$img = $matches[2];
	return $img;
	return false;
}
	
function explode_img($param="")
{
	$image=array();
	if($param=="")
	{
		return '';
	}
	
	if (strpos($param,'http') !== false)
	{
		$image['img_headline']=$param;
		$image['img_preview']=$param;
		$image['img_thumb']=$param;
		$image['img_icon']=$param;
	}
	else
	{
		$img=explode('.',$param);
		
		$image['img_headline']=config_item('static_content'). $img[0].'_h.'.$img[1];
		$image['img_preview']=config_item('static_content').$img[0].'_p.'.$img[1];
		$image['img_thumb']=config_item('static_content').$img[0].'_t.'.$img[1];
		$image['img_icon']=config_item('static_content').$img[0].'_i.'.$img[1];
	}
	
	if($image)
	{
		return $image;
	}
	else
	{
		return '';
	}
}

function dateInd($tgl)
{
	$y = substr($tgl, 0, 4);
	$m = substr($tgl, 5, 2);
	$d = substr($tgl, -2);
	$tanggal = $d.'/'.$m.'/'.$y;
	return $tanggal;
}

function dateEng($tgl)
{
	$y = substr($tgl,-4);
	$m = substr($tgl,3,2);
	$d = substr($tgl,0,2);
	$tanggal = $y.'-'.$m.'-'.$d;
	return $tanggal;
}