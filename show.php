
<div class="intern-display">
<?php
$select="SELECT * FROM application WHERE apply>start ORDER BY id "; //where apply by date is greater than the current date
$query=mysqli_query($connect,$select);
while($row=mysqli_fetch_array($query)){
    ?>
    <div class="container-fluid individual_internship">
        <div class="individual_internship_header" >
            <div class="table-cell">
                <h4><mark><?php echo $row['title'];?></mark></h4>
                <h4 style="color:blue;"><blockquote><?php echo $row['oname'];?></blockquote></h4>
            </div>
            <div class="table-cell">
                <?php echo $row['description'];?>
            </div>    
        </div>
        <div class="individual_internship_details">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Stipend</th>
                            <th>Posted On</th>
                            <th>Apply By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?echo $row['stipend'];echo "/m"; ?></td>
                            <td><?php echo $row['start'];?></td>
                            <td><?php echo $row['apply'];$id=$row['id'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="button_container">
            <div class="images_container pull-left">
                
            </div>
            <a class="view_detail_button"  href="apply.php?page=apply&id=<?php echo $id;?>">
                <input type="button" class="btn btn-primary pull-right" value="Apply">
            </a>
        </div>
    </div>
   <hr>
    <?php
}

?>
</div>
