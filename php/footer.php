<?php
    require_once('menu.php');
?>  

<script src="../public/js/jquery.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/fullcalendar/lib/moment.min.js"></script>
<script src="../public/fullcalendar/fullcalendar.js"></script>
<script src="../public/js/sweetalert2.min.js"></script>
<script src="../public/js/raphael.min.js"></script>
<script src="../public/js/morris.min.js"></script>
<script src="../public/js/reportes.js"></script>
<script src="../public/js/page-scripts.js"></script>
<script src="../public/js/jquery.dataTables.min.js"></script>
<script src="../public/js/bootstrap-datepicker.js"></script>
<script src="../public/js/jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "info": "Mostrar página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay Registros disponibles",
                "infoFiltered": "(filtrada de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coicidentes",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }

        });
    });

</script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker();
    });

</script>
<script type="text/javascript">
     $(document).ready(function() {

        $.get('citas/getcitas.php',function(data)
{
    var myevents = JSON.parse(data);
    var calendar = $('#calendar').fullCalendar({
   editable: true,
   header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month'
    },
      events : myevents,


    });
}

    ); 
  

});
 </script>
</body>

</html>
