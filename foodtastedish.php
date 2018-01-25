<?php  
    require('conn.php');

    if(isset($_POST['tangal'])) {
        $remove = $db->prepare("DELETE FROM availabledish WHERE id = ? LIMIT 1");
        $remove->bind_param('s', $_POST['aid']);
        $remove->execute();
    }
    

?>

<!DOCTYPE html>
<html>
<head>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
  <div class="nav">
        <a href="index.php"><img src="img/logo.png" alt="Home"></a>
            <div class="navcenter">
                <a href="Packages.php">Packages</a>
                <a href="services.php">Events</a>
                <a href="about.php">About</a>
           <?php 
            if(isset($_SESSION["uid"])):
            if($_SESSION['type'] == 1): ?>
                <a href="clients.php">Administrator</a>
            <?php else: ?>
                <a href="Profile.php">Profile</a>
             <?php endif; 
            endif;?>
            </div>
           
        <?php if(isset($_SESSION["uid"])): ?>
        <span class="loginbtn"><a href="logout.php">Log Out</a></span>
        <?php else: ?>
        <span class="loginbtn"><a href="login.php">Log In</a></span>
        <?php endif; ?>
   </div>
    <div class="sidebar">
        <ul>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="admin.php">Manage Orders</a></li>
            <li><a href="Createpackage.php">Create Package</a></li>
            <li><a href="applyfoodtaste.php">Food Taste Requests</a></li>
            <li><a class="active" href="foodtastedish.php">Food Taste Dish</a></li>
           <?php if ($_SESSION['type'] == 1): ?>
            <li><a href="inbox2.php">Messages</a></li>
           <?php else: ?>
           <li><a class="active" href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
  <br /><br />
  <div class="contentside">
   <br />
   
   <div class="table-responsive">
   <form class = 'dishes' action='index.php' method='post'>
    <table class="table table-bordered" id="crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>
     
     
     
      <td contenteditable="true" class="dishname"></td>
      <td class="category">Pasta</td>
      <td><button type="button" name="add" id="add" class="btn">+</button></td>
     </tr>
    </table>
 
     <table class="table table-bordered" id="1crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>
      <td contenteditable="true" class="dishname"></td>
      <td  class="category">Pork</td>
      <td><button type="button" name="1add" id="1add" class="btn btn-success btn-xs">+</button></td>
     </tr>
    </table>
     
     
     <table class="table table-bordered" id="2crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>
    
     
      <td contenteditable="true" class="dishname"></td>
      <td  class="category">Beef</td>
      <td><button type="button" name="2add" id="2add" class="btn btn-success btn-xs">+</button></td>
     </tr>
    </table>

  
     <table class="table table-bordered" id="3crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>
 
     
      <td contenteditable="true" class="dishname"></td>
      <td  class="category">Chicken</td>
      <td><button type="button" name="3add" id="3add" class="btn btn-success btn-xs">+</button></td>
     </tr>
    </table>
    

     <table class="table table-bordered" id="4crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>

     
      <td contenteditable="true" class="dishname"></td>
      <td  class="category">Vegetables</td>
      <td><button type="button" name="4add" id="4add" class="btn">+</button></td>
     </tr>
    </table>

     <table class="table table-bordered" id="5crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>
          
      <td contenteditable="true" class="dishname"></td>
      <td class="category">Seafood</td>
      <td><button type="button" name="5add" id="5add" class="btn btn-success btn-xs">+</button></td>
     </tr>
    </table>
    

     <table class="table table-bordered" id="6crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>
     
  
      <td contenteditable="true" class="dishname"></td>
      <td class="category">Dessert</td>
      <td><button type="button" name="6add" id="6add" class="btn btn-success btn-xs">+</button></td>
     </tr>
    </table>
    
    
     <table class="table table-bordered" id="7crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>
     
 
     
      <td contenteditable="true" class="dishname"></td>
      <td class="category">Drinks</td>
      <td><button type="button" name="7add" id="7add" class="btn btn-success btn-xs">+</button></td>
     </tr>
    </table>
    
   </form>
    <div align = 'right'>
     <button type="button" name="save" id="save" class="save">Save &#10004</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>
  
</body>
</html>

<script>
$(document).ready(function(){
 var count = 100;
 var count1 = 200;
 var count2 = 300;
 var count3 = 400;
 var count4 = 500;
 var count5 = 600;
 var count6 = 700;
 var count7 = 800;
    
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr class = 'data' id='row"+count+"'>";
   html_code += "<td></td>"
   html_code += "<td contenteditable='true' class='dishname'></td>";
   html_code += " <td class='category'>Pasta</td>";
   html_code += "<td><button type='button' name='remove' data-row8='row"+count+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#crud_table').append(html_code);
 
 });
    
$('#1add').click(function(){
  count1 = count1 + 1;
  var html_code1 = "<tr class = 'data' id='row"+count1+"'>";
   html_code1 += "<td></td>"
   html_code1 += "<td contenteditable='true' class='dishname'></td>";
   html_code1 += " <td class='category'>Pork</td>";
   html_code1 += "<td><button type='button' name='remove1' data-row1='row"+count1+"' class='btn2 remove1'>-</button></td>";   
   html_code1 += "</tr>";
     
   $('#1crud_table').append(html_code1);
 
 });
    
