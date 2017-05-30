<!DOCTYPE html>
<html>
    <head>
        <title>API Adobe Connect</title>
        <link rel="icon" type="image/png" href="statics/images/favicon.jpg" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
        <link href="statics/media/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="statics/css/jquery-ui.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="statics/js/jquery-ui.js"></script>
        <script type="text/javascript" src="statics/js/jquery.ctools.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript" src="statics/media/js/utils.js"></script>
    </head>
    <body>
        <div id="container">
            <h1 style="display: inline;">Moderador {usuario} / Sesiones</h1>&nbsp;&nbsp;&nbsp;&nbsp;
            <span style="float: right;"><a href="index.php">&laquo; Volver</a></span>
            <hr>
            <label for="sessions">Salas: </label>
            <select id="sessions">
                <option value="0">.:: Seleccione ::.</option>
                <!--salas-->
                <option value="{scoid}" title="{date}">{salas}</option>
                <!--finsalas-->
            </select><br /><br /><br />
            <label for="fechainicio">Desde: </label>
            <input type="text" id="fechainicio" />&nbsp;&nbsp;&nbsp;
            <label for="fechafin">Hasta: </label>
            <input type="text" id="fechafin" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Ver grabaciones" id="consultar" />
            <br /><br /><br /><hr>
            <div id="grabaciones" class="grabaciones">
                <table id="recordings" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Fecha</th>
                            <th>Nombre grabaci&oacute;n</th>
                            <th>Duraci&oacute;n</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Fecha</th>
                            <th>Nombre grabaci&oacute;n</th>
                            <th>Duraci&oacute;n</th>
                            <th>URL</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </body>
</html>