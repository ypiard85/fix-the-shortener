<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400&display=swap" rel="stylesheet">
		<style>
			/* Reset du pauvre... */
			*{
				margin:0;
				padding:0;
			}

			body, html{
				height: 100%;
			}

			.logo{
				height: 120px;
				position: fixed;
				display: block;
				left: 50%;
				top: 50%;
				transform: translateY(-170px) translateX(-50%);
				margin: 0 auto;
			}

			body{
				font-family: 'Source Sans Pro', sans-serif;
				background: #edeff1;
				overflow: hidden;
			}

			.background{
				position: fixed;
				perspective: 200px;
				top: 100%;
				transform: translateY(-59%) scale(1.5);
				width: 100%;
				text-align: center;
				opacity: .2;
				pointer-events: none;
				perspective-origin: center;
			}

			.background img{
				width: 100%;
				transform: rotateX(32deg);
			}
			form{
				position: absolute;
				left: 50%;
				top: 50%;
				transform: translateY(-50%) translateX(-50%);
				background: white;
				border-radius: 4px;
				box-shadow: 2px 2px 7px 0px #00000029;
				backface-visibility: hidden;
				padding:5px;
			}

			form + form{
				transform: translateY(-50%) translateX(-50%) rotateX(180deg);
			}

			.rotate{
				transition: transform 0.8s;
				transform-style: preserve-3d;
				height: 100%;
			}

			.rotate.active {
				transform: rotateX(180deg);
			}

			input{
				width: 500px;
			}
			input, button {
				font-size: 20px;
				line-height: 30px;
				padding: 7px 24px;
				border: none;
				background: transparent;
				outline: none;
			}

			button {
				background: #000;
				color: #fff;
				border-radius: 4px;
			}
		</style>
	</head>
	<body>
		<div class="background"><img src="img/background.svg"></div>

		<img src="img/logo.png" class="logo">

		<div id="card" class="rotate">
			<form id="shortener" action="" class="recto">
				<input id="target" type="url" required placeholder="http://...">
				<button type="submit">Short</button>
			</form>

			<form>
				<input id="result" type="url" readonly>
			</form>
		</div>
		<script>
			shortener.addEventListener('submit', async (e) => {
				e.preventDefault();

				const response = await fetch('/?page=api.php&target='+encodeURI(target.value));
				const content = await response.json();

				result.value = content.url;
				result.focus();
				result.select();

				card.classList.add('active');
			});
		</script>
	</body>
</html>