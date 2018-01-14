<?php
namespace App\Utils;

/**
* This is a utils class for all things csv
*/
class Excel
{
	private $data = "";
	private $headProperty = array();
	private $bodyProperty = array();
	public function __construct($filename)
	{
		if(empty($filename)){
			return;
		}
		$this->headProperty['filename'] = $filename.".xls";		
	}

	public function setHeading($data = array()){
		$this->data .= implode("\t", $data);
		$this->data .= "\n ";
		return $this;
	}

	public function setData($inputData = array()){
		if(count($inputData) == 0){ return; }

		foreach($inputData as $key=>$value){
			if(is_array($value)){
				$this->data .= implode("\t", $value);
				$this->data .= "\n\r";
			}else{
				$this->data .= $value ."\n";
			}			
		}
		return $this;
	}	

	public function pushDocument(){
		ob_start();
		header("Content-Disposition: attachment; filename=".$this->headProperty['filename']);
		header("Content-Type: application/vnd.ms-excel");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $this->data;
		return;
	}
}

?>