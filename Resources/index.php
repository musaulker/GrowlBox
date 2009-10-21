<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
	<script type="text/javascript" src="jquery-1.3.2.js"></script>
	<script type="text/javascript" charset="utf-8">
		//Initialize app on page load
		$(function() {
			//Add drag data to drag targets
			var defcon1 = document.getElementById("defcon1");
		  defcon1.addEventListener("dragstart", function(event) {
		    event.dataTransfer.setData("text/plain", "It's the end of the world as we know it!");
		  });
			var defcon2 = document.getElementById("defcon2");
		  defcon2.addEventListener("dragstart", function(event) {
		    event.dataTransfer.setData("text/plain", "The Cubs just won the World Series!");
		  });
			var defcon3 = document.getElementById("defcon3");
		  defcon3.addEventListener("dragstart", function(event) {
		    event.dataTransfer.setData("text/plain", "Chipotle just ran out of pinto beans!");
		  });
			var defcon4 = document.getElementById("defcon4");
		  defcon4.addEventListener("dragstart", function(event) {
		    event.dataTransfer.setData("text/plain", "Just missed the Caltrain - bummer!");
		  });
			var defcon5 = document.getElementById("defcon5");
		  defcon5.addEventListener("dragstart", function(event) {
		    event.dataTransfer.setData("text/plain", "Law and Order on every channel?  Could be worse...");
		  });
		
			//Set up the 'Growl Box'
			var target = document.getElementById("growlbox");
			target.addEventListener("dragenter", function(event) {
			  event.preventDefault();
			  return true;
			});
			target.addEventListener("dragover", function(event) {
			  event.preventDefault();
			  return true;
			});
			target.addEventListener("drop", function(event) {
			  var data = event.dataTransfer.getData("text/plain");
			  var notification = Titanium.Notification.createNotification(Titanium.UI.getMainWindow());
				notification.setTitle("DEFCON Alert");
				notification.setMessage(data);
				notification.show();
			});
		});
	</script>
	
	<!-- Showing off PHP script access to the DOM -->
	<script type="text/php">
    $jQuery()->ready(function() use (&$jQuery) {
      $jQuery('.defcon')->mouseenter(function() use (&$jQuery) {
          $jQuery('#help')->show();
      });
			$jQuery('.defcon')->mouseleave(function() use (&$jQuery) {
          $jQuery('#help')->hide();
      });
    });
  </script>
</head>
<body>
  <?php echo("<h3>GrowlBox</h3>"); ?>
	<div id="growlbox"></div>
	<div class="defcon" id="defcon1">DEFCON 1</div>
	<div class="defcon" id="defcon2">DEFCON 2</div>
	<div class="defcon" id="defcon3">DEFCON 3</div>
	<div class="defcon" id="defcon4">DEFCON 4</div>
	<div class="defcon" id="defcon5">DEFCON 5</div>
	<div id="help">
		Drag the defcon level to the growl box to create a notification.
	</div>
</body>
</html>
