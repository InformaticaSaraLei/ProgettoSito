<?php
class CreateCSV{
	function create($sql, $isPrintFieldName = false, $isQuoted = true){

		$q = mysql_query($sql) or die("Error: ".mysql_error());
		
		$csv = $head = $ctn = '';
		$hasPrintHead = false;

		while($r = mysql_fetch_assoc($q)){
			
			if(!$hasPrintHead && $isPrintFieldName == true){
				$csv_value = array();
				foreach($r as $field => $value){
					$csv_value[] = $field;
				}
				$hasPrintHead = true;
				$csv .= implode(',', $csv_value)."\n";
			}
			
			//Print the content...
			$aOpts_text = $csv_value = array();
			foreach($r as $field => $value){
				$csv_value[] = $isQuoted == true ? '"'.$value.'"' : $value;
			}
			$csv .= implode(',', $csv_value)."\n";
		}
		return $csv;
	}
}
?>
