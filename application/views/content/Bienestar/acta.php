

<?php

date_default_timezone_set('America/Bogota');

?>

    <div class="container">
        <form action="<?=base_url('Bienestar/ingresarActa')?>" method="post" enctype="multipart/form-data">
            <!-- Row 1 -->
            <div class="row">
                <!-- municipio -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="NumroActa">Numero Acta:</label>
                        <input type="text" class="form-control" id="NumroActa" name="NumroActa"  value="Nro_acta">
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- municipio -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="municipio">Municipio:</label>
                        <select name="municipio" class="form-control"  id="municipio" required >
                        <option value="null">seleccionar municipio</option>
                            <?php foreach ($municipio->result() as $valores): ?>
                                <option value="<?=$valores->codigo?>"><?=$valores->nombre?></option>
                            <?php endforeach; ?>    
                        </select>
                        <!-- pattern="[A-Za-z]{3}" --> 
                    </div>
                </div>
                    <!-- Fecha -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="text" class="form-control" id="fecha" name="date"  value="<?= date("Y")."-".date("m")."-".date("d");?>" readonly >
                    </div>
                </div>

            </div>


            <!-- Row 2 -->
            <div class="infoCentroSede">
                
                <div class="row">
                    <!-- centro -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="centro">centro:</label>
                            <select name="centro" class="form-control"  id="centro" required>
                                
                            </select>
                        </div>
                    </div>


                    <!-- Sede -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Sede">Sede:</label>
                            <select name="sede" class="form-control"  id="sede" required>
                            </select>
                        </div>
                    </div>
                    
                </div>

            </div>


            <!-- Row 3 -->
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="hora_inicio">hora inicio:</label>
                        <input type="text" name="hora_inicio"class="form-control" id="hora-inicio" value="<?= date('h:i:s')?>" required readonly>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="hora_fin">hora Fin:</label>
                        <input type="time" name="hora_fin"class="form-control" id="hora_fin" value="<?= date('h:i:s')?>" required>
                    </div>
                </div>

            </div>



            
            <!-- Row 4 -->
            <div class="row">
                        <!--  Temas -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="temas">temas:</label>
                            <input type="text" name="temas"class="form-control" id="temas"  value="Comité de Evaluación y Seguimiento" required readonly>                                  
                        </div>
                    </div>
                    <!-- Área -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Area">Area:</label>
                            <input type="text" class="form-control" disabled required value="<?=$nombreArea?>">
                            <input type="hidden" name="area"class="form-control" id="area" required value="<?=$codigo?>">
                        </div>
                    </div>
            </div>


            <!-- Row 5 -->
            <div class="row">
                <!-- Objetivos Reunión -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="Objetivos">Objetivos De La Reunión:</label>
                        <!-- <input type="text"name="Objetivos" class="form-control" id="Objetivos"  required> -->
                        <textarea readonly class="form-control style-textareaficha" name="ObjetivosReunion" id="objetivos" cols="20" rows="" required>Analizar los informes académicos y disciplinarios de los aprendices que fueron citados al Comité, y realizar las recomendaciones al Subdirector.</textarea>
                    </div>
                </div>
            </div>


            <div class="titulo-desarrollo mb-4" align="center" p-5>
                <h2>Desarrollo De la Reunión</h2>
            </div>

            <!-- Row 6 -->
            <div class="row">
                <!-- Temas a Tratar -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="Temas-a-tratar">Temas A Tratar:</label>

                        <textarea  class="form-control style-textareaficha-bienestar" name="Temas_a_Tratar" id="temasTratar" cols="100" rows="" required>
A. Presentación de Asistentes al Comité.

B. Verificación Quórum, teniendo en cuenta Capitulo 10 
   “PROCEDIMIENTO PARA LA APLICACIÓN DE SANCIONES”,
    Art. 32 Reglamento del Aprendiz SENA.

C. Exposición de informes y descargos de cada uno de los aprendices
   del área <?=$nombreArea?>.

D. Proposiciones y varios.
                        </textarea>
                    </div>
                </div>

                <!-- Desarrollo -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="Desarrollo-reunion">Desarrollo:</label>
                        <textarea  class="form-control style-textareaficha-bienestar" name="Desarrollo" id="desarollo" cols="20" rows="" required>
A. Se realizó presentación por cada uno de los asistentes al Comité de  
    Evaluación y seguimiento, conformado por:
    Coordinador Académico: <?=$coordinador?>.

    Líder de Bienestar: Silvana Castrillón
    Trabajador Social Bienestar al Aprendiz: Mauricio Peláez
    Vocero Representante de los Aprendices: Adriana Echeverri
    instructor (es) del programa y aprendices citados.

