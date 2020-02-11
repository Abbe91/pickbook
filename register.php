<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Pick Book</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>

<body class="text-center">
      <br>
      <br>
      <h2>Register</h2>
      <div class="d-md-flex align-items-center h-md-100 p-3 justify-content-center">
            <form enctype="multipart/form-data" method="POST" action="server/classes/registerfunction.php">
                  <div class="form-group row">
                        <label for="inputUsername" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                              <input type="text" name="name" class="form-control" aria-describedby="emailHelp" required
                                    placeholder="Enter name">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                              <input type="text" name="email" class="form-control" aria-describedby="emailHelp" required
                                    placeholder="Enter email">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputUsername" class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                              <input type="text" name="address" class="form-control" aria-describedby="emailHelp"
                                    required placeholder="Enter address">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                              <input type="phone" name="phone" class="form-control" aria-describedby="emailHelp"
                                    required placeholder="Enter phone">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputUsername" class="col-sm-4 col-form-label">City</label>
                        <div class="col-sm-8">
                              <input type="text" name="city" class="form-control" aria-describedby="emailHelp" required
                                    placeholder="Enter city">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Zipcode</label>
                        <div class="col-sm-8">
                              <input type="number" name="zipcode" class="form-control" aria-describedby="emailHelp"
                                    required placeholder="Enter zipcode">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputUsername" class="col-sm-4 col-form-label">Post No</label>
                        <div class="col-sm-8">
                              <input type="number" name="postnumber" class="form-control" aria-describedby="emailHelp"
                                    required placeholder="Enter post number">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Country</label>
                        <div class="col-sm-8">
                              <input type="text" name="country" class="form-control" aria-describedby="emailHelp"
                                    required placeholder="Enter country">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputUsername" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                              <input type="password" name="password" class="form-control" aria-describedby="emailHelp"
                                    required placeholder="Enter password">
                        </div>
                  </div>
                  <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                              <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                  </div>
            </form>
      </div>
</body>

</html>