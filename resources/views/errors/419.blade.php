<html>

<head>
	<link href="style.css" rel="stylesheet">
</head>

<body>
 
  <h1>Expiró'.</h1>
  <h3>La sesion ha expirado, por favor recargue la pagina <span id="f5">(F5)</span> e intente nuevamente.</h3>
<a id="botonA">
<button id="botonB" href="{{route('login')}}">
  Inicio
</button>
</a>
  <script src="app.js"></script>
  
</body>
<style>
  *{
    padding: 0px;
    margin: 0px auto;
}

body{
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    background-image: url({{ asset('img/error/404.gif') }});
}

h1{
    font-size: 55px;
    font-weight: bold;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color: #0e7263;
    padding: 15px;
    margin: 15px;
}

h3{
    font-size: 25px;
    font-weight: 300;
    font-style: oblique;
    padding: 15px;
    margin: 25px;
}

#botonA{
    text-decoration: none;
    margin: 25px;
}

#botonB{
    width: 150px;
    padding: 15px;
    background: #0e7263;
    color: #fff;
    font-size: 35px;
    border-radius: 15px;
    border: 1px solid #0e7263;
    transition: all 500ms;
}

#botonB:hover{
    background: #fff;
    color: #0e7263;
}

#f5{
    font-weight: bold;
    text-decoration: dotted;
}
</style>
</html>