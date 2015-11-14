<?
# Connect to the Database:
try {
  $host = 'localhost'; // Host name
  $name = 'pdo'; // Database name
  $user = 'pdo'; // Username
  $pass = 'thepassword'; // Password
  $dbc = new PDO("mysql:host=$host;dbname=$name", "$user", "$pass");
}
catch(PDOException $e) {
    echo $e->getMessage();
}

# Add new database record:
if(isset($_POST['add'])){
  
  # Prepare statement with named placeholders:
  $stmt = $dbc->prepare("INSERT INTO users ( first,last,website ) values ( :first, :last, :website )");
    
  # Assign values to named placeholders  
  $stmt->bindParam(':first', $_POST['first']);
  $stmt->bindParam(':last', $_POST['last']);
  $stmt->bindParam(':website', $_POST['website']);
  
  $stmt->execute();

}

# Save a database record:
if(isset($_POST['save'])){
  
  # Prepare statement with unnamed placeholders:
  $stmt = $dbc->prepare("UPDATE users SET first = ?, last = ?, website = ? WHERE id = ?");
    
  # Assign values to unnamed placeholders  
  $stmt->bindParam(1, $_POST['first']);
  $stmt->bindParam(2, $_POST['last']);
  $stmt->bindParam(3, $_POST['website']);
  $stmt->bindParam(4, $_POST['id']);
  
  $stmt->execute();

}
?>

<!DOCTYPE html>
<html>
  <head>
  
    <title>PDO</title>  

  </head>
  <body>
    <div class="container-fluid">
      
      <header class="row">
        <h1>PDO with MySQL</h1>
      </header>    

      <div class="row">
        <form method="post">
            <input name="first" placeholder="First Name">
            <input name="last" placeholder="Last Name">
            <input name="website" placeholder="Website Address">
            <button name="add" type="submit">Add</button>
          </div>        
        </form>
      </div>   
    
      <hr>
      
      <table>
        
        <thead>
          
          <tr>
            <th>ID</th>
            <th>First</th>
            <th>Last</th>
            <th>Website</th>
            <th>Save</th>          
          </tr>
          
        </thead>
        
        <tbody>
          
          <?
          # Pull all database records:
          $stmt = $dbc->query('SELECT * FROM users');
          $stmt->setFetchMode(PDO::FETCH_ASSOC); // Set mode to associative array
          
          while($data= $stmt->fetch()){?>
            <form method="post">
              <tr>
                <td><input name="id" value="<?=$data['id']?>" readonly></td>
                <td><input name="first" value="<?=$data['first']?>"></td>
                <td><input name="last" value="<?=$data['last']?>"></td>
                <td><input name="website" value="<?=$data['website']?>"></td>
                <td><button name="save" type="submit">Save</button></td>
              </tr>
            </form>
          <?}?>             
          
        </tbody>   
    
    </div>

  </body>
  
</html>    
