<?php
/**
 * MyLogPHP 1.2.5
 *
 * MyLogPHP is a single PHP class to easily keep log files in CSV format.
 *
 * @package    MyLogPHP
 * @subpackage Common
 * @author     Lawrence Lagerlof <llagerlof@gmail.com>
 * @copyright  2014 Lawrence Lagerlof
 * @link       http://github.com/llagerlof/MyLogPHP
 * @license    http://opensource.org/licenses/BSD-3-Clause New BSD License
 */
/****************************************************************************************
*@Company:              Tobb Technologies (Pty) Ltd                  					*
*@Year:                 2016 - 2019                                           			*
*@Deveopers:            Bernard Sibanda, Bongiwe Sibanda                				*
*@Source Code License:  GNU GENERAL PUBLIC LICENSE(Version 3, 29 June 2007)     		*
*@Licence url:          https://www.gnu.org/licenses/quick-guide-gplv3.html             *
*@website:              http://www.tobb.co.za                           				*
*@emails:               besi@tobb.co.za, bongi@tobb.co.za                				*
* 
* usage example:

        include_once("./lib/core/php/class-j.php");

		start(0,0,0);j("started".HS.__LINE__,"...started");

		$a = 89; j($a.HS.__LINE__,"a");				//:: Check $a

		$b = 77; j($b.HS.__LINE__,"b");				//:: Check $b

		$z = $a * $b; j($z.HS.__LINE__,"z");		//:: Check $z 
		
****************************************************************************************/
$_SESSION['_nCount'] = 0;

function _n($msg)
{
    if(strlen(trim($msg)) > 0)
    {
        $_SESSION['_nCount']++;
        
        echo "<br>".$_SESSION['_nCount']." : ".$msg."<br>";
    }
}

function j($var,$title="",$testVariableData="", $expectedString="")
{

        $sArray = explode(" ",$var);
     
       if(strcmp($title,"VARIABLE")==0 && count($sArray) > 1)
       {
           $title =  strtoupper($sArray[0])." ";
       }
       else if(strcmp($title,"VARIABLE")==0 && count($sArray) === 1)
       {
          $title =  displayj($var." ");
       }
       else
       {
           //
       }
       
       if(isset($GLOBALS['log']))
       {
         $GLOBALS['log']->trace($var,$title,$testVariableData, $expectedString); 
       }

}

function displayj($var) 
{
      foreach($GLOBALS as $demo => $value) 
      {
         if ($value === $var) 
         {
            return $demo;
         }
      }
      return false;
}

class ___ 
{

	private $LOGFILENAME;

	private $SEPARATOR;

	private $LOGOFF;

	private $HEADERS;

	const DEFAULT_TAG = '--';
	
	private $RUN_AUTOMATED_TEST = false;
	
	private $TOTAL_PASSES = 0;
			
	private $TOTAL_FAILURES = 0;
	
	private $TOTAL_STATUSES = 0;
	
	private $UI = 0;

	function __construct($logfilename = './_MyLogPHP-1.2.log.csv', 
	$separator = ',', $logoff=false,$run_automated_test=false,$ui=0) {

		$this->LOGFILENAME = $logfilename; 

		$this->SEPARATOR = $separator;
		
		$this->HEADERS =
			'DATETIME' . $this->SEPARATOR . 
			'ERRORLEVEL' . $this->SEPARATOR .
			'TAG' . $this->SEPARATOR .
			'VALUE' . $this->SEPARATOR .
			'LINE' . $this->SEPARATOR .
			'FILE';
			
		$this->LOGOFF = $logoff;

		$this->TOTAL_PASSES = 0;
			
	    $this->TOTAL_FAILURES = 0;
	    
	    $this->TOTAL_STATUSES = 0;
	    
	    $this->RUN_AUTOMATED_TEST = $run_automated_test;
		
		$this->UI = $ui;
	}
		
