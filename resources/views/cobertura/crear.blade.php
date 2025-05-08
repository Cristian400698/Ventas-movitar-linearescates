@extends('layouts.app')
    <section class="section container"
        <div class="section-body">
            <div class="section-body">
                <form action="{{route('cobertura.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="region" class="form-label">Región Comercial</label>
                            <select  class="form-control" style="border-radius: 10px;border-color:black" style="border-radius: 10px;border-color:black" name="region_comercial" id="">
                                <option value="" selected disabled>Seleccione</option>
                                <option value="Bogota">Bogotá</option>
                                <option value="Caribe-Oriente">Caribe/Oriente</option>
                                <option value="Cundinamarca">Cundinamarca</option>
                                <option value="Sur occidente/Noroccidente">Sur occidente/Noroccidente</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="departamento" class="form-label">Departamento</label>
                            <select class="form-control" name="departamentos" style="border-radius: 10px;border-color:black" id="">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="Bogotá D.C">Bogotá D.C</option>
                                <option value="Amazonas">Amazonas</option>
                                <option value="Antioquia">Amazonas</option>
                                <option value="Arauca">Arauca</option>
                                <option value="Atlántico">Atlántico</option>
                                <option value="Bolívar">Bolívar</option>
                                <option value="Boyacá">Boyacá</option>
                                <option value="Caldas">Caldas</option>
                                <option value="Caquetá">Caquetá</option>
                                <option value="Casanare">Casanare</option>
                                <option value="Cauca">Cauca</option>
                                <option value="Cesar">Cesar</option>
                                <option value="Chocó">Chocó</option>
                                <option value="Córdoba">Córdoba</option>
                                <option value="Cundinamarca">Cundinamarca</option>
                                <option value="Guainía">Guainía</option>
                                <option value="Guaviare">Guaviare</option>
                                <option value="Huila">Huila</option>
                                <option value="La Guajira">La Guajira</option>
                                <option value="Magdalena">Magdalena</option>
                                <option value="Meta">Meta</option>
                                <option value="Nariño">Nariño</option>
                                <option value="Norte de Santander">Norte de Santander</option>
                                <option value="Putumayo">Putumayo</option>
                                <option value="Quindío">Quindío</option>
                                <option value="Risaralda">Risaralda</option>
                                <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                                <option value="Santander">Santander</option>
                                <option value="Sucre">Sucre</option>
                                <option value="Tolima">Tolima</option>
                                <option value="Valle del Cauca">Valle del Cauca</option>
                                <option value="Vaupés">Vaupés</option>
                                <option value="Vichada">Vichada</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="barrio" class="form-label">Barrio</label>
                            <input type="text" name="barrio" class="form-control" placeholder=""
                                aria-label="">
                        </div>
                        <div class="col">
                            <label for="nomenclatura" class="form-label">Nomenclatura</label>
                            <select type="text" name="nomenclatura" class="form-control" placeholder="">
                                <option value="" selected disabled>Seleccione</option>
                                <option value="KR">KR</option>
                                <option value="CL">CL</option>
                                <option value="TV">TV</option>
                                <option value="DG">DG</option>
                                <option value="URB">URB</option>
                                <option value="Urbanizacion">Urbanización</option>
                                <option value="Conjunto">Conjunto</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="nomen" class="form-label"># Nomenclatura 1</label>
                            <input type="number" name="numero_nomenclatura_uno" class="form-control" placeholder="">
                        </div>

                        <div class="col">
                            <label for="segundo_nombre" class="form-label">Letra Nomenclatura 1</label>
                            <input type="text" name="letra_nomenclatura_uno" class="form-control" placeholder=""
                                aria-label="segundo Apellido">
                        </div>


                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <label for="nomenclatura" class="form-label">Nomenclatura</label>
                            <select type="text" name="nomenclaturados" class="form-control" placeholder="">
                                <option value="" selected disabled>Seleccione</option>
                                <option value="KR">KR</option>
                                <option value="CL">CL</option>
                                <option value="TV">TV</option>
                                <option value="DG">DG</option>
                                <option value="URB">URB</option>
                                <option value="Urbanizacion">Urbanización</option>
                                <option value="Conjunto">Conjunto</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="tipo_doc" style="margin-top:8px ;" class="form-label"># Nomenclatura 2
                                </label>
                            <input type="number" class="form-control" name="numero_nomenclatura_dos" id="">
                        </div>
                        <div class="col">
                            <label for="fecha_nacimiento" style="margin-top:8px ;" class="form-label">Letra
                                Nomenclatura 2</label>
                            <input type="text" name="letra_nomenclatura_dos" class="form-control"
                                placeholder="">
                        </div>
                        <div class="col">
                            <label for="tipo_doc" style="margin-top:8px ;" class="form-label"># Nomenclatura 3
                                </label>
                            <input type="number" class="form-control" name="numero_nomenclatura_tres" id="">
                        </div>

                        <div class="col">
                            <label for="" style="margin-top:8px ;" class="form-label">Complemento 1</label>
                            <select name="complemento_uno" class="form-control" id="">
                                <option value="" selected disabled>Seleccione</option>
                                <option value="APT">APT</option>
                                <option value="INT">INT</option>
                                <option value="TOR">TOR</option>
                                <option value="PISO">PISO</option>
                                <option value="CAS">CAS</option>
                                <option value="MZA">MZA</option>
                                <option value="LCA">LCA</option>
                                <option value="LOT">LOT</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" style="margin-top:8px ;" class="form-label">Complemento 2</label>
                            <select name="complemento_dos" class="form-control" id="">
                                <option value="" selected disabled>Seleccione</option>
                                <option value="APT">APT</option>
                                <option value="INT">INT</option>
                                <option value="TOR">TOR</option>
                                <option value="PISO">PISO</option>
                                <option value="CAS">CAS</option>
                                <option value="MZA">MZA</option>
                                <option value="LCA">LCA</option>
                                <option value="LOT">LOT</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nomen" class="form-label">CTO</label>
                            <input type="text" name="CTO" class="form-control" placeholder="">
                        </div>
                        <div class="col">
                            <label for="segundo_nombre" class="form-label">Porcentaje Libre CTO</label>
                            <input type="text" name="PorcentajeLibreCTO" class="form-control" placeholder=""
                                aria-label="segundo Apellido">
                        </div>
                        <div class="col">
                            <label for="nomen" class="form-label">Puertos Libres CTO</label>
                            <input type="text" name="PuertosLibresCTO" class="form-control" placeholder="">
                        </div>

                        <div class="col">
                            <label for="segundo_nombre" class="form-label">Clusters</label>
                            <input type="text" name="Clusters" class="form-control" placeholder=""
                                aria-label="segundo Apellido">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nomen" class="form-label">Region Comercial</label>
                            <input type="text" name="RegionComercial" class="form-control" placeholder="">
                        </div>
                        <div class="col">
                            <label for="segundo_nombre" class="form-label">Localidad</label>
                            <input type="text" name="Localidad" class="form-control" placeholder=""
                                aria-label="segundo Apellido">
                        </div>
                        <div class="col">
                            <label for="nomen" class="form-label">Direccion Cliente</label>
                            <input type="text" name="DireccionCliente" class="form-control" placeholder="">
                        </div>

                        <div class="col">
                            <label for="segundo_nombre" class="form-label">Estado</label>
                            <input type="text" name="Estado" class="form-control" placeholder=""
                                aria-label="segundo Apellido">
                        </div>
                        <div class="col">
                            <label for="nomen" class="form-label">Flag</label>
                            <input type="text" name="Flag" class="form-control" placeholder="">
                        </div>

                        <div class="col">
                            <label for="segundo_nombre" class="form-label">Fecha Comercializacion</label>
                            <input type="date" name="FechaComercializacion" class="form-control" placeholder=""
                                aria-label="segundo Apellido">
                        </div>
                    </div>

                    <div style="display: flex;align-items: center;justify-content: center;margin-top:10px;:"
                        class="col-12">
                        <input type="submit">
                    </div>
                                </form>
                            </div>
                        </div>
                </div>

            </div>
        </div>


</div>
</section>



