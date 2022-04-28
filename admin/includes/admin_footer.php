</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 
    
    <script src="js/script.js"></script>

    <script>

$(document).ready(function () {
    
    var div_box = "<div id='load-screen'><div id='loading'></div></div>";

    $("body").prepend(div_box);
    $('#load-screen').delay(200).fadeOut(200, function(){
        $(this).remove();
    });
    
});

    </script>

</body>

</html>
