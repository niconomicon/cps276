<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Form Assignment</title>
  </head>
  <body>
    <div class="container">
        <form>
            <!--First & Last Name Fields-->
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname">
                    </div>
                </div>
            </div>
            <!--Address Field-->
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address">
            </div>
            <!--City, State, Zip Fields-->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city">
                </div>
                <div class="form-group col-md-4">
                    <label for="state">State</label>
                    <select id="state" class="form-control">
                        <option>Connecticut</option>
                        <option>New York</option>
                        <option selected>Michigan</option>
                        <option>Oregon</option>
                        <option>California</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>
            
            <!--Gender Radio Buttons-->
            <div class="form-group">
                <!--<label for="gender">Gender</label>-->
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genderOptions" id="maleRadio" value="option1">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genderOptions" id="femaleRadio" value="option2">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
            </div>
            <!--Register Button-->
            <button type="submit" class="btn btn-primary">Register</button>
        </form> 
    </div>     

    
  </body>
</html>