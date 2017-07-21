<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Famous People Search</title>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
  <script type="text/javascript">
    // jQuery document ready function
    $(function() {
    	$(".myAutoComplete").autocomplete({
    		source: "http://35.189.17.68/mysearch.php",
    		minLength: 2,
        select: function(event, ui) {
          // Output selected name
          $(".output-container").text("Selected: " + ui.item.value);
        }
    	});
    });
  </script>

  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
  <style>
    .input-container {
      display: flex;
      flex: 1 1 auto;
      flex-direction: column;
      justify-content: flex-start;
      align-items: stretch;
      min-width: 400px;
    }

    .input-container > * {
      display: flex;
      flex: 1 1 100%;
      flex-direction: row;
      justify-content: flex-start;
      width: 100%;
    }

    .input-container > label {
      padding-bottom: 6px;
    }

    .output-container {
      display: flex;
      flex: 1 1 100%;
      flex-direction: row;
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <section>
  	<form action="" method="post">
  		<section class="input-container">
        <label>Famous Person Search v4:</label>
        <input type="text" name="person" value="" class="myAutoComplete">
      </section>
      <section class="output-container">
        <!--
        <div>Name: {{ name }}</div>
        <div>Age: {{ age }}</div>
        <div>Died: {{ death }}</div>
        <div>Country: {{ country }}</div>
        <div>Famous for: {{ famousfor }}</div>
        <div>Score: {{ famescore }}</div>
        -->
      </section>
  	</form>
  </section>
</body>
</html>
