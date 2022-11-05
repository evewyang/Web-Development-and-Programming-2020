<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		h1,h3{
			text-align: center;
		}
		#game{
			display: block;
			margin: auto;
			width: 500px;
			height: 250px;
			border: 1px solid black;
			position: relative;
			background-image: url("images/backgrounds/game_background.jpg");
		}
		#character{
			width: 30px;
			height: 50px;
			box-sizing: border-box;
			/*background-color: red;*/
			position: relative;
			top: 150px;
		}
		#block{
			width: 20px;
			height: 20px;
			background-color: #43270F;
			position: absolute;
			box-sizing: border-box;
			border: 2px solid black;
			bottom: 50px;
			right: 0px;
		}
		.animate_jump{
			animation: jump 500ms; 
		}
		.animate_block{
			animation: theblock 1s infinite linear;
		}
		@keyframes jump{
			0%{top:150px;}
			30%{top: 100px;}
			70%{top: 100px;}
			100%{top:150px;}
		}
		@keyframes theblock{
			0%{left: 480px;}
			100%{left: -40px;}
		}
		img{
			width: 30px;
			height: 50px;
		}
		#back_button{
			width: 100px;
			font-size: 20px;
			border: 2px solid black;
			background-color: beige;
			position: fixed;
		}
	</style>
</head>
<body>
	<a href="index.php"><button id="back_button">Back</button></a>
	<h1>Game</h1>
	<h3 style="color: blue">Click anywhere on the page to jump</h3>
	

	<div id="game">
		<div id="character"><img src="images/man.png"></div>
		<div id="block"></div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			let clicks = 0;
			let character = document.getElementById("character");
			let block = document.getElementById("block");
			let newwidth;
			let newheight;

			if (block.classList != "animate_block") {
				block.classList.add("animate_block");
			}
			

			function jump() {
				if (character.classList != "animate_jump") {
					//add the animate class if not have it
					character.classList.add("animate_jump");
				}
				setTimeout(removeJump,500);
			}
			function removeJump(){
				character.classList.remove("animate_jump");
			}

			document.querySelector('html').onclick = function(){
				jump();
			}

			function randomSizeBlock(){
				newwidth = parseInt(Math.random()*20)+15;//rand with 15 ~ 35;
				newheight = parseInt(Math.random()*20)+15;//rand height 15~ 35;
				document.getElementById("block").style.width = newwidth+ "px";
				document.getElementById("block").style.height = newheight+ "px";
			} 
			let intervalOne = setInterval(randomSizeBlock,1000);

			function checkLost(){
				//get integer value of character top (px)
				let characterTop = parseInt(window.getComputedStyle(character).getPropertyValue("top"));
				let blockLeft = parseInt(window.getComputedStyle(block).getPropertyValue("left"));
				//if blockLeft directly under the character & 
				if (blockLeft<30 && blockLeft>0 && characterTop>=(150-newheight)) {
					//hit! loose
					block.classList.remove("animate_block");
					clearInterval(intervalOne);
					clearInterval(intervalTwo);
					alert("You Lose!");
					block.classList.add("animate_block");
					intervalOne = setInterval(randomSizeBlock,1000);
					intervalTwo = setInterval(checkLost,10);
				}
			}

			let intervalTwo = setInterval(checkLost,10);
		})
	</script>
</body>
</html>