$('#2add').click(function(){
  count2 = count2 + 1;
  var html_code2 = "<tr class = 'data' id='row"+count2+"'>";
   html_code2 += "<td></td>"
   html_code2 += "<td contenteditable='true' class='dishname'></td>";
   html_code2 += " <td class='category'>Beef</td>";
   html_code2 += "<td><button type='button' name='remove2' data-row2='row"+count2+"' class='btn2 remove2'>-</button></td>";   
   html_code2 += "</tr>";
     
   $('#2crud_table').append(html_code2);
 
 });

$('#3add').click(function(){
  count3 = count3 + 1;
  var html_code3 = "<tr class = 'data' id='row"+count3+"'>";
   html_code3 += "<td></td>" 
   html_code3 += "<td contenteditable='true' class='dishname'></td>";
   html_code3 += " <td class='category'>Chicken</td>";
   html_code3 += "<td><button type='button' name='remove3' data-row3='row"+count3+"' class='btn2 remove3'>-</button></td>";   
   html_code3 += "</tr>";
     
   $('#3crud_table').append(html_code3);
 
 });
    
$('#4add').click(function(){
  count4 = count4 + 1;
  var html_code4 = "<tr class = 'data' id='row"+count4+"'>";
   html_code4 += "<td></td>"
   html_code4 += "<td contenteditable='true' class='dishname'></td>";
   html_code4 += " <td class='category'>Vegetables</td>";
   html_code4 += "<td><button type='button' name='remove4' data-row4='row"+count4+"' class='btn2 remove4'>-</button></td>";   
   html_code4 += "</tr>";
     
   $('#4crud_table').append(html_code4);
 
 });
    
$('#5add').click(function(){
  count5 = count5 + 1;
  var html_code5 = "<tr class = 'data' id='row"+count5+"'>";
   html_code5 += "<td></td>"
   html_code5 += "<td contenteditable='true' class='dishname'></td>";
   html_code5 += " <td class='category'>Seafood</td>";
   html_code5 += "<td><button type='button' name='remove5' data-row5='row"+count5+"' class='btn2 remove5'>-</button></td>";   
   html_code5 += "</tr>";
     
   $('#5crud_table').append(html_code5);
 
 });
    
$('#6add').click(function(){
  count6 = count6 + 1;
  var html_code6 = "<tr class = 'data' id='row"+count6+"'>";
   html_code6 += "<td></td>"
   html_code6 += "<td contenteditable='true' class='dishname'></td>";
   html_code6 += " <td class='category'>Dessert</td>";
   html_code6 += "<td><button type='button' name='remove6' data-row6='row"+count6+"' class='btn2 remove6'>-</button></td>";   
   html_code6 += "</tr>";
     
   $('#6crud_table').append(html_code6);
 
 });
    
$('#7add').click(function(){
  count7 = count7 + 1;
  var html_code7 = "<tr class = 'data' id='row"+count7+"'>";
   html_code7 += "<td></td>"
   html_code7 += "<td contenteditable='true' class='dishname'></td>";    
   html_code7 += " <td  class='category'>Drinks</td>";
   html_code7 += "<td><button type='button' name='remove7' data-row7='row"+count7+"' class='btn2 remove7'>-</button></td>";   
   html_code7 += "</tr>";
     
   $('#7crud_table').append(html_code7);
 
 });
    
 
 $(document).on('click', '.remove', function(){
  var delete_row8 = $(this).data("row8");
  $('#' + delete_row8).remove();
 });
 $(document).on('click', '.remove1', function(){
  var delete_row1 = $(this).data("row1");
  $('#' + delete_row1).remove();
 });
$(document).on('click', '.remove2', function(){
  var delete_row2 = $(this).data("row2");
  $('#' + delete_row2).remove();
 });
$(document).on('click', '.remove3', function(){
  var delete_row3 = $(this).data("row3");
  $('#' + delete_row3).remove();
 });
$(document).on('click', '.remove4', function(){
  var delete_row4 = $(this).data("row4");
  $('#' + delete_row4).remove();
 });
$(document).on('click', '.remove5', function(){
  var delete_row5 = $(this).data("row5");
  $('#' + delete_row5).remove();
 });
$(document).on('click', '.remove6', function(){
  var delete_row6 = $(this).data("row6");
  $('#' + delete_row6).remove();
 });
$(document).on('click', '.remove7', function(){
  var delete_row7 = $(this).data("row7");
  $('#' + delete_row7).remove();
 });

	
 
 $('#save').click(function(){
  var dishname = [];
  var category = [];
     
 
  $('.dishname').each(function(){
   dishname.push($(this).text());
  });

  $('.category').each(function(){
   category.push($(this).text());
  });
 
  $.ajax({
   url:"addfoodtaste.php",
   method:"POST",
   data:{dishname:dishname, category:category},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    f
   }
  });
 });
 
 
});
</script>
<html>
    <div class = 'foodtaste-table'>
      <form class = 'tableremove' action='foodtastedish.php' method='post'>
        <table>
           <tr class = 'header'>
            <th>Dish Name</th>
            <th>Category</th>
            <th>Action</th>
            </tr>

<?php 
 $stmt = $db->query("SELECT * FROM availabledish");
            while($column = $stmt->fetch_assoc()):

  ?>
        <tr class ='data'>
        <td><?php echo $column['dishname']?></td>
        <td><?php echo $column['category']?></td>
               <form action='foodtastedish.php' method='post'>
                <td><input type='submit' name='tangal' class = 'removedish' value='Remove X'></td>
                <td><input type='hidden' name = 'aid' value=<?php echo $column['id']; ?></td>
       		   </form>
        </tr>
        <?php endwhile; ?>
        </table>
    </div>
    
</html>