B. Se verifica si hay quórum, para el desarrollo del Comité,
   ajustándonos al Reglamento del
   Aprendiz SENA, punto que queda aprobado.

C. Se da informe de los aprendices citados a Comité de Evaluación.
                        </textarea>
                    </div>
                </div>
            </div>

            <!-- Row 7 -->
            <div class="row">
                <!-- Descargos Aprendiz -->
                <div class="col-12">
                    <div class="form-group">
                        <h3>Descargos Aprendiz:</h3>
                        <?=$descargos?>
                    </div>
                </div>
            </div>

            <!-- Row 8 -->
            <div class="row">
                <!-- Conclusiones -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Conclusiones:</label>
                        <textarea class="form-control style-textareaficha-bienestarho2" name="concluciones" id="conclusiones" rows="3" cols="10" required>Realizar entrega del plan de mejora desde lo académico y actitudinal con el respectivo acompañamiento a los aprendices citados. Reportar oportunamente el cumplimiento del plan de mejora.</textarea>
                    </div>
                </div>
            </div>

            

            <!-- Row 9 -->
            <div class="row">

                <!-- Nombre Asistentes -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="Asistentes">Nombres Asistentes:</label>
                        <input type="file"name="NombresAsistentes" class="form-control-file" id="asistentes" required>
                    </div>
                </div>

                <!-- Nombre Invitados -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="Invitados">Nombres Invitados:</label>
                        <input type="file"name="NombreInvitados" class="form-control-file" id="invitados" required>
                    </div>
                </div>
            </div>

            <div class="text-center mb-3">
                <button type="button" id="agregarCpompromisos" class="btn bg-success text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">AÑADIR COMPROMISOS</button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">consecutivo</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Fecha Compromiso</th>
                    </tr>
                </thead>
                <tbody id="listar-compromisos-tabla">
                    
                </tbody>
            </table>

            <input type="hidden" id="listaCompromisos" name="Listas_Compromisos">

            <div class="w-100 d-flex justify-content-center  mt-5 mb-5">
                <input type="submit" id="enviarActa" class="btn btn bg-success text-white" disabled>
            </div>
        </form>
    </div>


    <div class="w-100 d-flex justify-content-center  mt-5 mb-5">
        <button class="btn btn-warning" id="genrerar_pdf" disabled>generar pdf</button>
    </div>




    <div class="titulo-desarrollo mb-4 mt-4" align="center" p-5>
        <div class="modal fade" id="compromisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Compromisos</h5>

                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <label for="Actividad">actividad</label>
                                    <textarea class="form-control" name="Actividad" id="actividad_text" cols="20" rows="" required></textarea>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-6">
                                    <label for="Responsable">Responsable</label>
                                    <input class="form-control" type="text" id="responsable" required>
                                </div>

                                <div class="col-6">
                                    <label for="Fecha">Fecha Compromiso</label>
                                    <input class="form-control" type="date" id="fecha-compromiso" required>
                                </div>
                            </div>

                            <div class="w-100 d-flex justify-content-center mb-5">
                                <input type="button" class="btn btn-success" id="botton-list" value="Agregar Compromiso" >
                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button"  id="cerrarCompromisos" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
<div class="modal  jquery-modal blocker current" id="descargos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Descargos Aprendiz:</h5>
      </div>
        <div class="container">
            <form>
                <div class="form-group">
                    <input type="hidden" id="consecutivoAprendizReporte" class="form-control" id="consecutivoaprendiz" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <input type="hidden" id="consReporte" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>


                <div class="form-group form-check">
                    <label for="informeEquipoEjecutor">informe del EquipoEjecutor:</label>
                    <textarea  class="form-control style-textareaficha-descargos" name="Desarrollo" id="informeEquipoEjecutor" cols="20" row="10" rows=""></textarea>
                </div>


                <div class="form-group form-check">
                    <label for="descarosAprendiz">Descaros del Aprendiz:</label>
                    <textarea  class="form-control style-textareaficha-descargos" name="Desarrollo" id="descarosAprendiz" cols="20" rows=""></textarea>
                </div>


                <div class="form-group">
                    <label for="Recomendacion">Recomendacion:</label>
                    <select name="Recomendacion" class="form-control"  id="Recomendacion" required >
                        <?php foreach ($sugerencia->result() as $valores): ?>
                        <option value="<?=$valores->codigo?>"><?=$valores->nombre?></option>
                        <?php endforeach; ?>    
                    </select>
                </div>
                <div class="mb-2 d-flex justify-content-center">
                    <button type="submit" id="agregarDescargos" class="btn btn-primary ">enviar</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
