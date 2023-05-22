<!DOCTYPE html>
<html>
<head>
        <title> Seaching </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    
    <div class="container" style="max-width: 50%;">
        <div class = "text-center mt-5 mb-4">
            <h2> Product Searching </h2>
        <div>
        
        <input type="text" class ="form-control" id="search-txt" autocomplete="off"
            placeholder = "Type to search">
        
</div>
<div id="searchresult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
             $(document).ready(function() {

              $("#search-txt").keyup(function(){
                var input = $(this).val();
                if(input != "") {
                  $.ajax({

                    url: "search.php",
                    method: "POST",
                    data: {input:input},

                    success:function(data){
                      $("#searchresult").html(data);
                    }
                  });
                } else {
                  $("#searchresult").css("display","none");
                }
              });
          });
      </script>
<body>
</html>


