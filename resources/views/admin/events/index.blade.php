@extends('adminlte::page')

@section('title','Promociones Ilusion')


@section('content_header')
    <h1>Eventos</h1>
   
    @stop

@section('content')
<div class="container">
   <div class="row">
     <div class="col"></div>
        <div class="col-7"><div id='calendar'></div></div>
        <div class="col"></div>
   </div>
</div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning text-white btn-lg" data-toggle="modal" data-target="#event">
      Nuevo Evento
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                <form action="">

                    {!! csrf_field() !!}
                    <div class="d-none">
                    <div class="form-group col-md-4">
                      <label for="id">ID</label>
                      <input type="text"
                        class="form-control" name="id" id="id">
                    </div> 
                    </div>
                    
                    <div class="form-group">
                      <label for="title">Nombre del Evento</label>
                      <input type="text"
                        class="form-control" name="title" id="title" >
                      
                    </div>

                    <div class="form-group col-md-4">
                        <label for="start">Fecha de Inicio</label>
                        <input type="date"
                          class="form-control" name="start" id="start"  >
                    </div>

                    <div class="form-group col-md-5">
                        <label for="end">Fecha de Finalización</label>
                        <input type="date"
                          class="form-control" name="end" id="end" >
                    </div>

                    <div class="form-group">
                      <label for="direction">Dirección</label>
                      <input type="text"
                          class="form-control" name="direction" id="direction">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="hour">Hora</label>
                        <input type="time"
                          class="form-control" name="hour" id="hour"  >
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="color"
                          class="form-control" name="color" id="color">  
                    </div>                    
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success text-white" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-warning text-white" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger text-white" id="btnEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
      
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">   
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',

            headerToolbar: {
            left: 'prev next today',
            right: 'dayGridMonth timeGridWeek listWeek',
            center: 'title'
             },

            dateClick:function(info){

              limpiarFormulario();
              $('#start').val(info.dateStr);
              $('#btnGuardar').prop('disabled', false);
              $('#btnModificar').prop('disabled', true);
              $('#btnEliminar').prop('disabled', true);
              $("#event").modal();           
            },
            eventClick:function(info){

              $('#btnGuardar').prop('disabled', true);
              $('#btnModificar').prop('disabled', false);
              $('#btnEliminar').prop('disabled', false);

              $('#id').val(info.event.id);
              $('#title').val(info.event.title);
              $('#start').val(info.event.startStr);
              $('#end').val(info.event.endStr);
              $('#direction').val(info.event.extendedProps.direction);
              $('#hour').val(info.event.extendedProps.hour);
              $('#color').val(info.event.backgroundColor);

              $("#event").modal();
            },
            
            events:"{{ url('/admin/events/show') }}"

            });
            calendar.render();

            $('#btnGuardar').click(function() {
              objEvento=recolectarDatosGUI("POST");
              EnviarInformacion('',objEvento);
            });

            $('#btnEliminar').click(function() {
              objEvento=recolectarDatosGUI("DELETE");
              EnviarInformacion('/'+$('#id').val(),objEvento);
            });

            $('#btnModificar').click(function() {
              objEvento=recolectarDatosGUI("PATCH");
              EnviarInformacion('/'+$('#id').val(),objEvento);
            });

            function recolectarDatosGUI(method){
              nuevoEvento={
                id: $('#id').val(),
                title:$('#title').val(),
                start:$('#start').val(),
                end:$('#end').val(),
                direction:$('#direction').val(),
                hour:$('#hour').val(),
                color:$('#color').val(),
                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method

              }    
              return (nuevoEvento);                     
            }

            function EnviarInformacion(accion,objEvento) {
              $.ajax({
                type: "POST",
                url:"{{ url('/admin/events') }}"+accion,
                data:objEvento,
                  success: function(msg){
                    $("#event").modal('toggle');
                    calendar.refetchEvents();
                  },
                error:function(){alert("Hay un error");}
              });
            }
            function limpiarFormulario(){
              $('#id').val("");
              $('#title').val("");
              $('#start').val("");
              $('#end').val("");
              $('#direction').val("");
              $('#hour').val("");
              $('#color').val("");

            }
        });
  
      </script>
@stop


