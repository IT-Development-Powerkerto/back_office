<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <form>
		<div class="mb-3">
			<label for="exampleInputFullname" class="form-label">Fullname</label>
			<input type="text" name="name" class="form-control" id="exampleInputFullname" aria-describedby="fullnamelHelp">
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Email address</label>
			<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="mb-3">
			<label for="exampleInputPhone" class="form-label">Phone</label>
			<input type="text" name="phone" class="form-control" id="exampleInputPhone" aria-describedby="phonelHelp">
		</div>
		<div class="mb-3">
			<label for="exampleInputUsername" class="form-label">Username</label>
			<input type="text" name="username" class="form-control" id="exampleInputUsername" aria-describedby="usernamelHelp">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1">
		</div>
		<div class="row align-items-center col-12 pb-5">
			<div class="col-2">
				<label for="inputimage" class="col-form-label">Image</label>
			</div>
			<div class="dropdown col-10">
				<div class="mb-3">
					<input class="form-control" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>