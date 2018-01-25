<?php 
    require('conn.php');
    $packagename = $_GET['id'];

    if(isset($_POST['remove'])) {
        $remove = $db->prepare("DELETE FROM dishes WHERE id = ? LIMIT 1");
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
  <br /><br />
  <div class="container2">
   <br />
   
   <div class="table-responsive">
   <form action='index.php' method='post'>
    <table class="table table-bordered" id="crud_table">
     <tr class = 'header'>
      <th width="1%"></th>
      <th width="40%" >Dish Name</th>
      <th width="10%">Category</th>
      <th wdith = "1%"></th>
      
     </tr>
     <tr class = 'data'>
      <td></td>
      <td style = "display:none;" class = 'package'><?php echo $packagename; ?></td>
     
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
     
      <td style = "display:none;" class = 'package'><?php echo $packagename; ?></td>
     
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
     
      <td style = "display:none;" class = 'package'><?php echo $packagename; ?></td>
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
     
      <td style = "display:none;" class = 'package'><?php echo $packagename; ?></td>
     
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
     
      <td style = "display:none;" class = 'package'><?php echo $packagename; ?></td>
     
      <td contenteditable="true" class="dishname"></td>
      <td  class="category">Vegetables</td>
      <td><button type="button" name="4add" id="4add" class="btn btn-success btn-xs">+</button></td>
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
     
      <td style = "display:none;" class = 'package'><?php echo $packagename; ?></td>
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
     
      <td style = "display:none;" class = 'package'><?php echo $packagename; ?></td>
     
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
     
      <td style = "display:none;" class = 'package'><?php echo $packagename; ?></td>
     
      <td contenteditable="true" class="dishname"></td>
      <td class="category">Drinks</td>
      <td><button type="button" name="7add" id="7add" class="btn btn-success btn-xs">+</button></td>
     </tr>
    </table>
    
   </form>
    <div align="right">
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
  var html_code = "<tr class ='data'id='row"+count+"'>";
   html_code += "<td></td>"
   
   html_code += "<td style = 'display:none;' class = 'package'><?php echo $packagename; ?></td>"
   
   html_code += "<td contenteditable='true' class='dishname'></td>";
   html_code += " <td class='category'>Pasta</td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#crud_table').append(html_code);
 
 });
    
$('#1add').click(function(){
  count1 = count1 + 1;
  var html_code = "<tr class ='data'id='row"+count1+"'>";
   html_code += "<td></td>"
   
   html_code += "<td style = 'display:none;' class = 'package'><?php echo $packagename; ?></td>"
   
   html_code += "<td contenteditable='true' class='dishname'></td>";
   html_code += " <td class='category'>Pork</td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count1+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#1crud_table').append(html_code);
 
 });
    
$('#2add').click(function(){
  count2 = count2 + 1;
  var html_code = "<tr class ='data'id='row"+count2+"'>";
   html_code += "<td></td>"
   
   html_code += "<td style = 'display:none;' class = 'package'><?php echo $packagename; ?></td>"
   
   html_code += "<td contenteditable='true' class='dishname'></td>";
   html_code += " <td class='category'>Beef</td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count2+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#2crud_table').append(html_code);
 
 });

$('#3add').click(function(){
  count3 = count3 + 1;
  var html_code = "<tr class ='data'id='row"+count3+"'>";
   html_code += "<td></td>"
   
   html_code += "<td style = 'display:none;' class = 'package'><?php echo $packagename; ?></td>"
   
   html_code += "<td contenteditable='true' class='dishname'></td>";
   html_code += " <td class='category'>Chicken</td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count3+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#3crud_table').append(html_code);
 
 });
    
$('#4add').click(function(){
  count4 = count4 + 1;
  var html_code = "<tr class ='data'id='row"+count4+"'>";
   html_code += "<td></td>"
   
   html_code += "<td style = 'display:none;' class = 'package'><?php echo $packagename; ?></td>"
   
   html_code += "<td contenteditable='true' class='dishname'></td>";
   html_code += " <td class='category'>Vegetables</td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count4+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#4crud_table').append(html_code);
 
 });
    
$('#5add').click(function(){
  count5 = count5 + 1;
  var html_code = "<tr class ='data'id='row"+count5+"'>";
   html_code += "<td></td>"
   
   html_code += "<td style = 'display:none;' class = 'package'><?php echo $packagename; ?></td>"
   
   html_code += "<td contenteditable='true' class='dishname'></td>";
   html_code += " <td class='category'>Seafood</td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count5+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#5crud_table').append(html_code);
 
 });
    
$('#6add').click(function(){
  count6 = count6 + 1;
  var html_code = "<tr class ='data'id='row"+count6+"'>";
   html_code += "<td></td>"
   
   html_code += "<td style = 'display:none;' class = 'package'><?php echo $packagename; ?></td>"
   
   html_code += "<td contenteditable='true' class='dishname'></td>";
   html_code += " <td class='category'>Dessert</td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count6+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#6crud_table').append(html_code);
 
 });
    
$('#7add').click(function(){
  count7 = count7 + 1;
  var html_code = "<tr class ='data'id='row"+count7+"'>";
   html_code += "<td></td>"
   
   html_code += "<td style = 'display:none;' class = 'package'><?php echo $packagename; ?></td>"
   html_code += "<td contenteditable='true' class='dishname'></td>";    
   html_code += " <td  class='category'>Drinks</td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count7+"' class='btn2 remove'>-</button></td>";   
   html_code += "</tr>";
     
   $('#7crud_table').append(html_code);
 
 });
    
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var package = [];
  var dishname = [];
  var category = [];
     
 
  $('.dishname').each(function(){
   dishname.push($(this).text());
  });
 $('.package').each(function(){
   package.push($(this).text());
  });
  $('.category').each(function(){
   category.push($(this).text());
  });
 
  $.ajax({
   url:"add.php",
   method:"POST",
   data:{package:package, dishname:dishname, category:category},
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
    <div class = 'container2'>
        <table class = 'tableremove'>
           <tr class = 'header'>
            <th>Dish Name</th>
            <th>Category</th>
            <th>Action</th>
            </tr>

<?php 
 $stmt = $db->query("SELECT * FROM dishes WHERE package = {$packagename}");
            while($column = $stmt->fetch_assoc()):
  ?>
        <tr class = 'data'>
        <td><?php echo $column['dishname']?></td>
        <td><?php echo $column['category']?></td>
               <form action='Edit.php?id=<?= $packagename ?>' method='post'>
                <td><input class = 'removedish' type='submit' name='remove' value='Remove X'></td>
                <td><input type = 'hidden' name = 'aid' value = '<?php echo $column['id']; var_dump($column['id']);?>'></td>
        </form>
        </tr>
        <?php endwhile; ?>
        </table>
    </div>
    
</html>