	private function totalTestPercentage($total,$grandTotal) 
	{

	    $result = 0;
	    
	    if(($total > 0) && ($grandTotal > 0))
	    {
	        $result =  round(($total / $grandTotal) * 100);
	    }
	    
	    return $result;
	}

	private function ae($variableName, $tag,$testVariableData, $expectedString) 
	{
	
	    
	    if($this->RUN_AUTOMATED_TEST === true)
		{
		    $datetime = @date("Y-m-d H:i:s"); 
    	    
    	    $debugBacktrace = debug_backtrace();
    		
    		
    		$message = '<br>';
    	    
    	    $message .= $datetime; 
    	    
    		if (!file_exists($this->LOGFILENAME)) 
    		{
    			$headers = $this->HEADERS . "\n";
    		}
    
    		$fd = fopen($this->LOGFILENAME, "a");
    		
			$message .= $tag?
								' : VAR '.$tag.' :=>  '.$variableName."|"
							:
								' : INFO '.$tag.' :=>  '.$variableName;
			
			$variableStatus = "";
			
			$variableStatusEmpty = true;
			
			if(strlen(trim($variableName)) < 1)
			{
			  $variableStatus = "***EMPTY***"; 
			}
			
			if(strlen(trim($expectedString)) > 0)
			{
			  $variableStatusEmpty = false; 
			}
			
			
			if(trim($testVariableData) && !$variableStatusEmpty && $variableName)
			{
			
			    $this->TOTAL_PASSES++;
			    
			    $grandTotal = $this->TOTAL_PASSES + $this->TOTAL_FAILURES + $this->TOTAL_STATUSES;

				$message .= " ".$variableStatus.trim(strtoupper($testVariableData));
				
				$message .= " | PASS -> "."&#x2713";

				$message .= "[".$this->TOTAL_PASSES."/".$grandTotal."][".self::totalTestPercentage($this->TOTAL_PASSES,$grandTotal)."%]";

        		fwrite($fd, "\n".str_replace("&#x2713","✓",str_replace("<br>","",$message)));

                $tag?
                    $this->UI?print '<span style="color:green">'.$message.'</span>':""
                    :
                    $this->UI?print '<span style="color:orange">'.$message.'</span>':"";

			}
			else if(strcmp(trim($testVariableData),trim($expectedString)) !== 0 && !$variableName)
			{
				
				$this->TOTAL_FAILURES++;
				
				$grandTotal = $this->TOTAL_PASSES + $this->TOTAL_FAILURES + $this->TOTAL_STATUSES;
				
				$message .= " ".$variableStatus.trim(strtoupper($testVariableData));
				
				if($variableStatusEmpty !== true)
				{
				    $message .= " : FAIL -> "."&#x2717";
				    
				    $message .= "[".$this->TOTAL_FAILURES."/".$grandTotal."][".self::totalTestPercentage($this->TOTAL_FAILURES,$grandTotal)."%]";
				    
            		fwrite($fd, "\n".str_replace("&#x2717","x",str_replace("<br>","",$message)));

				    $this->UI?print '<span style="color:red">'.$message.'</span>':"";
				}
				else
				{
				    $message .= " : STATUS -> ?";
				    
				    $this->TOTAL_STATUSES++;
				    
				    $message .= "[".$this->TOTAL_STATUSES."/".$grandTotal."][".self::totalTestPercentage($this->TOTAL_STATUSES,$grandTotal)."%]";

            		fwrite($fd, "\n".str_replace("<br>","",$message));

				    $this->UI?print '<span style="color:blue">'.$message.'</span>':"";
				}

			}			
			else
			{
				$temp = explode("=>",explode("|",$message)[0])[1];
				
				if(trim($temp))
				{
					$this->TOTAL_PASSES++;
				
					$grandTotal = $this->TOTAL_PASSES + $this->TOTAL_FAILURES + $this->TOTAL_STATUSES;

					$message .= $variableStatus.trim(strtoupper($testVariableData));
					
					$message .= " | PASS -> "."&#x2713";

					$message .= "[".$this->TOTAL_PASSES."/".$grandTotal."][".self::totalTestPercentage($this->TOTAL_PASSES,$grandTotal)."%]";

					fwrite($fd, "\n".str_replace("&#x2713","✓",str_replace("<br>","",$message)));

					$this->UI?print '<span style="color:green">'.$message.'</span>':"";
				}
				else
				{
					$this->TOTAL_FAILURES++;

					$grandTotal = $this->TOTAL_PASSES + $this->TOTAL_FAILURES + $this->TOTAL_STATUSES;

					$message .= " ".$variableStatus.trim(strtoupper($testVariableData));

					$message .= " : FAIL -> "."&#x2717";

					$message .= "[".$this->TOTAL_FAILURES."/".$grandTotal."][".self::totalTestPercentage($this->TOTAL_FAILURES,$grandTotal)."%]";

					$message = str_replace("INFO","ERROR",$message);
					
					fwrite($fd, "\n".str_replace("&#x2717","x",str_replace("<br>","",$message)));

					if($this->UI)
					{
					    print '<span style="color:red">'.$message.'</span>';
					 }
					 else
					 {
					     "";
					 }
				}
				
				
			}
			
					
		    fclose($fd);
		}
		else
		{
			//
		}

	}

