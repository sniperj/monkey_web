<?php 
/*	Author:Sean Johnson
 * 	Description:
 * 
 * */
error_reporting(E_ERROR);
class parser
{
		public function parse_file($file_name,$file_content,$data)
		{

			$arr_keys = array_keys($data);
			if(isset($file_name))
			{
				$app_path 		= str_replace( "\\","/" ,getcwd()) ;
				$file_content 	= file_get_contents($app_path.'/'.$file_name);				
			}
			foreach ($arr_keys as $key)
			{
				if(is_array($data[$key]))
				{

					$rcount = count($data[$key]);
					for($i=0;$i<$rcount;$i++)
					{
						$file_content 	= $this->parse_begin_end( $data[$key], $file_content, $key);
					}
				}	
				else 
				{
					$file_content = str_replace("{".$key."}", $data[$key], $file_content);
				}	
			}
			return $file_content;		
		}
		private function parse_field($data, $file_content)
		{	

			$arr_names	= array_keys($data);
			$rcount		= count($arr_names) ;
			for($i=0;$i<$rcount;$i++)
			{	
				$file_content = str_replace("{".$arr_names[$i]."}", $data[$arr_names[$i]], $file_content);
			}	
			return $file_content ; 
		}
		
		private function parse_begin_end( $data, $file_content, $group='new')
		{	
			$parsed_string	= '';
			$content		= str_replace(PHP_EOL, '', $file_content);
			$pattern		= '/{begin:'.$group.'}(.*){end:'.$group.'}/';


			if(preg_match($pattern, $content, $matches))
			{
				$rcount	=	count($data);
				for($i=0;$i<$rcount;$i++)
				{	
					$parsed_string	.=  $this->parse_field($data[$i],$matches[1]);	
				}	
				$content	=	 str_replace($matches[0], $parsed_string, $content ) ;
			}	
			return $content;
		}		
}
    

?>