<style type="text/css">
	.pagination{
		margin-right: 7px;
		text-align: center;
		
	}
</style>
<?php
class Getlistings extends Database {
	
	public function selectListings() {

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

		$pagesQuery="SELECT * FROM car_listings";
		$pagesResult= $this->connect()->query($pagesQuery);
		
		$rowCount=$pagesResult->rowCount();

		$totalPages=$rowCount/$rpp;
	
		
		$sql="SELECT * FROM car_listings LIMIT $start,$rpp";
		$result = $this->connect()->query($sql);
		
		if($result->rowCount() > 0){
			
			
			while($row=$result->fetch()){

				$id=$row['id'];
				$coverphoto=$row['coverphoto'];
				$make=$row['make'];
				$model=$row['model'];
				$price=number_format($row['price']);
				$created_at=$row['created_at'];
				$id=$row['id'];
				$id=$row['id'];
				$id=$row['id'];
				
				echo "
		<tbody class='white-text'>

			<tr>
				<td>$id</td>
				<td><img src='$coverphoto'' width='70' class='materialboxed responsive-img'> </td>
				<td>$make</td>
				<td>$model </td>
				<td>$price </td>
				<td>$created_at</td>
				<td>

					<a href='details.php?details=$id'' class='btn btn-small blue'>View</a>
					<a href='editlisting.php?edit_listing=$id'' class='btn btn-small green'>Edit</a>

					<a href='index.php?delete_listing=$id' class='btn btn-small red' onclick='delete()'>Delete</a>

				</td>
	
			</tr>
		</tbody>


				";
			}
			
			echo "</table>";

		}
			echo "<div class='section center'>";
			echo "<span class='blue-grey-text text-lighten-3 center'>Pages  </span>";

			for($x=1;$x<$totalPages+1;$x++){
				echo "
				
				<a href='?page=$x' class='btn btn-small teal white-text pagination'>$x</a>
				
				";
			}

			echo "</div>";
	
	
    
	}
	
	
	public function count() {
		$sql="SELECT * FROM car_listings ";
		$result = $this->connect()->query($sql);
		echo $result->rowCount();
	}
	
	
	

	
}
