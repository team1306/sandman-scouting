<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="css/image-picker.css" rel="stylesheet">
	<script type="text/javascript" src="js/image-picker.js"></script>
</head>
<select class="image-picker show-html">
  <option value=""></option>
  <option data-img-src="http://placekitten.com/300/200" value="1">Cute Kitten 1</option>
  <option data-img-src="http://placekitten.com/150/200" value="2">Cute Kitten 2</option>
  <option data-img-src="http://placekitten.com/400/200" value="3">Cute Kitten 3</option>
</select>
<script>
	 $(document).ready(function () {
                $(".image-picker").imagepicker();
            });
</script>
</html>