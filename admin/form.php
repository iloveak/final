<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User  | Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


	</head>
    	
    <style>

* {
  box-sizing: border-box;
}
body {
  font-family: "Open Sans", arial;
}
table {
  width: 110%;
  max-width: 800px;
  height: 320px;
  border-collapse: collapse;
  border: 1px solid #38678f;
  margin: 50px auto;
  background: white;
}
th {
  background: steelblue;
  height: 54px;
  width: 15%;
  font-weight: lighter;
    text-align: center;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  border: 1px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
    }
tr {
  border-bottom: 1px solid #cccccc;
}
tr:last-child {
  border-bottom: 0px;
}
td {
  border-right: 1px solid #cccccc;
  padding: 10px;
  transition: all 0.2s;
}
td:last-child {
  border-right: 0px;
}
td.selected {
  background: #d7e4ef;
  z-index: ;
}
td input {
  font-size: 14px;
  background: none;
  outline: none;
  border: 0;
  display: table-cell;
  height: 100%;
  width: 100%;
}
td input:focus {
  box-shadow: 0 1px 0 steelblue;
  color: steelblue;
}
::-moz-selection {
  background: steelblue;
  color: white;
}
::selection {
  background: steelblue;
  color: white;
}
.heavyTable {
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  animation: float 5s infinite;
}
.main {
  max-width: 600px;
  padding: 10px;
  margin: auto;
}
.content {
  color: white;
  text-align: center;
}
.content p,
.content pre,
.content h2 {
  text-align: center;
}
.content pre {
  padding: 1.2em 0 0.5em;
  background: white;
  background: rgba(255, 255, 255, 0.7);
  border: 1px solid rgba(255, 255, 255, 0.9);
  color: #38678f;
}
.content .download {
  margin: auto;
  background: rgba(255, 255, 255, 0.1);
  display: inline-block;
  padding: 1em 1em;
  border-radius: 12em;
  margin-bottom: 2em;
}
.content .button {
  display: inline-block;
  text-decoration: none;
  color: white;
  height: 48px;
  line-height: 48px;
  padding: 0 20px;
  border-radius: 24px;
  border: 1px solid #38678f;
  background: steelblue;
  box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), inset 0 1px 3px rgba(255, 255, 255, 0.2);
  transition: all 0.1s;
}
.content .button:hover {
  background: #4f8aba;
  box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), inset 0 0 10px rgba(255, 255, 255, 0.1);
}
.content .button:active {
  color: #294d6b;
  background: #427aa9;
  box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), inset 0 0 5px rgba(0, 0, 0, 0.2);
}
.content .button:focus {
  outline: none;
}
h1 {
  text-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  text-align: center;
}


</style>


<script> 
    
    
    // jQuery function
(function($) {
  $.fn.heavyTable = function(params) {

    params = $.extend( {
      startPosition: {
        x: 1,
        y: 1
      }
    }, params);

    this.each(function() {
      var 
        $hTable = $(this).find('tbody'),
        i = 0,
        x = params.startPosition.x,
        y = params.startPosition.y,
        max = {
          y: $hTable.find('tr').length,
          x: $hTable.parent().find('th').length
        };
        
      //console.log(xMax + '*' + yMax);
      
      function clearCell () {    
        content = $hTable.find('.selected input').val();
        $hTable.find('.selected').html(content);
        $hTable.find('.selected').toggleClass('selected');
      }

      function selectCell () {
        if ( y > max.y ) y = max.y;
        if ( x > max.x ) x = max.x;
        if ( y < 1 ) y = 1;
        if ( x < 1 ) x = 1;
        currentCell = 
         $hTable
            .find('tr:nth-child('+(y)+')')
            .find('td:nth-child('+(x)+')');
        content = currentCell.html();
        currentCell
          .toggleClass('selected')
        return currentCell;
      }
      
      function edit (currentElement) {
        var input = $('<input>', {type: "text"})
          .val(currentElement.html())
        currentElement.html(input)
        input.focus(); 
      }

      $hTable.find('td').click( function () {
        clearCell();
        x = ($hTable.find('td').index(this) % (max.x) + 1);
        y = ($hTable.find('tr').index($(this).parent()) + 1);
        edit(selectCell());
      });

      $(document).keydown(function(e){
        if (e.keyCode == 13) {
          clearCell();
          edit(selectCell());
        } else if (e.keyCode >= 37 && e.keyCode <= 40  ) {

          clearCell();
          switch (e.keyCode) {
            case 37: x--;
            break;
            case 38: y--;
            break;
            case 39: x++;
            break;
            case 40: y++;
            break;
          }
          selectCell();
          return false;
        }
      }); 
    });
  };
})(jQuery);

// call our jQuery function

  $('.heavyTable').heavyTable({
    xPosition: 2,
    yPosition: 2
  });
    
</script>
    
    
    
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
							
<div class='main'>
    <section class="content">
      <h1>Timetable</h1>
      <p>
        
    </section>
    <table class="heavyTable">
      <thead>
        <tr>
          <td></td>
          <th>Monday</th>
          <th>Tuesday</th>
            <th>Wednesday</th>
          <th>Thursday</th>
            <th>Friday</th>
        </tr>
      </thead>
        
      <tbody>
          
         
          
          
        <tr>
        <th>9-10</th>
        <td>
            
          
            
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form>
            
            
            </td>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        </tr>
        <tr>
        <th>10-11</th>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        </tr>
        <tr>
         <th>11-12</th>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        </tr>
       <tr>
         <th>12-1</th>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        </tr>
          
          <tr>
         <th>1-2</th>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
         <td>
             <form action="option.php" method="GET">
    <select name="names">
    <option value="name1">DMBI</option>
    <option value="name2">JAVA</option>
    <option value="name3">HTML</option>
    <option value="name4">PHP</option>
    </select><br>
   
    </form></td>
        </tr>
      </tbody>
    </table>
   
     <input type="submit" name="submit" value="Insert">
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
