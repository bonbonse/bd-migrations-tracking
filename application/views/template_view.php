<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<title>r</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
              crossorigin="anonymous">


	</head>
	<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="main">Select</a>
                        <a class="navbar-brand" href="structure?table=users">Structure</a>
                        <a class="navbar-brand" href="main">Add</a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                foreach ($data['tables'][0] as $table){
                    echo "<div>" . $table . "</div>";
                }
                ?>
            </div>
            <div class="col">
                <table class="table">
                <?php include $content_view?>
                </table>
            </div>
            <div class="col">
                Migrations etr te tttttttttttttttttttttttttttttttttttttttt
            </div>
        </div>

    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous">
        </script>
    </body>
</html>