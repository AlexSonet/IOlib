## IOlib v0.1

> What can IO?
- Working with your Database

## Documentation

#### Connect and Disconnect
```php
$connect = io_connect(host, user, password, db); //Connect
io_disconnect($connect); //Disconnect

```

> Connect example (File db.php) 

```php
require 'libs/io.php';
$db_port = io_connect('localhost', 'root', 'passAdmin', 'ioNetwork');

```

#### Adding to a table
```php
$table = new Table('Table'); //Table = name your table
$table->add('column', 'value'); //column = column in DB, value = your value
$table->save(); //Save your request in DB

```
> Adding to a table example 

```php
require 'db.php';

$user = new Table('users');
$user->add('login', 'examplelogin');
$user->add('password', 'examplepassword');
$user->save();

```

#### Password encryption

> Get password hash

```php
$password = 'helloworld';
$hash = hashPassword($password);
 
out: $2y$10$1UK9VnZ/iXnrjIeRzZYh.exowmH32a/RB/rAx.r7Hh0mspeOQeT0O
```

> Compare entered password with hash

```php
$password = 'helloworld';
$hash = $2y$10$1UK9VnZ/iXnrjIeRzZYh.exowmH32a/RB/rAx.r7Hh0mspeOQeT0O;

if(verifyPassword($password, $hash)){
	echo 'Success';
}else{
	echo 'Error';
}

```



