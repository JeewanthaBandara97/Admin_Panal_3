<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


	
<div class="container">
	
	<svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
		 <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
		 <circle cx="170" cy="170" r="135" stroke="#404041"/>
		 <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
		 <circle cx="170" cy="170" r="85" stroke="#404041"/>
	</svg>
	
</div>

<style>
.container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  min-height: 100vh;
  background-color: #ededed;
}

.loader {
  max-width: 15rem;
  width: 100%;
  height: auto;
  stroke-linecap: round;
}

circle {
  fill: none;
  stroke-width: 3.5;
  -webkit-animation-name: preloader;
          animation-name: preloader;
  -webkit-animation-duration: 3s;
          animation-duration: 3s;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-timing-function: ease-in-out;
          animation-timing-function: ease-in-out;
  -webkit-transform-origin: 170px 170px;
          transform-origin: 170px 170px;
  will-change: transform;
}
circle:nth-of-type(1) {
  stroke-dasharray: 550;
}
circle:nth-of-type(2) {
  stroke-dasharray: 500;
}
circle:nth-of-type(3) {
  stroke-dasharray: 450;
}
circle:nth-of-type(4) {
  stroke-dasharray: 300;
}
circle:nth-of-type(1) {
  -webkit-animation-delay: -0.15s;
          animation-delay: -0.15s;
}
circle:nth-of-type(2) {
  -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s;
}
circle:nth-of-type(3) {
  -webkit-animation-delay: -0.45s;
  -moz-animation-delay:  -0.45s;
          animation-delay: -0.45s;
}
circle:nth-of-type(4) {
  -webkit-animation-delay: -0.6s;
  -moz-animation-delay: -0.6s;
          animation-delay: -0.6s;
}

@-webkit-keyframes preloader {
  50% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@keyframes preloader {
  50% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

</style>
https://codepen.io/matchboxhero/pen/bomWGK?editors=1100