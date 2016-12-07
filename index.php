<html>
	<head>
		<!-- Title -->
		<title>Artificial Intelligence</title>

		<!-- CSS -->

		<!-- Javascript -->
		<script src="jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<canvas id="canvas" width="500px" height="300px"></canvas>
		<input type="file" id="file-input">
		
		<div id="alert"></div>
		<div id="color" style="height:100px; width:200px;"></div>
		
		<script>
			$(function() {
			    $('#file-input').change(function(e) {
			        var file = e.target.files[0],
			            imageType = /image.*/;
			        
			        if (!file.type.match(imageType))
			            $('#alert').append('not an image');
			        
			        var reader = new FileReader();
			        reader.onload = fileOnload;
			        reader.readAsDataURL(file);
			        
			    });
			    
			    function fileOnload(e) {
			        var $img = $('<img>', { src: e.target.result });
			        var canvas = $('#canvas')[0];
			        var context = canvas.getContext('2d');
			        var color = document.getElementById("color");
			        var red = 0;

			        $img.on('load', function() {
			            context.drawImage(this, 0, 0);
			        });

			        canvas.onmousemove = function(e) {
					    // not so sure about these... might need to offset them or so
					    var x = e.x;
					    var y = e.y;

					    // set color now
					    var canvasColor = context.getImageData(x, y, 1, 1).data; // rgba e [0,255]
					    var r = canvasColor[0];
					    var g = canvasColor[1];
					    var b = canvasColor[2];


							$('#alert').append('Red :' + canvasColor[0]);

					    color.style.backgroundColor = 'rgb(' + r + ',' + g + ',' + b + ')';
					}

					for(var i=0; i<500; i++)
					{
						for(var j=0; j<300; j++)
						{
					    	$('#alert').append(i + j);
						}
					}

					// $('#alert').append('Red :' + red);
			    }
			});
		</script>
	</body>
</html>