	private function log($errorlevel = 'INFO', $value = '|', $tag,$testVariableData, $expectedString) 
	{
		
		if(strlen(trim($value))<1)
		{
			$errorlevel = 'ERROR';
		}			
        
		if(($this->LOGOFF == true) && ($this->RUN_AUTOMATED_TEST == false) )
		{

			$datetime = @date("Y-m-d H:i:s");
			
			if (!file_exists($this->LOGFILENAME)) 
			{
				$headers = $this->HEADERS . "\n";
			}
	
			$fd = fopen($this->LOGFILENAME, "a");
	
			if (@$headers)
			{
				fwrite($fd, $headers);
			}
	
			$debugBacktrace = debug_backtrace();
	
			$value = preg_replace('/\s+/', ' ', trim($value));
			
			if(empty($value))
			{
				$value = ' *** ERROR_EMPTY_VALUE *** ';
			}
			
			$entry = array($datetime,$errorlevel,$tag,$value." ");
	
			fputcsv($fd, $entry, $this->SEPARATOR);

			$this->UI?print '<br> <br> Date: '.$datetime.' Error Level: '.$errorlevel.' Title: 
			'.$tag. ' Value: '.$value:"";

			fclose($fd);
		}
		else if($this->RUN_AUTOMATED_TEST == true)
		{
		    self::ae($value,$tag, $testVariableData, $expectedString) ;
		}
		else
		{
		    //
		}
	}

	function info($value = '', $tag = self::DEFAULT_TAG) {

		self::log('INFO', $value, $tag);
	}

	function trace($value = '|', $tag,$testVariableData, $expectedString) 
	{
		self::log('TRACE', $value, $tag,$testVariableData, $expectedString);
	}

	function warning($value = '|', $tag = self::DEFAULT_TAG) {

		self::log('WARNING', $value, $tag);
	}

	function error($value = '|', $tag = self::DEFAULT_TAG) {

		self::log('ERROR', $value, $tag);
	}

	function debug($value = '|', $tag = self::DEFAULT_TAG) {

		self::log('DEBUG', $value, $tag);
	}
	
	public function __destruct() {
        //
    }
}

define("HS"," | ");

define("LF",$_SERVER['SCRIPT_FILENAME'].'_log.txt');

function start($log,$test,$ui)
{
 $GLOBALS['log'] = new ___(LF,"|",$log,$test,$ui);	
}

echo '<div id="container" style="background-color:#000;color:green;width:95%;padding:5%;border-radius:5px;text-align:left;">';	
	
?>