<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="alert">
            <h1>Recuerda !!!</h1>
            <form action="{{ route('' . $ruta . '.create') }}" method="get">
                @csrf
                @foreach ($alertas as $alert)
		    <div class="form-input">
		    	<input type="checkbox" name="" id="" required>
			<label for="">{{ $alert->descripcion }}</label>
		    </div>
                @endforeach
                <input type="submit" value="Enviar">
            </form>
        </div>
<img  class="img-alert" src="{{ asset('img/alerta2.png') }}">
    </div>
<!-- // Animation // -->

<svg viewBox="0 0 3387 1270">
    <path id="planePath" class="planePath" d="M-226 626c439,4 636,-213 934,-225 755,-31 602,769 1334,658 562,-86 668,-698 266,-908 -401,-210 -893,189 -632,630 260,441 747,121 1051,91 360,-36 889,179 889,179" />
    <g id="plane">
      <polygon class="fil1 fil" points="-141,-10 199,0 -198,-72 -188,-61 -171,-57 -184,-57 " />
      <polygon class="fil2 fil" points="199,0 -141,-10 -163,63 -123,9 " />
      <polygon class="fil3 fil" points="-95,39 -113,32 -123,9 -163,63 -105,53 -108,45 -87,48 -90,45 -103,41 -94,41 " />
      <path class="fil4 fil" d="M-87 48l-21 -3 3 8 19 -4 -1 -1zm-26 -16l18 7 -2 -1 32 -7 -29 1 11 -4 -24 -1 -16 -18 10 23zm10 9l13 4 -4 -4 -9 0z" />
      <polygon class="fil1 fil" points="-83,28 -94,32 -65,31 -97,38 -86,49 -67,70 199,0 -123,9 -107,27 " />
    </g>
    <!-- Define the motion path animation -->
    <animateMotion xlink:href="#plane" dur="5s" repeatCount="indefinite" rotate="auto">
      <mpath xlink:href="#planePath" />
    </animateMotion> 
  </svg>

    <style>
        body {
            background-image: linear-gradient(to right bottom, #00c9b7, #00b6c8, #00a0d6, #0087d9, #006acb);
            display: flex;
            justify-items: center;
            align-items: center;
        }
        .alert{
             min-height: 100vh;
    	     min-width: 98vw;
    	     display: flex;
	     flex-wrap: wrap;
	     flex-direction: column;
    	     justify-content: center;
   	     align-items: center;	     
        }
	input[type="checkbox"]{
	     min-width: 2.2rem;
             min-height: 2.2rem;
	     z-index: 999;
	}
	input[type="submit"]{
    	    margin: 3rem;
	    padding: 1rem 2rem;
    	    border: none;
    	    color: #fff;
    	    background: #0acfef;
    	    font-size: 1.2rem;
	    cursor: pointer;
	    z-index: 999;
            transition:all .5s ease;
	}
	input[type="submit"]:hover{
	    filter: drop-shadow(2px 4px 6px black);
	}
	form{
	   display: flex;
    	   justify-content: center;
    	   align-items: center;
    	   flex-wrap: wrap;
	   flex-direction: column;
    	   flex-basis: 7rem;
	}
	label{
	   padding: 1rem;
	   font-size: 1.3rem;
	}
	.form-input{
    		display: flex;
    		min-width: 50vw;
    		justify-content: space-between;
    		align-items: center;
	}
	.img-alert{
            position: fixed;
            top: 2%;
            right: 7%;
            max-width: 15%;
        }
	h1{
    		font-size: 7rem;
    		color: #fff;
    		filter: drop-shadow(2px 4px 6px black);
	}
/* // Animation // */

.planePath {
  stroke: #D9DADA;
  stroke-width: .1%;
  stroke-width: .5%;
  stroke-dasharray: 1% 2%;
  stroke-linecap: round;
  fill: none;
}

.fil1 {
  fill: #D9DADA;
}

.fil2 {
  fill: #C5C6C6;
}

.fil4 {
  fill: #9D9E9E;
}

.fil3 {
  fill: #AEAFB0;
}
svg{
  overflow: hidden;
  vertical-align: middle;
  position: absolute;
  width: 99%;
  top: 5%;
  z-index: 1;
}


    </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js" 
integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const imgAnimation = document.querySelector(".img-alert");


const animationLogo = document.querySelector('.img-alert');
    const Animation = gsap.timeline({
        defaults: {
            duration: 1,
            ease: "bounce.out"
        },
        repeat: -1,
        yoyo: true
    });
    Animation.fromTo(animationLogo, { opacity: 0 }, { opacity: 1 });


</script>


</body>
</html>