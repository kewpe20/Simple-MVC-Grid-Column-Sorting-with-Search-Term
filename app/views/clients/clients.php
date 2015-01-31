<div class="container">
<?php
//    echo "<pre>";
//    print_r ($);
//    echo "</pre>";

?>
    <h1><?php echo $data['title'] ?></h1>
    <!-- Adding a row for the Search Term input field -->
    <div class="row">
        <div class="col-sm-2 text-left"></div>
        <div class="col-sm-6 text-left">
            <a id="addRec" class="btn btn-primary btn-med">Add New</a>
        </div>
        <div class="col-sm-3 input-group">
            <input id="srchTerm" type="text" placeholder="company name...." class="form-control" value="<?php echo $data['srchTerm']; ?>">
            <span class="input-group-btn">
                <button id="srchBtn" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
        <div class="col-sm-1 text-left"></div>
    </div>
    <br>
   
    <!-- Column Headers with links that pass the sorting and search term values to the next call to the same page -->
    <div class="table-responsive">
        <table class="table table-striped">
            <tr class="">
                <th class="col-sm-3"><a href='<?php echo DIR; ?>clients/?p=<?php echo $data['pageNum']; ?>&sC=3&sO=<?php echo $data['sO']; ?>&sT=<?php echo $data['htmlsrchTerm']; ?>'>Company</a></th>
                <th class="col-sm-3"><a href='<?php echo DIR; ?>clients/?p=<?php echo $data['pageNum']; ?>&sC=2&sO=<?php echo $data['sO']; ?>&sT=<?php echo $data['htmlsrchTerm']; ?>'>Account Number</a></th>
                <th class="col-sm-3"><a href='<?php echo DIR; ?>clients/?p=<?php echo $data['pageNum']; ?>&sC=4&sO=<?php echo $data['sO']; ?>&sT=<?php echo $data['htmlsrchTerm']; ?>'>Last Update</a></th>
                <th class="col-sm-3">Action</th>
            </tr>   

<?php
    // Loop through the results returned from the database and display them to the user.
    if($data['records']){
        foreach($data['records'] as $row){
?>
            <tr class="">
                <td><?php echo $row->companyName; ?></td>
                <td><?php echo $row->accountNumber; ?></td>
                <td><?php echo $row->updateTime; ?></td>
                <td>
                    <a class="editRec" href='<?php echo DIR; ?>clients/edit/<?php echo $row->id; ?>'><span style="padding-right:8px;" class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                     | 
                    <a class="deleteRec" href='<?php echo DIR; ?>clients/delete/<?php echo $row->id; ?>'><span style="padding-left:8px;" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>

            </tr>
<?php
        } // End Foreach Listing
    ?>
        </table>
    </div>
    <!-- Output the Pagination Navigation bar -->
    <div class="row">
        <div class="col-sm-12 text-center"><?php echo $data['page_links']; ?></div>
    </div>
    <?php
    }
?>

</div>
<!-- Page Specific Javascript -->
<script>
    // Action when search term icon is clicked.
    $("#srchBtn").on('click', function(){
        var srchTerm = $('#srchTerm').val();
        // When Search Icon clicked, default all sort values
        var url = "<?php echo DIR; ?>clients/?p=0&sC=<?php echo $data['dfltSortCol']; ?>&sO=<?php echo $data['dfltSortOrd']; ?>&sT="+srchTerm;
        
        window.location = url; 
    });
    
    // Future functionality
    $("a#addRec").on('click', function(){
        alert ("Adding Functionality later!");
    //     window.location = "<?php echo DIR; ?>clients/add";    
    });
    $("a.editRec").on('click', function(){
        alert ("Adding Functionality later!");
    //     window.location = "<?php echo DIR; ?>clients/add";    
    });
    $("a.deleteRec").on('click', function(){
        alert ("Adding Functionality later!");
    //     window.location = "<?php echo DIR; ?>clients/add";    
    });
</script>    
