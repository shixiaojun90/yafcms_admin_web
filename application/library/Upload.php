<?php
/**
 * File: Upload.php
 * Functionality: 文件上传,生成缩略图,加水印类
 * Author: Nic XIE
 * Date: 2012-08-15
 */

class Upload{

	// Original file name
	public $fileName;
	
	// Temp name
	private $tempName;
	
	// Original file extension
	public $extension;
	
	// Original file size
	private $fileSizes;
	
	// Original file totalSize
	private $totalSize;
	// Max upload size
	private $maxSize = 0;
  
	// Save name
	public $saveName;
  
	// Save path
	private $savePath;
  
	// Watermark save path
	private $waterPath = 'watermark';
  
	// Allowded file types
	public $validTypes = array();
  
	// OverWrite file if exists ?
	private $overWrite = 1;
	
	// Error for return 
	private $error;
	
	// Delete tmp file ?
	private $delete = false;
  
	// Errors
	private $errorArr = array(
			0 => 'Invalid file format',
			1 => 'File size exceeds the max limited size !', 
			2 => 'File already exists !', 
			3 => 'Save path is unwritable !', 
			4 => 'Failed to upload, unknown error !',
			5 => 'Failed to create directory !',
			6 => 'Failed to create thumbnail! please check !',
		);
		
	
	// Constructor
	/**
	 * $fileArray = $_FILE['fileName'] object
	 * $delete:  是否删除临时文件
	 */
	function __construct($fileArray, $savePath = '', $delete = TRUE){
		// Get original file info
		$this->fileName  = $fileArray['name'];
		$this->tempName  = $fileArray['tmp_name'];
		$this->getExtension($this->fileName);
		$this->size = $fileArray['size'];
		if($delete){
			$this->delete = TRUE;
		}
		// Set allowed upload types
		$this->validTypes = array('jpg', 'jpeg', 'bmp', 'png', 'gif', 'txt', 'xls', 'zip', 'rar', '7z', 'doc', 'ppt', 'docx', 'xlsx','mp3','mp4','AVI');
		
		// Set max allowed size
		$this->maxSize = 2048*1024*1024;
		
		// Set savePath 	
		if(isset($savePath)){
			$this->savePath = $savePath;
		}else{
			$this->savePath = 'uploads/img/';
		}
	}


	public function getSaveName(){
		$newName = date('YmdHis') . rand(0, 99);

		return $newName;
	}
	
	/**
	 * Upload file
	 */
	function upload($targetName = ''){	
		$this->saveName = $targetName;
		// Check before upload
		$valid = $this->checkFileInfo();
		// Create target folder
		$this->createDir($this->savePath);
		if($valid){
			if($this->copyFile()){
				$result['code'] = 0;
				$result['img']  = $this->saveName;
				return $result;
			}else{
				return $this->errorArr[4];
			}
		}else{
			return $this->error;
		}
	}

