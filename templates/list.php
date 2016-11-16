<?php
 include_once('dbconfig.php');
 ?>

 <table align="center" border="1" width="100%" height="100%" id="data">
       <?php 
	    $stmt = $DB_con->query('SELECT postID, postTitle, postDesc, postDate, image FROM posts ORDER BY postID DESC');
        $query = 'SELECT postID, postTitle, postDesc, postDate, image FROM posts ORDER BY postID DESC';       
        $newquery = $paginate->paging($query,$records_per_page);
        $paginate->dataview($newquery);
        $paginate->paginglink($query,$records_per_page);  
       ?>
  </table>

