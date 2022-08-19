<?php 
session_start()
?>

    <!-- Open navbar -->
    <nav class="navbar navbar-light sticky-top  border-bottom border-3" style="background-color: rgb(0, 49, 85);" >
        
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php?page=admin">
                <img src="photo/StACLogoWhite.png" alt="StACLogo" style="height: 40px; width: 60px;">
            </a>

            <div class="col d-lg-block d-none d-flex align-items-cente justify-content-center">

                <a class="btn btn-primary roundedconners" href="export/export_old.php" role="button">Export</a>

            </div>

            <!-- Search bar -->
            <div class="col d-flex align-items-cente justify-content-center ">

                <!-- Search students form  -->
                <form autocomplete="off" method="post">
                    <div class="frmSearch" >
                        <input name="search" type="text" id="search-box" onfocus="this.value=''" placeholder="Student Search" style="width: 200px"/>
                        <div class="" id="suggesstion-box"></div>
                    </div>    
                </form>
            <!-- Close search bar -->    
            </div>

            <div class="col d-flex align-items-cente justify-content-end ">
                <a class="btn btn-primary roundedconners" href="index.php?page=logout" role="button">Log out</a>
            </div>
        </div>

    <!-- Close navbar -->
    </nav>
    

<!-- Autocomplete script -->
<script>
    $(document).ready(function(){
        $("#search-box").keyup(function(){
            $.ajax({
            type: "POST",
            // location of query
            url: "readname.php",
            data:'keyword='+$(this).val(),
            beforeSend: function(){
                $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
            }
            });
        });
    });

    function selectstudent(val, ID) {
        
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
    }

</script>

