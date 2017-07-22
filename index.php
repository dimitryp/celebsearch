<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AutoComplete Demo</title>

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

  <style>
    body {
      margin: 0;
      padding: 0;
      background: #e4f5ff;
    }

    .input-container,
    .output-container {
      display: flex;
      flex: 1 1 100%;
      flex-direction: column;
      justify-content: flex-start;
      align-items: stretch;
      min-width: 400px;
    }

    .input-container > *,
    .output-container > * {
      display: flex;
      flex: 1 1 100%;
      flex-direction: row;
      justify-content: flex-start;
      width: 100%;
    }

    .input-container {
      margin-right: 25px;
    }

    .input-container > label {
      padding-bottom: 6px;
    }

    .output-container {
      margin-top: 50px;
    }

    h1 {
      font-size: 24px
    }

    h2 {
      font-size: 18px;
      text-decoration: underline;
    }

    label > span {
      display: inline-block;
      padding-bottom: 7px;
    }

    label > span:first-of-type {
      font-weight: bold;
      min-width: 100px;
    }

    .ui-menu-item {
      padding: 0 0 1px 0 !important;
    }

    .myAutoComplete {
      padding: 8px 10px 7px 10px;
      max-width: 560px;
    }

    ul.ui-autocomplete > li:nth-child(2n+1) {
      background: #e2e2e2;
    }

    #project {
      position: relative;
      padding: 0 25px 50px 25px;
    }
  </style>
</head>
<body>
  <section id="project">
    <h1>Autocomplete Demo</h1>

  	<form action="" method="post">
  		<section class="input-container">
        <h2>Celebrity Death 2016 Search v1:</h2>
        <input type="text" name="person" value="" class="myAutoComplete">
      </section>
      <section class="output-container">
        <h2>Selected</h2>
        <label>
          <span>ID:</span>
          <span class="personId"></span>
        </label>
        <label>
          <span>Name:</span>
          <span class="personName"></span>
        </label>
        <label>
          <span>Died:</span>
          <span class="personDied"></span>, aged&nbsp;<span class="personAge"></span>
        </label>
        <label>
          <span>Country:</span>
          <span class="personCountry"></span>
        </label>
        <label>
          <span>Famous for:</span>
          <span class="personFamousfor"></span>
        </label>
        <label>
          <span>Fame score:</span>
          <span class="personFamescore"></span>
        </label>
      </section>
  	</form>
  </section>

  <script type="text/javascript">
    // jQuery document ready function
    $(function() {
      $(".output-container").hide();
    	$(".myAutoComplete").autocomplete({
        minLength: 2,
        delay: 350,
        autoFocus: true,
    		source: "http://lb2.celeb.dimitryp.com/celeb/mysearch.php",
        select: function(event, ui) {
          var item = ui.item;

          // Output selected person
          $(".personId").text(item["id"]);
          $(".personName").text(item["name"]);
          $(".personAge").text(item["age"]);
          $(".personDied").text(item["year"]);
          $(".personCountry").text(item["country"]);
          $(".personFamousfor").text(item["famousfor"]);
          $(".personFamescore").text(item["famescore"]);

          $(".output-container").show();
        }
    	})
      .data('uiAutocomplete')
      ._renderMenu = (function(ul, items) {
        var context = this;

        $.each(items, function(index, item) {
          item["label"] = item["name"];
          item["value"] = item["name"];

          context._renderItemData(ul, item);
        });
      });
    });
  </script>
</body>
</html>


