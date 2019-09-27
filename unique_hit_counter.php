 <?php
  $count_no_of_visitor='count_no_of_visitor.txt';
  $store_ip_addr='store_ip_addr.txt';
  $ip_addr_of_opening=$_SERVER['REMOTE_ADDR'];
    if($ip_addr_of_opening){

	     $new_ip_addr_found=false;

		   if(file_exists($store_ip_addr)){
			    $get_ip_addr_of_already_opened=file($store_ip_addr);
			    foreach($get_ip_addr_of_already_opened as $get_row_value){
					  if(trim($ip_addr_of_opening)==trim($get_row_value)){
						  $new_ip_addr_found=true;
						  echo 'Found this ip addr';
						  echo "<br>";
			              break;
					   }else{
						$new_ip_addr_found=false;
						echo 'Not found this ip addr';
						echo "<br>";
				       }
			    }
		   }
     
	    if($new_ip_addr_found ==false){
			$reading_visitors_from_existing=1;
			$for_listing_ip_addr_opening=fopen($store_ip_addr,'a');
			$writing_ip_addr=fwrite($for_listing_ip_addr_opening, $ip_addr_of_opening."\n");
			fclose($for_listing_ip_addr_opening);

                      if(file_exists($count_no_of_visitor)){
                      	$opening_for_reading_visitors_from_existing=fopen($count_no_of_visitor,'r');
			            $reading_visitors_from_existing=fread($opening_for_reading_visitors_from_existing,filesize($count_no_of_visitor));
			            fclose($opening_for_reading_visitors_from_existing);
 						$reading_visitors_from_existing=$reading_visitors_from_existing+1;
                      }

			$for_writing_visitors_count=fopen($count_no_of_visitor,'w');
			$writing_visitors_count=fwrite($for_writing_visitors_count, $reading_visitors_from_existing);
			fclose($for_writing_visitors_count);
			echo 'Storing this ip addr and increment the no. of visitors';
	    }
    }
?>


