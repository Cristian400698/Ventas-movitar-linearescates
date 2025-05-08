@extends('layouts.main', ['activePage' => 'tenten', 'titlePage' => ''])
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">TEN TEN</h3>
                        <br>
                        </center>
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                            {{ session('success') }}
                            </div>
                            @endif
                            @if (session('warning'))
                            <div class="alert alert-warning" role="warning">
                                {{ session('warning') }}
                                </div>
                            @endif
                            <form action="{{ url('/tentenportabilidad') }}" method="POST" enctype="multipart/form-data"
                                class="form-horizontal">
                                {{ csrf_field() }}
                                <br>
                                <input type="hidden" id="agente" name="agente" value="{{ $user_id }}">
                                <input type="hidden" id="dia" name="dia" class="form-control" placeholder="hora"
                                    value="{{ $date }}" required>
                                <input type="hidden" id="hora" name="hora" class="form-control" placeholder="hora"
                                    value="{{ $hora }}" required>
                                <input type="hidden" id="revisados" name="revisados" class="form-control"
                                    value="Nuevo" required>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="number" id="numero" name="numero" class="form-control"
                                            placeholder="Numero Celular" min="1" onkeypress="return num(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="number" id="documento" name="documento" class="form-control"
                                            placeholder="Documento de identidad" min="1" onkeypress="return num(event)"
                                            required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" id="nombres" name="nombres" class="form-control"
                                            placeholder="Nombres" onkeypress="return check(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" id="apellidos" name="apellidos" class="form-control"
                                            placeholder="Apellidos" onkeypress="return check(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="mail" id="correo" name="correo" class="form-control"
                                            placeholder="Ingrese correo electronico ejemplo@gmail.com" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="" style="color: black">Seleccione una Opción</label>
                                        <div class="form-check form-check-inline">
                                            <input class="j-chek" type="radio" name="selector" id="selector1"
                                                value="leads" required >
                                            <label class="form-check-label j2-chek" for="selector1" style="color: black">Leads</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="j-chek" type="radio" name="selector" id="selector2"
                                                value="BBDD">
                                            <label class="form-check-label j2-chek" for="selector2" style="color: black">BBDD</label>
                                        </div>
                                    </div>
                                    {{-- Ciudad departamento --}}
                                    <div class="form-group col-md-6">
                                        <select name="departamento" id="Tipificacion_detalle_1" class="form-control" style="border-radius: 10px">
                                            
                                        </section>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input hidden>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="id_ciudad" id="Tipificacion_detalle_2" class="form-control" style="border-radius: 10px">
                                            <option value="">Ciudad</option>
                                        </section>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input hidden>
                                    </div>
                                    {{-- fin ciudad departamento --}}     
                                    <div class="form-group col-md-6">
                                        <input type="text" id="barrio" name="barrio" class="form-control"
                                            placeholder="Barrio" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" id="direccion" name="direccion" class="form-control"
                                            required style="border-radius: 10px">
                                            <input type="button" id="mostrarFormulario2" class="form-control" value="Direccion">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="number" id="nip" name="nip" class="form-control" placeholder="NIP"
                                            min="1" onkeypress="return num(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="tipocliente" id="tipocliente" class="form-control" required style="border-radius: 10px">
                                            <option value="0">Tipo de cliente</option>
                                            @foreach ($tipoclientes as $tipocliente)
                                                <option value="{{ $tipocliente->nombre }}">
                                                    {{ $tipocliente->nombre }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="planadquiere" id="planadquiere" class="form-control" required style="border-radius: 10px">
                                            <option value="0">Plan que adquire</option>
                                            @foreach ($Planadquieres as $Planadquiere)
                                            <option value="{{ $Planadquiere->planadquiere }}">{{ $Planadquiere->planadquiere }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="number" id="ncontacto" name="ncontacto" class="form-control"
                                            placeholder="Numero de contacto" min="1" onkeypress="return num(event)"
                                            required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="number" id="imei" name="imei" class="form-control" placeholder="Imei"
                                            min="1" onkeypress="return num(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text"  class="form-control"
                                            placeholder="segmento" value="Portabilidad" hidden>
                                    </div>
                                    <div class="col-sm-3 col-form-label">
                                        <label for="fvc" style="color: black">FVC</label>
                                        <input type="date" id="fvc" name="fvc" class="form-control" placeholder="FVC"
                                            required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-3 col-form-label">
                                        <label for="fentrega" style="color: black">Fecha Entrega</label>
                                        <input type="date" id="fentrega" name="fentrega" class="form-control"
                                            placeholder="Fecha de entrega" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-3 col-form-label">
                                        <label for="fexpedicion" style="color: black">Fecha Expedición</label>
                                        <input type="date" id="fexpedicion" name="fexpedicion" class="form-control"
                                            placeholder="Fecha de expedición" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-3 col-form-label">
                                        <label for="fnacimiento" style="color: black">Fecha Nacimiento</label>
                                        <input type="date" id="fnacimiento" name="fnacimiento" class="form-control"
                                            placeholder="Fecha de Nacimiento" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="confronta" style="color: black">Confronta</label>
                                        <input type="file" id="confronta" name="confronta" class="form-control"
                                            placeholder="confronta" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="likewize" style="color: black">likewize</label>
                                        <input type="file" id="likewize" name="likewize" class="form-control"
                                            placeholder="likewize" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="ley2300" style="color: black">ley2300</label>
                                        <input type="file" id="ley2300" name="ley2300" class="form-control"
                                            placeholder="ley2300" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select name="origen" id="origen" class="form-control" required style="border-radius: 10px">
                                            <option value="0">Origen de la migracion</option>
                                            @foreach ($origen as $origens)
                                                <option value="{{ $origens->origen }}">{{ $origens->origen }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="number" id="ngrabacion" name="ngrabacion" class="form-control"
                                            placeholder="Numero de grabacion" min="1" onkeypress="return num(event)"
                                            required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="number" id="orden" name="orden" class="form-control"
                                            placeholder="Numero de Orden" required style="border-radius: 10px" onkeypress="return num(event)">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea id="observaciones" name="observaciones" class="form-control" rows="3"
                                            placeholder="Observaciones" required style="border-radius: 10px"></textarea>
                                    </div>
                                    <div class="card-footer">                                     
                                        <button type="submit" class="btn btn-info btn-sm" style="border-radius: 10px"> Enviar</button>                                      
                                    </div>
                          
                            <script src="{{ asset('js/app.js') }}"></script>
                        </div>
                        <script>
                            function check(e) {
                                tecla = (document.all) ? e.keyCode : e.which;

                                // Patron de entrada, en este caso solo acepta numeros y letras  
                                patron =
                                    /[a, b, c, d, e, f, g, h, i, j, k, l, m, n, ñ, o, p, q, r, s, t, u, v, w, x, y, z,A, B, C, D, E, F, G, H, I, J, K, L, M, N, Ñ, O, P, Q, R, S, T, U, V, W, X, Y, Z]/;
                                tecla_final = String.fromCharCode(tecla);
                                return patron.test(tecla_final);
                            }
                        </script>


                        <script>
                            function num(e) {
                                tecla = (document.all) ? e.keyCode : e.which;

                                // Patron de entrada, en este caso solo acepta numeros y letras  
                                patron = /[1,2,3,4,5,6,7,8,9,0]/;
                                tecla_final = String.fromCharCode(tecla);
                                return patron.test(tecla_final);
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
   <script>
        var input=  document.getElementById('numero');
    input.addEventListener('input',function(){
      if (this.value.length > 10) 
         this.value = this.value.slice(0,10); 
    })
    </script>

    <script>
        var input=  document.getElementById('ncontacto');
    input.addEventListener('input',function(){
    if (this.value.length > 10) 
        this.value = this.value.slice(0,10); 
    })
    </script>

   {{-- CIUDAD DEPART --}}

  <script>
    let $Tipificacion_detalle_1 = document.getElementById('Tipificacion_detalle_1')
    let $Tipificacion_detalle_2 = document.getElementById('Tipificacion_detalle_2')

    let tp1 = ['Amazonas',
             'Antioquia',
             'Arauca',
             'Atlántico',
             'Bolívar',
             'Boyacá',
             'Caldas',
             'Caquetá',
             'Casanare',
             'Cauca',
             'Cesar',
             'Chocó',
             'Córdoba',
             'Cundinamarca',
             'Guainía',
             'Guaviare',
             'Huila',
             'La Guajira',
             'Magdalena',
             'Meta',
             'Nariño',
             'Norte de Santander',
             'Putumayo',
             'Quindío',
             'Risaralda',
             'San Andrés y Providencia',
             'Santander',
             'Sucre',
             'Tolima',
             'Valle del Cauca',
             'Vaupés',
             'Vichada',  ]


    let tp2 = ['Leticia','La Chorrera', 'La Pedrera', 'La Victoria', 'Mirití Paraná', 'Puerto Alegría', 'Puerto Arica', 'Puerto Nariño', 'Puerto Santander', 'Tarapacá', 
                'Medellin', 'Abejorral', 'Abriaquí', 'Alejandría', 'Amagá', 'Amalfi', 'Andes', 'Angelópolis', 'Angostura', 'Anorí', 'Anzá', 'Apartadó', 'Arboletes', 'Argelia', 'Armenia', 'Barbosa', 'Bello', 'Belmira', 'Betania', 'Betulia', 'Briceño', 'Buriticá', 'Cáceres', 'Caicedo', 'Caldas', 'Campamento', 'Cañasgordas', 'Caracolí', 'Caramanta', 'Carepa', 'Carolina del Príncipe', 
                'Caucasia', 'Chigorodó', 'Cisneros', 'Ciudad Bolívar', 'Cocorná', 'Concepción', 'Concordia', 'Copacabana', 'Dabeiba', 'Donmatías', 'Ebéjico', 'El Bagre', 'El Carmen de Viboral', 'El Peñol', 'El Retiro', 'El Santuario', 'Entrerríos', 'Envigado', 'Fredonia', 'Frontino', 'Giraldo', 'Girardota', 'Gómez Plata', 'Granada', 'Guadalupe', 'Guarne', 'Guatapé', 'Heliconia', 'Hispania', 'Itagüí',
                'Ituango', 'Jardín', 'Jericó', 'La Ceja', 'La Estrella', 'La Pintada', 'La Unión', 'Liborina', 'Maceo', 'Marinilla', 'Montebello', 'Murindó', 'Mutatá', 'Nariño', 'Nechí', 'Necoclí', 'Olaya', 'Peque', 'Pueblorrico', 'Puerto Berrío', 'Puerto Nare', 'Puerto Triunfo', 'Remedios', 'Rionegro', 'Sabanalarga', 'Sabaneta', 'Salgar',
                'San Andrés de Cuerquia', 'San Carlos' ,'San Francisco', 'San Jerónimo', 'San José de la Montaña', 'San Juan de Urabá', 'San Luis', 'San Pedro de los Milagros', 'San Pedro de Urabá', 'San Rafael', 'San Roque', 'San Vicente', 'Santa Bárbara', 'Santa Fe de Antioquia', 'Santa Rosa de Osos', 'Santo Domingo', 'Segovia', 'Sonsón', 'Sopetrán', 'Támesis', 'Tarazá', 'Tarso', 'Titiribí', 'Toledo', 'Turbo',
                'Uramita', 'Urrao', 'Valdivia', 'Valparaíso', 'Vegachí', 'Venecia', 'Vigía del Fuerte', 'Yalí', 'Yarumal', 'Yolombó', 'Yondó', 'Zaragoza',
                'Arauca', 'Arauquita' ,'Cravo Norte', 'Fortul', 'Puerto Rondón', 'Saravena' ,'Tame',
                'Barranquilla', 'Baranoa', 'Campo de la Cruz' ,'Candelaria', 'Galapa', 'Juan de Acosta' ,'Luruaco' ,'Malambo', 'Manatí' ,'Palmar de Varela' ,'Piojó', 'Polonuevo', 'Ponedera', 'Puerto Colombia', 'Repelón', 'Sabanagrande', 'Sabanalarga', 'Santa Lucía', 'Santo Tomás', 'Soledad', 'Suan', 'Tubará', 'Usiacurí',
                'Cartagena de Indias', 'Achí', 'Altos del Rosario' ,'Arenal', 'Arjona', 'Arroyohondo', 'Barranco de Loba', 'Calamar', 'Cantagallo', 'Cicuco', 'Clemencia', 'Córdoba', 'El Carmen de Bolívar', 'El Guamo' ,'El Peñón', 'Hatillo de Loba', 'Magangué' ,'Mahates', 'Margarita ', 'María La Baja', 'Montecristo', 'Morales', 'Norosí', 'Pinillos', 'Regidor' ,'Río Viejo', 'San Cristóbal', 'San Estanislao',
                'San Fernando' ,'San Jacinto' ,'San Jacinto del Cauca', 'San Juan Nepomuceno', 'San Martín de Loba' ,'San Pablo', 'Santa Catalina', 'Santa Cruz de Mompox', 'Santa Rosa', 'Santa Rosa del Sur', 'Simití', 'Soplaviento', 'Talaigua Nuevo', 'Tiquisio', 'Turbaco', 'Turbaná' ,'Villanueva', 'Zambrano' ,
                'Tunja' ,'Almeida' ,'Aquitania', 'Arcabuco', 'Belén', 'Berbeo' ,'Betéitiva', 'Boavita' ,'Boyacá', 'Briceño', 'Buenavista' ,'Busbanzá', 'Caldas', 'Campohermoso' ,'Cerinza', 'Chinavita', 'Chiquinquirá', 'Chíquiza', 'Chiscas', 'Chita', 'Chitaraque', 'Chivatá', 'Chivor', 'Ciénega', 'Cómbita' ,'Coper', 'Corrales' ,'Covarachía', 'Cubará', 'Cucaita', 'Cuítiva' ,'Duitama', 'El Cocuy', 'El Espino', 'Firavitoba', 'Floresta' ,'Gachantivá', 'Gámeza', 'Garagoa', 'Guacamayas', 'Guateque' ,'Guayatá' ,'Güicán', 'Iza', 'Jenesano' ,'Jericó',
                'La Capilla' ,'La Uvita', 'La Victoria' ,'Labranzagrande', 'Macanal', 'Maripí', 'Miraflores', 'Mongua', 'Monguí', 'Moniquirá', 'Motavita', ,'Muzo', 'Nobsa' ,'Nuevo Colón' ,'Oicatá', 'Otanche' ,'Pachavita', 'Páez', 'Paipa', 'Pajarito', 'Panqueba', 'Pauna', 'Paya' ,'Paz de Río' ,'Pesca', 'Pisba' ,'Puerto Boyacá' ,'Quípama' ,'Ramiriquí', 'Ráquira', 'Rondón', 'Saboyá' ,'Sáchica', 'Samacá', 'San Eduardo' ,'San José de Pare', 'San Luis de Gaceno', 'San Mateo', 'San Miguel de Sema', 'San Pablo de Borbur', 'Santa María', 'Santa Rosa de Viterbo', 
                'Santa Sofía', 'Santana' ,'Sativanorte', 'Sativasur', 'Siachoque', 'Soatá', 'Socha', 'Socotá', 'Sogamoso', 'Somondoco', 'Sora', 'Soracá', 'Sotaquirá', 'Susacón' ,'Sutamarchán', 'Sutatenza' ,'Tasco', 'Tenza', 'Tibaná', 'Tibasosa' ,'Tinjacá', 'Tipacoque', 'Toca' ,'Togüí' ,'Tópaga', 'Tota', 'Tununguá' ,'Turmequé', 'Tuta' ,'Tutazá', 'Úmbita', 'Ventaquemada', 'Villa de Leyva', 'Viracachá' ,'Zetaquira',
                'Risaralda' ,'Aguadas', 'Anserma' ,'Aranzazu', 'Belalcázar', 'Chinchiná' ,'Filadelfia', 'La Dorada' ,'La Merced' ,'Manizales', 'Manzanares', 'Marmato' ,'Marquetalia', 'Marulanda' ,'Neira' ,'Norcasia' ,'Pácora' ,'Palestina' ,'Pensilvania', 'Riosucio' ,'Salamina' ,'Samaná' ,'San José', 'Supía' ,'Victoria' ,'Villamaría', 'Viterbo' ,
                'Florencia' ,'Albania' ,'Belén de los Andaquíes' ,'Cartagena del Chairá' ,'Curillo' ,'El Doncello' ,'El Paujil' ,'La Montañita' ,'Morelia' ,'Puerto Milán' ,'Puerto Rico' ,'San José del Fragua' ,'San Vicente del Caguán' ,'Solano' ,'Solita', 'Valparaíso',  
                'Yopal', 'Aguazul', 'Chámeza' ,'Hato Corozal', 'La Salina', 'Maní', 'Monterrey' ,'Nunchía' ,'Orocué', 'Paz de Ariporo', 'Pore' ,'Recetor' ,'Sabanalarga' ,'Sácama', 'San Luis de Palenque' ,'Támara', 'Tauramena', 'Trinidad', 'Villanueva', 
                'Popayán' ,'Almaguer', 'Argelia', 'Balboa', 'Bolívar', 'Buenos Aires', 'Cajibío', 'Caldono' ,'Caloto' ,'Corinto' ,'El Tambo', 'Florencia' ,'Guachené', 'Guapi', 'Inzá' ,'Jambaló' ,'La Sierra' ,'La Vega', 'López de Micay' ,'Mercaderes' ,'Miranda' ,'Morales' ,'Padilla' ,'Páez' ,'Patía', 'Piamonte', 'Piendamó', 'Puerto Tejada' ,'Puracé-Coconuco' ,'Rosas', 'San Sebastián' ,'Santa Rosa' ,'Santander de Quilichao' ,'Silvia' ,'Sotará', 'Suárez' ,'Sucre' ,'Timbío', 'Timbiquí', 'Toribío', 'Totoró' ,'Villa Rica',
                'Valledupar' ,'Aguachica' ,'Agustín Codazzi', 'Astrea', 'Becerril' ,'Bosconia' ,'Chimichagua', 'Chiriguaná', 'Curumaní' ,'El Copey' ,'El Paso' ,'Gamarra' ,'González' ,'La Gloria' ,'La Jagua de Ibirico', 'La Paz' ,'Manaure Balcón del Cesar' ,'Pailitas' ,'Pelaya' ,'Pueblo Bello' ,'Río de Oro' ,'San Alberto' ,'San Diego' ,'San Martín' ,'Tamalameque', 
                'Quibdó' ,'Acandí', 'Alto Baudó' ,'Atrato' ,'Bagadó' ,'Bahía Solano' ,'Bajo Baudó', 'Bojayá' ,'Cértegui' ,'Condoto' ,'El Cantón de San Pablo', 'El Carmen de Atrato', 'El Carmen del Darién', 'El Litoral de San Juan' ,'Istmina', 'Juradó', 'Lloró', 'Medio Atrato' ,'Medio Baudó' ,'Medio San Juan', 'Nóvita', 'Nuquí' ,'Río Iró' ,'Río Quito' ,'Riosucio' ,'San José del Palmar', 'Sipí', 'Tadó',  'Unguía' ,'Unión Panamericana', 
                'Montería' ,'Ayapel', 'Buenavista', 'Canalete', 'Cereté', 'Chimá' ,'Chinú', 'Ciénaga de Oro', 'Cotorra', 'La Apartada' ,'Los Córdobas' ,'Momil' ,'Montelíbano' ,'Moñitos' ,'Planeta Rica', 'Pueblo Nuevo',  'Puerto Escondido', 'Puerto Libertador', 'Purísima', 'Sahagún' ,'San Andrés de Sotavento' ,'San Antero' ,'San Bernardo del Viento' ,'San Carlos', 'San José de Uré' ,'San Pelayo' ,'Santa Cruz de Lorica' ,'Tierralta', 'Tuchín' ,'Valencia' ,
                'Agua de Dios','Albán', 'Anapoima', 'Anolaima', 'Apulo', 'Arbeláez', 'Beltrán', 'Bituima', 'Bojacá', 'Bogota', 'Cabrera', 'Cajicá', 'Caparrapí', 'Cáqueza', 'Carmen de Carupa', 'Chaguaní', 'Chía', 'Chipaque', 'Choachí', 'Chocontá', 'Cogua', 'Cota', 'Cucunubá', 'El Colegio', 'El Peñón', 'El Rosal', 'Facatativá', 'Fómeque', 'Fosca', 'Funza', 'Fúquene', 'Fusagasugá', 'Gachalá', 'Gachancipá', 'Gachetá', 'Gama', 'Girardot', 'Granada', 'Guachetá', 'Guaduas', 'Guasca', 'Guataquí', 'Guatavita', 'Guayabal de Síquima', 'Guayabetal', 'Gutiérrez', 'Jerusalén', 'Junín', 'La Calera', 'La Mesa', 'La Palma', 'La Peña','La Vega', 'Lenguazaque', 'Machetá', 'Madrid', 
                'Manta', 'Medina', 'Mosquera', 'Nariño', 'Nemocón', 'Nilo', 'Nimaima', 'Nocaima', 'Pacho', 'Paime', 'Pandi', 'Paratebueno', 'Pasca', 'Puerto Salgar', 'Pulí', 'Quebradanegra', 'Quetame', 'Quipile', 'Ricaurte', 'San Antonio del Tequendama', 'SanBernardo', 'SanCayetano', 'San Francisco' ,'San Juan de Rioseco', 'Sasaima', 'Sesquilé', 'Sibaté', 'Silvania', 'Simijaca' ,'Soacha', 'Sopó', 'Subachoque', 'Suesca', 'Supatá', 'Susa', 'Sutatausa', 'Tabio', 'Tausa', 'Tena', 'Tenjo', 'Tibacuy', 'Tibirita', 'Tocaima', 'Tocancipá', 'Topaipí', 'Ubalá', 'Ubaque', 'Ubaté', 'Une', 'Útica', 'Venecia', 'Vergara', 'Vianí', 'Villagómez', 'Villapinzón', 'Villeta', 'Viotá', 
                'Yacopí', 'Zipacón', 'Zipaquirás', 'Inírida','Barrancominas','Cacahual','La Guadalupe','Morichal Nuevo','Pana Pana','Puerto Colombia','San Felipe','San José del Guaviare ', 'Calamar', 'El Retorno', 'Miraflores', 'Neiva', 'Acevedo', 'Agrado', 'Aipe', 'Algeciras', 'Altamira', 'Baraya', 'Campoalegre', 'Colombia', 'Elías', 'Garzón', 'Gigante', 'Guadalupe', 'Hobo', 'Íquira', 'Isnos', 'La Argentina', 'La Plata', 'Nátaga', 'Oporapa', 'Paicol', 'Palermo', 'Palestina', 'Pital', 'Pitalito', 'Rivera', 'Saladoblanco', 'San Agustín', 'Santa María', 'Suaza', 'Tarqui', 'Tello', 'Teruel', 'Tesalia', 'Timaná', 'Villavieja', 'Yaguará', 'Riohacha', 'Albania', 'Barrancas',
                'Dibulla', 'Distracción', 'El Molino','Fonseca', 'Hatonuevo', 'La Jagua del Pilar', 'Maicao', 'Manaure', 'San Juan del Cesar', 'Uribia', 'Urumita', 'Villanueva', 'Santa Marta', 'Algarrobo', 'Aracataca', 'Ariguaní', 'Cerro de San Antonio', 'Chibolo', 'Ciénaga', 'Concordia', 'El Banco', 'El Piñón', 'El Retén', 'Fundación', 'Guamal', 'Nueva Granada', 'Pedraza', 'Pijiño del Carmen', 'Pivijay', 'Plato','Pueblo Viejo', 'Remolino', 'Sabanas de San Ángel', 'Salamina', 'San Sebastián de Buenavista', 'San Zenón', 'Santa Ana', 'Santa Bárbara de Pinto', 'Sitionuevo', 'Tenerife', 'Zapayán', 'Zona Bananera', 'Villavicencio', 'Acacías', 'Barranca de Upía', 'Cabuyaro',
                'Castilla La Nueva', 'Cubarral', 'Cumaral', 'El Calvario', 'El Castillo', 'El Dorado', 'Fuente de Oro', 'Granada', 'Guamal', 'La Macarena', 'La Uribe', 'Lejanías', 'Mapiripán', 'Mesetas', 'Puerto Concordia', 'Puerto Gaitán', 'Puerto Lleras', 'Puerto López', 'Puerto Rico', 'Restrepo', 'San Carlos de Guaroa', 'SanJuan de Arama', 'San Juanito', 'San Martín', 'Vista Hermosa', 'Pasto', 'Albán', 'Aldana', 'Ancuya', 'Arboleda', 'Barbacoas', 'Belén', 'Buesaco', 'Chachagüí', 'Colón', 'Consacá', 'Contadero', 'Córdoba', 'Cuaspud', 'Cumbal', 'Cumbitara', 'El Charco', 'El Peñol',  'El Rosario', 'El Tablón de Gómez','El Tambo','Francisco Pizarro', 'Funes', 'Guachucal',
                'Guaitarilla', 'Gualmatán', 'Iles', 'Imués', 'Ipiales', 'La Cruz', 'La Florida', 'La Llanada', 'La Tola', 'La Unión', 'Leiva', 'Linares', 'Los Andes', 'Magüí Payán', 'Mallama', 'Mosquera', 'Nariño', 'Olaya Herrera', 'Ospina', 'Policarpa', 'Potosí', 'Providencia', 'Puerres', 'Pupiales', 'Ricaurte', 'Roberto Payán', 'Samaniego', 'San Bernardo', 'San Lorenzo', 'San Pablo', 'San Pedro de Cartago', 'Sandoná', 'Santa Bárbara', 'Santacruz', 'SapuyesTaminango', 'Tangua', 'Tumaco', 'Túquerres', 'Yacuanquer', 'Cúcuta', 'Ábrego', 'Arboledas', 'Bochalema', 'Bucarasica', 'Cáchira', 'Cácota', 'Chinácota', 'Chitagá', 'Convención', 'Cucutilla', 'Durania', 'El Carmen',
                'El Tarra', 'El Zulia', 'Gramalote', 'Hacarí', 'Herrán', 'La Esperanza', 'La Playa de Belén', 'Labateca', 'Los Patios', 'Lourdes', 'Mutiscua', 'Ocaña', 'Pamplona', 'Pamplonita', 'Puerto Santander', 'Ragonvalia', 'Salazar de Las Palmas', 'San Calixto', 'San Cayetano', 'Santiago', 'Santo Domingo de Silos', 'Sardinata', 'Teorama', 'Tibú', 'Toledo', 'Villa Caro', 'Villa del Rosario', 'Mocoa', 'Colón' ,'Orito', 'Puerto Asís', 'Puerto Caicedo', 'Puerto Guzmán', 'Puerto Leguízamo', 'San Francisco', 'San Miguel', 'Santiago', 'Sibundoy', 'Valle del Guamuez', 'Villagarzón', 'Armenia', 'Buenavista', 'Calarcá', 'Circasia', 'Córdoba', 'Filandia', 'Génova', 'La Tebaida',
                'Montenegro', 'Pijao', 'Quimbaya', 'Salento', 'Pereira', 'Apía', 'Balboa', 'Belén de Umbría', 'Dosquebradas', 'Guática', 'La Celia', 'La Virginia', 'Marsella', 'Mistrató', 'Pueblo Rico', 'Quinchía', 'Santa Rosa de Cabal', 'Santuario', 'San Andres Isla', 'Providencia', 'Santa Catalina', 'Bucaramanga', 'Aguada', 'Albania', 'Aratoca', 'Barbosa', 'Barichara', 'Barrancabermeja', 'Betulia', 'Bolívar', 'Cabrera', 'California', 'Capitanejo', 'Carcasí', 'Cepitá', 'Cerrito', 'Charalá', 'Charta', 'Chima', 'Chipatá', 'Cimitarra', 'Concepción', 'Confines', 'Contratación', 'Coromoro', 'Curití', 'El Carmen de Chucurí', 'El Guacamayo', 'El Peñón', 'El Playón', 'Encino', 
                'Enciso', 'Florián', 'Floridablanca', 'Galán', 'Gámbita', 'Girón', 'Guaca', 'Guadalupe', 'Guapotá', 'Guavatá', 'Güepsa', 'Hato', 'Jesús María', 'Jordán', 'La Belleza', 'La Paz', 'Landázuri', 'Lebrija', 'Los Santos', 'Macaravita', 'Málaga', 'Matanza', 'Mogotes', 'Molagavita', 'Ocamonte', 'Oiba' ,'Onzaga', 'Palmar', 'Palmas del Socorro', 'Páramo', 'Piedecuesta', 'Pinchote', 'Puente Nacional', 'Puerto Parra', 'Puerto Wilches', 'Rionegro' ,'Sabana de Torres', 'San Andrés', 'San Benito', 'San Gil', 'San Joaquín', 'San José de Miranda', 'San Miguel', 'San Vicente de Chucurí','Santa Bárbara', 'Santa Helena del Opón', 'Simacota', 'Socorro', 'Suaita', 'Sucre',
                'Suratá', 'Tona', 'Valle de San José', 'Vélez', 'Vetas' ,'Villanueva', 'Zapatoca', 'Sincelejo', 'Buenavista', 'Caimito', 'Chalán', 'Colosó', 'Corozal', 'Coveñas', 'El Roble', 'Galeras', 'Guaranda', 'La Unión', 'Los Palmitos', 'Majagual', 'Morroa', 'Ovejas', 'Palmito', 'Sampués', 'San Benito Abad', 'San Juan de Betulia', 'San Marcos', 'San Onofre', 'San Pedro', 'Santiago de Tolú', 'Sincé', 'Sucre', 'Toluviejo', 'Ibagué', 'Alpujarra', 'Alvarado' ,'Ambalema', 'Anzoátegui', 'Armero', 'Ataco', 'Cajamarca', 'Carmen de Apicalá' ,'Casabianca', 'Chaparral', 'Coello', 'Coyaima', 'Cunday', 'Dolores', 'Espinal', 'Falan' ,'Flandes', 'Fresno', 'Guamo', 'Herveo', 
                'Honda ','Icononzo', 'Lérida', 'Líbano', 'Melgar', 'Murillo', 'Natagaima', 'Ortega', 'Palocabildo', 'Piedras', 'Planadas', 'Prado', 'Purificación', 'Rioblanco', 'Roncesvalles', 'Rovira', 'Saldaña', 'San Antonio', 'San Luis', 'San Sebastián de Mariquita' ,'Santa Isabel', 'Suárez', 'Valle de San Juan', 'Venadillo', 'Villahermosa', 'Villarrica', 'Cali', 'Alcalá', 'Andalucía', 'Ansermanuevo', 'Argelia', 'Bolívar', 'Buenaventura', 'Buga', 'Bugalagrande', 'Caicedonia', 'Calima El Darién', 'Candelaria', 'Cartago', 'Dagua', 'El Águila','El Cairo',' El Cerrito', 'El Dovio', 'Florida', 'Ginebra', 'Guacarí', 'Jamundí', 'La Cumbre', 'La Unión', 'La Victoria',
                'Obando', 'Palmira', 'Pradera', 'Restrepo', 'Riofrío', 'Roldanillo', 'San Pedro', 'Sevilla', 'Toro', 'Trujillo', 'Tuluá', 'Ulloa', 'Versalles', 'Vijes', 'Yotoco', 'Yumbo', 'Zarzal','Mitú', 'Carurú', 'Pacoa', 'Papunaua', 'Taraira', 'Yavaraté', 'Puerto Carreño', 'Cumaribo', 'La Primavera', 'Santa Rosalía',



  








            ]
    
    function mostrarLugares(arreglo, lugar) {
        let elementos = '<option selected disables>Departamento</option>'

        for (let i = 0; i < arreglo.length; i++) {
            elementos += '<option value="' + arreglo[i] + '">' + arreglo[i] + '</option>'
        }

        lugar.innerHTML = elementos
    }

    mostrarLugares(tp1, $Tipificacion_detalle_1)

    function recortar(array, inicio, fin, lugar) {
        let recortar = array.slice(inicio, fin)
        mostrarLugares(recortar, lugar)
    }

    $Tipificacion_detalle_1.addEventListener('change', function () {
        let valor = $Tipificacion_detalle_1.value

        switch (valor) {  
            case 'Amazonas':
                recortar(tp2, 0, 10, $Tipificacion_detalle_2)
                break
            case 'Antioquia':
                recortar(tp2, 10, 135, $Tipificacion_detalle_2)
                break
            case 'Arauca':
                recortar(tp2, 135, 142, $Tipificacion_detalle_2) 
                break
            case 'Atlántico':
                recortar(tp2, 142, 165, $Tipificacion_detalle_2)
                break
            case 'Bolívar':
                recortar(tp2, 165, 211, $Tipificacion_detalle_2)
                break
            case 'Boyacá':
                recortar(tp2, 211, 335, $Tipificacion_detalle_2)
                break
            case 'Caldas':
                recortar(tp2, 335, 362, $Tipificacion_detalle_2)
                break
            case 'Caquetá':
                recortar(tp2, 362, 378, $Tipificacion_detalle_2)
                break
            case 'Casanare':
                recortar(tp2, 378, 397, $Tipificacion_detalle_2)
                break
            case 'Cauca':
                recortar(tp2, 397, 439, $Tipificacion_detalle_2)
                break
            case 'Cesar':
                recortar(tp2, 439, 464, $Tipificacion_detalle_2)
                break
            case 'Chocó':
                recortar(tp2, 464, 494, $Tipificacion_detalle_2)
                break
            case 'Córdoba':
                recortar(tp2, 494, 524, $Tipificacion_detalle_2)
                break
            case 'Cundinamarca':
                recortar(tp2, 524, 640, $Tipificacion_detalle_2)
                break
            case 'Guainía':
                recortar(tp2, 640, 648, $Tipificacion_detalle_2)
                break
            case 'Guaviare':
                recortar(tp2, 648, 652, $Tipificacion_detalle_2)
                break  
            case 'Huila':
                recortar(tp2, 652, 689, $Tipificacion_detalle_2)
                break 
            case 'La Guajira':
                recortar(tp2, 689, 704, $Tipificacion_detalle_2)
                break    
            case 'Magdalena':
                recortar(tp2, 704, 734, $Tipificacion_detalle_2)
                break   
            case 'Meta':
                recortar(tp2, 734, 763, $Tipificacion_detalle_2)
                break 
            case 'Nariño':
                recortar(tp2, 763, 826, $Tipificacion_detalle_2)
                break 
            case 'Norte de Santander':
                recortar(tp2, 826, 866, $Tipificacion_detalle_2)
                break 
            case 'Putumayo':
                recortar(tp2, 866, 879, $Tipificacion_detalle_2)
                break 
            case 'Quindío':
                recortar(tp2, 879, 891, $Tipificacion_detalle_2)
                break 
            case 'Risaralda':
                recortar(tp2, 891, 905, $Tipificacion_detalle_2)
                break 
            case 'San Andrés y Providencia':
                recortar(tp2, 905, 908, $Tipificacion_detalle_2)
                break 
            case 'Santander':
                recortar(tp2, 908, 995, $Tipificacion_detalle_2)
                break 
            case 'Sucre':
                recortar(tp2, 995, 1021, $Tipificacion_detalle_2)
                break 
            case 'Tolima':
                recortar(tp2, 1021, 1068, $Tipificacion_detalle_2)
                break 
            case 'Valle del Cauca':
                recortar(tp2, 1068, 1110, $Tipificacion_detalle_2)
                break 
            case 'Vaupés':
                recortar(tp2, 1110, 1116, $Tipificacion_detalle_2)
                break 
            case 'Vichada':
                recortar(tp2, 1116, 1120, $Tipificacion_detalle_2)
                break 
        }

        $Tipificacion_detalle_3.innerHTML = ''
    })

  
</script> 



@endsection