	/**
	 * Upload file to qiniu
	 */
	function uploadToQiniu($targetName){	
		$this->saveName = $targetName;
		// Check before upload
		$valid = $this->checkFileInfo();
		
		// Create target folder
		$this->createDir($this->savePath);
		
		if($valid){
			$result = $this->copyFile();
			if($result['code'] == 1){
				$l_qiniu = new Qiniu();

				$key = $targetName.'.'.$this->extension;
				$source = $this->savePath.$this->saveName;
				list($ret, $err) = $l_qiniu->upload($key, $source);

				if ($err === NULL) {
					$config = Yaf_Application::app()->getConfig();
        			$IMG_DOMAIN = $config['qiniu_img_domain'];

        			$img = $IMG_DOMAIN.'/'.$key;
        			unlink($source);

        			$rep['code'] = 1;
        			$rep['img'] = $img;
        		}else{
        			$rep['code'] = 0;
        			$rep['error'] = $err;
        		}
			}else{
				$rep['code']  = 0;
        		$rep['error'] = $this->errorArr[4];
			}
		}else{
			$rep['code'] = 0;
			$rep['error'] = $this->error;
		}

		return $rep;
	}
	
	
	/**
	 * Check file info before upload and set target file name if everything is OK
	 */ 
	function checkFileInfo(){
		$valid = 1;
		// Check file type
		if(!in_array($this->extension, $this->validTypes)){
			$this->error = $this->errorArr[0];
			$valid = false;
		}

		// Check file size
		if($this->size > $this->maxSize){
			$this->error = $this->errorArr[1];
			$valid = false;
		}
		
		if(!file_exists($this->savePath)){
			$this->createDir($this->savePath);
		}
				
		// Check whether save path is writable
		if(!is_writable($this->savePath)){
			$this->error = $this->errorArr[3];
			$valid = false;
		}
				
		// Set target name
		$this->setTargetName();
		
		// File exists ?
		if(!$this->overWrite && file_exists($this->savePath.$this->saveName)){
			$this->error = $this->errorArr[2];
			$valid = false;
		}
		
		return $valid;
	}

	
	/**
	 * Copy file
     */
	function copyFile(){
		// Copy file to final path

		if(move_uploaded_file($this->tempName, $this->savePath.$this->saveName)){
			if($this->delete){
				if(isset($this->tempName) && file_exists($this->tempName)){
					@unlink($this->tempName);
				}
			}
		}

		return true;
	}


