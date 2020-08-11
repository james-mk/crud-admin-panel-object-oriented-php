<?php

class Getbookings extends Database {
	
	
		public function selectBookings() {


		$rpp=3;//determine the no. of results per page

		if(isset($_GET['page'])) {
			$page=$_GET['page'];
		}else {
			$page=0;
		}

		if($page>1){
			$start=($page*$rpp)-$rpp;
		}else{
			$start=0;
		}

		$pagesQuery="SELECT * FROM bookings";
		$pagesResult= $this->connect()->query($pagesQuery);
		
		$rowCount=$pagesResult->rowCount();

		$totalPages=$rowCount/$rpp;

		
		$sql="SELECT * FROM bookings LIMIT $start,$rpp";
		$result = $this->connect()->query($sql);
		
		if($result->rowCount() > 0){
			
			while($row=$result->fetch()){
			
			$id=$row['booking_id'];
			$name=$row['name'];
			$email=$row['email'];
			$tel=$row['tel'];
			$make=$row['make'];
			$model=$row['model'];
			$booked_on=$row['booked_on'];

			echo "

			<tbody class='white-text'>
			<tr>


			<td>$id</td>
			<td>$name</td>
			<td>$email</td>
			<td>$tel</td>
			<td>$make $model</td>
			<td>$booked_on</td>
			<td>
			<a href='bookings.php?delete_booking=$id'class='btn btn-small red white-text'>Delete</a>
			</td>


			</tr>
			</tbody>

			";


			}
			
			echo "</table>";
			echo "<div class='section center'>";
			echo "<span class='blue-grey-text text-lighten-3 center'>Pages  </span>";

			for($x=1;$x<$totalPages+1;$x++){
				echo "
				
				<a href='?page=$x' class='btn btn-small teal white-text pagination'>$x</a>
				
				";
			}

			echo "</div>";
			
		}
	


    
	}
	
	
	
	
		public function count() {
		$sql="SELECT * FROM bookings ";
		$result = $this->connect()->query($sql);
		echo $result->rowCount();
	}
	
	
	
	
	
	
	
	
}
