<!DOCTYPE html>
<html>
<head>
    <title> CRUD Operations</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<body>
    <div class="container">
        <h2 style="text-align: center" class="mt-5">Car Application</h2>
        
         <div class="search-form">
            
            <form id="search_form">
              
                    <input type="text" class="form-control mt-5 w-75" id="search_input" data-toggle="tooltip" placeholder="Search car">
                
                <button type="submit" class="btn btn-primary mt-2" >Search</button>
            </form>
        </div>
        <br><br>
        <button class="btn btn-primary add-btn " style="margin-right:20px">Add Car</button>
        <br>
        <div class="add-form">
            <h3>Add Car</h3>
            <form id="add_form">
               
                    <label for="make">Make:</label>
                    <input type="text" class="form-control" id="make" name="make" required>
                
               
                    <label for="model">Model:</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                
              
                   Color:
                    <input type="text" class="form-control" id="color" name="color" required>
               
        
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
               
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
        <br><br> 
        <div id="car_records"></div>
        
       <div id="pagination"></div>
    </div>
    
    
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="script.js">
        
    </script>
</body>
</html>
