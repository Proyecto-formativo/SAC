
<div class="container">
    <form action="<?=base_url("Instructor/EnviarReporte")?>" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="ficha">Ficha:</label>
                    <input type="text"name="ficha" class="form-control ficha" id="ficha"  required >
                    <!-- pattern="[A-Za-z]{3}" -->
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="text" class="form-control" id="fecha" name="fechaDelDia" disabled value="<?= date("d")."-".date("m")."-".date("Y");?>" >
                </div>
            </div>
        </div>
    


        <div class="infoContent">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="area">Area:</label>
                        <input type="text" name="AREA"class="form-control" id="area" disabled required>
                    </div>
                </div>

                <div class="col-6">

                    <div class="form-group">
                        <label for="nivel">Nivel:</label>
                        <input type="text" class="form-control" id="nivel" disabled required>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- ETAPA FORMATIVA Y SUS DIFERENTES ETAPAS -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="etapa-formativa">Etapa formativa:</label>
                        <select name="etapaformacion" class="form-control"  id="etapa-formativa" >
                        </select>

                    </div>
                </div>



                <!-- ETAPA PROYECTO Y SUS DIFERENTES ETAPAS -->
                <div class="col-6">
                <div class="form-group">
                        <label for="programa">Programa:</label>
                        <input type="text" class="form-control" id="programa" disabled required>                       
                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="hora-inicio">Hora inicio:</label>
                        <input type="text" class="form-control" id="hora-inicio"required disabled >
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="hora-final">Hora fin:</label>
                        <input type="text" class="form-control" id="hora-final"required disabled >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                <div class="form-group">
                        <label for="municipio">Municipio:</label>
                        <input type="text" class="form-control" id="muncipio" disabled required>
                    </div>



                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="etapa-proyecto">Etapa proyecto:</label>
                        <select name="etapaproyecto" class="form-control"  id="etapa-proyecto" required>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="formativo">Proyecto formativo:</label>
                        <input type="text" class="form-control" id="formativo" disabled required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="instructor-lider">Instructor lider:</label>
                        <input type="text" class="form-control" id="instructor-lider" disabled required>

                    </div>
                
                </div>

            </div>


            <div class="row">
                

                <div class="col-6">
                
                    <div class="form-group">
                        <label for="coordinador">Coordinador:</label>
                        <input type="text" class="form-control" id="coordinador" disabled required>
                    </div>
                
                </div>

                <div class="col-6">
                
                    <div class="form-group">
                        <label for="tipofalta">Tipo de falta:</label>
                        <select name="instructor" class="form-control"  id="tipofalta" required>
                        </select>                    
                    </div>
                
                </div>
            </div> 


            <div class="row">
                <!-- justificacion-->
                <div class="col-6">
                    <div class="form-group">
                        <label for="justificacion">Justificacion:</label>
                        <textarea class="form-control style-textareaficha" name="justificar" id="justificacion" rows="3"required ></textarea>
                    </div>
                </div>



                <!-- tipocalificacion -->
                <div class="col-6">
                <div class="form-group">
                        <label for="tipocalifica">Tipo de Calificacion:</label>
                        <select name="tipocalificacion" class="form-control"  id="tipocalifica" required>
                        </select>                    
                    </div>
                </div>
            </div> 

            
            <div class="w-100 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary ">Enviar</button>
            </div>

        </div> <!-- fin del contenedor para traer la informacion -->
    </form>
</div>
<script>
<?= isset($mensaje)?$mensaje:""?>
</script>