	/**
     * set target name
     */
	function setTargetName(){
		// saveName is not set, generate a random file name
		if(!isset($this->saveName)){ 
			srand((double)microtime() * 1000000);
			$rand = rand(100, 999);
			$finalName  = date('U') + $rand;
			$finalName .= '.'.$this->extension;
		}else{
			$finalName = $this->saveName.'.'.$this->extension;
		}
		
		$this->saveName = $finalName;
	}
	
		
	/**
	 * Create thumb
     * @access public
     * $sourceImg: source image
     * $targetWidth  缩略图宽度
     * $targetHeight 缩略图高度
	 * $path: target path to store thumb image
	 *
     * @return full path + file name if success 
     */
	function createThumb($targetWidth, $targetHeight, $path){
		$sourceImg = $this->savePath.$this->saveName;
		
		// Get image size
		$originalSize = getimagesize($sourceImg);
		
		// Set thumb image size
		$targetSize = $this->setWidthHeight($originalSize[0], $originalSize[1], $targetWidth, $targetHeight);
		
		// Get image extension
		$this->getExtension($sourceImg);
		
		// Determine source image type
		if($this->extension == 'gif'){
			$src = imagecreatefromgif($sourceImg);
		}elseif($this->extension == 'png'){
			$src = imagecreatefrompng($sourceImg);
		}elseif ($this->extension == 'jpg' || $this->extension == 'jpeg'){
			$src = imagecreatefromjpeg($sourceImg);
		}else{
			return $this->errorArr[0];
		}
		
		// Copy image
		$dst = imagecreatetruecolor($targetSize[0], $targetSize[1]);
		imagecopyresampled($dst, $src, 0, 0, 0, 0, $targetSize[0], $targetSize[1],$originalSize[0], $originalSize[1]);    
		
		if(!file_exists($path)){
			if(!$this->createDir($path)){
				return $this->errorArr[5];
			}
		}
		
		// Path + fileName
		$thumbName = $path.$this->saveName;
		
		if($this->extension == 'gif'){
			imagegif($dst, $thumbName);
		}else if($this->extension == 'png'){
			imagepng($dst, $thumbName);
		}else if($this->extension == 'jpg' || $this->extension == 'jpeg'){
			imagejpeg($dst, $thumbName, 100);
		}else{
			return $this->errorArr[6];
		}
		
		imagedestroy($dst);
		imagedestroy($src);
		return $thumbName;
	}
	
	
	/**
	 * Set thumb image width and height
	 */
	function setWidthHeight($width, $height, $maxWidth, $maxHeight) {
		if($width > $height){
			if($width > $maxWidth){
				$difinwidth = $width/$maxWidth;
				$height = intval($height/$difinwidth);
				$width  = $maxWidth;
				
				if($height > $maxHeight){
					$difinheight = $height/$maxHeight;
					$width  = intval($width/$difinheight);
					$height = $maxHeight;
				}
			}else{
				if($height > $maxHeight){
					$difinheight = $height/$maxHeight;
					$width  = intval($width/$difinheight);
					$height = $maxHeight;
				}
			}
		}else{
			if($height > $maxHeight){
				$difinheight = $height/$maxHeight;
				$width  = intval($width/$difinheight);
				$height = $maxHeight;
				
				if($width > $maxWidth){
					$difinwidth = $width/$maxWidth;
					$height = intval($height/$difinwidth);
					$width  = $maxWidth;
				}
			}else{
				if($width > $maxWidth){
					$difinwidth = $width/$maxWidth;
					$height = intval($height/$difinwidth);
					$width  = $maxWidth;
				}
			}
		}
		
		$final = array($width, $height);
		return $final;
	}
	
	
	/*
	 * Functionality: Add watermark
	 * @Params:
			$source: source img with path
			$destination: target img with path
			$watermarkPath: water mark img
	 *  @Retrun: image with watermark
	 */
	function addWatermark($source, $destination, $watermarkPath){
		list($owidth,$oheight) = getimagesize($source);
		$width = $height = 300;
		$im = imagecreatetruecolor($width, $height);
		$img_src = imagecreatefromjpeg($source);
		imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
		$watermark = imagecreatefrompng($watermarkPath);
		list($w_width, $w_height) = getimagesize($watermarkPath);
		$pos_x = $width - $w_width;
		$pos_y = $height - $w_height;
		imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
		imagejpeg($im, $destination, 100);
		imagedestroy($im);
	}
	
	
	/**
	 * Get file extension 
	 */
	function getExtension($fileName){
		$info = pathinfo($fileName);    
		$this->extension = strtolower($info['extension']);
	}
	
	
	/**
	 * Create directory recursively
	 */
	function createDir($folder){
		$reval = false;
		if(!file_exists($folder)){
			@umask(0);
			preg_match_all('/([^\/]*)\/?/i', $folder, $atmp);
			$base = ($atmp[0][0] == '/') ? '/' : '';
			
			foreach($atmp[1] AS $val) {
				if('' != $val){
					$base .= $val;
					if ('..' == $val || '.' == $val) {
						$base .= '/';
						continue;
					}
				}else{
					continue;
				}

				$base .= '/';

				if(!file_exists($base)){
					if(@mkdir($base, 0777)){
						@chmod($base, 0777);
						$reval = true;
					}
				}
			}
		}else{
			$reval = is_dir($folder);
		}
		
		clearstatcache();
		return $reval;
	}
	
	
	
	
	/***********断点续传***********/
	function Bruplode($fileName,$totalSize,$isLastChunk,$isFirstUpload){
	    //totalSize文件总共大小 isLastChunk检查文件是否为末段
	    // 如果第一次上传的时候，该文件已经存在，则删除文件重新上传
	    //print_r(filesize($this->savePath.$this->fileName));exit;
    	if ($isFirstUpload == '1' && file_exists($this->savePath.$fileName) && filesize($this->savePath.$fileName) == $totalSize) {
    		unlink($this->savePath.$this->fileName);
    	}
    	
    	// 否则继续追加文件数据
    	if (!file_put_contents($this->savePath.$fileName, file_get_contents($this->tempName), FILE_APPEND)) {
    		$status = 501;
    	} else {
    		// 在上传的最后片段时，检测文件是否完整（大小是否一致）
    		
    		if ($isLastChunk === '1') {
    			if (filesize($this->savePath.$fileName) == $totalSize) {
    				$status = 200;
    			} else {
    				$status = 502;
    			}
    		} else {
    			$status = 200;
    		}
    	}
    	
    	//$filestatus['totalSize']=filesize($this->savePath.$fileName);
    	
    	return $status;
    }

}