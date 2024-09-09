<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	.light {
		width: 50px;
		height: 50px;
		background-color: red;
		border-radius: 50%;
		border: 1px solid black;
	}

	.light.container {
		display: flex;
		flex-direction: column;
		align-items: center;
		margin: 5px 0;
	}

	.green {
		background-color: green;
	}

	.yellow {
		background-color: yellow;
	}

	.letter {
		margin-left: 18px;
		padding: 2px;
	}
</style>

<body>
	<h4>Signal Configuration</h4>
	<form>
		<label>Sequence (e.g., A, B, C, D)</label>
		<input type="text" id="sequence" name="sequence">
		<br><br>
		<label>Green Interval (In Seconds)</label>
		<input type="number" id="green_interval" name="green_interval">
		<br><br>
		<label>Yellow Interval (In Seconds)</label>
		<input type="number" id="yellow_interval" name="yellow_interval">
		<br><br>

		<button type="button" id="startButton">Start</button>
		<button type="button" id="stopButton">Stop</button>
	</form>
	<br><br>
	<div>
		<div class="light-container">
			<div id="lightA" class="light"></div>

			<label class="letter">A</label>
		</div>
		<div class="light-container">
			<div id="lightB" class="light"></div>

			<label class="letter">B</label>
		</div>
		<div class="light-container">
			<div id="lightC" class="light"></div>

			<label class="letter">C</label>
		</div>
		<div class="light-container">
			<div id="lightD" class="light"></div>

			<label class="letter">D</label>
		</div>

	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {

			var timer;
			var sequenceindex = 0;

			document.getElementById('stopButton').addEventListener('click', function () {
				clearInterval(timer);//stop sequence
				resetlight();
				var requestURl = '<?= base_url() ?>' + 'index.php/SignalController/Stop_sequence';

				var xhr = new XMLHttpRequest();
				xhr.open('POST', requestURl, true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.onreadystatechange = function () {
					if (xhr.readyState === 4 && xhr.status === 200) {
						var response = xhr.responseText;
						//console.log(response);
						var data = JSON.parse(response);
						//alert(data);
						if (data.status === 'success') {
							alert(data.message);
							clearInterval(timer);//stop sequence
							resetlight();

						} else {
							alert(data.message);
						}
					}
				};
				xhr.onerror = function () {
					alert('An error occured while processing request');
				}
				xhr.send();

			});
			document.getElementById('startButton').addEventListener('click', function () {
				var sequence = document.getElementById('sequence').value.toUpperCase().split(',');//to convert the uppercase and comma seprated
				var green_interval = document.getElementById('green_interval').value * 10;//convert to milisecond
				var yellow_interval = document.getElementById('yellow_interval').value * 10;

				var requestURl = '<?= base_url() ?>' + 'index.php/SignalController/Start_sequence';
				//alert(requestURl);
				//send ajax request to controller

				var xhr = new XMLHttpRequest();
				xhr.open('POST', requestURl, true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.onreadystatechange = function () {
					if (xhr.readyState === 4 && xhr.status === 200) {
						var response = xhr.responseText;
						//console.log(response);
						var data = JSON.parse(response);
						//alert(data);
						if (data.status === 'success') {
							alert(data.message);
							startSequence(data.sequence.split(','), parseInt(data.green_interval), parseInt(data.yellow_interval));
							//alert(data.sequence);
						} else {
							alert(data.message);
						}
					}
				};
				xhr.onerror = function () {
					alert('An error occured while processing request');
				}
				xhr.send('sequence=' + encodeURIComponent(sequence.join(',')) + '&green_interval=' + encodeURIComponent(green_interval) + '&yellow_interval=' + encodeURIComponent(yellow_interval));

			});

			function startSequence(sequence, green_interval, yellow_interval) {

				clearInterval(timer);
				sequenceindex = 0;
				timer = setInterval(function () {
					resetlight();

					if (sequenceindex < sequence.length) {
						var currentlight = sequence[sequenceindex].trim();//trim whitespace
						var light = document.getElementById('light' + currentlight);
						if (light) {
							light.classList.remove('yellow');
							light.classList.add('green');
							setTimeout(function () {
								light.classList.remove('green');
								light.classList.add('yellow');
							}, green_interval);
						} sequenceindex++;
					} else {
						sequenceindex = 0;//loop back to start
					}
				}, green_interval + yellow_interval);//total time interval(green +yellow)
			}

			function resetlight() {
				var lights = document.querySelectorAll('.light');
				lights.forEach(function (light) {
					light.classList.remove('green', 'yellow');
					light.classList.add('light');
				});
			}

		});

	</script>

</body>

</html>
