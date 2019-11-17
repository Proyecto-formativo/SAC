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
            <select name="instructor" class="form-control"  id="instructor-lider" required>
            </select>
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