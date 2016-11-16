<?php
class paginate
{
	
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		if($stmt->rowCount() >0)
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<div class="container">';
					echo '<div class="row">';
						echo '<div class="col-lg-8">';
						echo '<hr>';
						echo '<h1><a href="templates/viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p class = "lead">'.$row['postDesc'].'</p>';
						echo '<img class="img-responsive" src="user_images/'.$row['image'].'" alt="" width="150px" height="150px">';
						echo '<p><a href="templates/viewpost.php?id='.$row['postID'].'">Read More</a></p>';
						echo '<hr>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		}
		
	}
	public function paging($query, $records_per_page)
	{
		$starting_position=0;
        if(isset($_GET["page_no"]))
        {
             $starting_position=($_GET["page_no"]-1)*$records_per_page;
        }
        $query2=$query." limit $starting_position,$records_per_page";
        return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		$self = $_SERVER['PHP_SELF'];
		$stmt = $this->db->prepare($query);
		$stmt ->execute();
		$total_no_of_records = $stmt->rowCount();
		if($total_no_of_records > 0)
		{
			$total_no_of_pages = ceil($total_no_of_records/$records_per_page);
			$current_page = 1;
			if(isset($_GET['page_no']))
			{
				$current_page = $_GET['page_no'];
			}
			echo '<div class = "container">';
			echo '<ul class="pagination pagination-lg">';
			for($i = 1; $i <=$total_no_of_pages; $i++)
			{
				
				if($i == $current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			echo '</ul>';
			echo '</div>';
			
   }
   
   
		}
	}
	

?>