<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//cargamos plantilla master y pasamos variables globales
$this->layout('master', [
	'title'            => $title,
	'nombre'           => $nombre,
	'user_id'          => $user_id,
	'username'         => $username,
	'rol'              => $rol,
	'notificaciones'   => $notificaciones,
	'notificaciones_s' => $notificaciones_supervisor,
	'alertas'          => $alertas,
	'alertas_s'        => $alertas_supervisor
]);

$master_1 = $formulario_master_1->row();
$master_2 = $formulario_master_2->row();
//$master_3 = $formulario_master_1->row();


?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Datatables -->
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/jQuery-tagEditor/jquery.tag-editor.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
      rel="stylesheet">
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>PLAN DE VENTA</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--Pagos  pagina 2-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Precio de la casa #<?php echo $master_2->fm_2_casa_no; ?>
                            de <?php echo $master_2->fm_2_proyecto ?> de
                            Q.<?php echo $master_2->fm_2_precio_total; ?></h2>

                        <div class="clearfix"></div>
                    </div>

					<?php
					$tipo_gabinete             = array(
						'name'        => 'tag',
						'id'          => 'tag',
						'placeholder' => 'Tag',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$descuento_promocion       = array(
						'name'        => 'descuento_promocion',
						'id'          => 'descuento_promocion',
						'placeholder' => 'Descuento promoción',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$deposito_energia          = array(
						'name'        => 'deposito_energia',
						'id'          => 'deposito_energia',
						'placeholder' => 'Depósito energia eléctrica',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$seguro_incendio_terremoto = array(
						'name'        => 'seguro_incendio_terremoto',
						'id'          => 'seguro_incendio_terremoto',
						'placeholder' => 'Seguro contra incendio y terremoto por',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$cuota_seguro              = array(
						'name'        => 'cuota_seguro',
						'id'          => 'cuota_seguro',
						'placeholder' => 'Cuota mensual de seguro',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$cuota_seguro              = array(
						'name'        => 'cuota_seguro',
						'id'          => 'cuota_seguro',
						'placeholder' => 'Cuota mensual de seguro',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$avaluo_bancario           = array(
						'name'        => 'avaluo_bancario',
						'id'          => 'avaluo_bancario',
						'placeholder' => 'Avaluo Bancario',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);

					$avaluo_bancario     = array(
						'name'        => 'avaluo_bancario',
						'id'          => 'avaluo_bancario',
						'placeholder' => 'Avaluo Bancario',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$pago_serivicio_agua = array(
						'name'        => 'pago_agua',
						'id'          => 'pago_agua',
						'placeholder' => 'Pago agua',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$pago_seguridad = array(
						'name'        => 'pago_seguridad ',
						'id'          => 'pago_seguridad ',
						'placeholder' => 'pago_seguridad ',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$pago_areas_verdes = array(
						'name'        => 'pago_areas_verdes ',
						'id'          => 'pago_areas_verdes ',
						'placeholder' => 'Pago areas verdes ',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					?>
                    <div class="x_content">
                       <!-- <pre>
                        <?php
/*                        print_r($master_1);
                        print_r($master_2);
                        */?>
                        </pre>-->
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>/index.php/formulario/guardar_master_2"
                              method="post">
                            <div class="x_title">
                                <h2>No incluye</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
										<?php echo form_input($tipo_gabinete); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="exampleInputEmail1">No incluye cambios de estilo de binete de
                                            cocina</label>
                                        <select class="form-control">
                                            <option>
                                                Tipo catedral (laqueados)
                                            </option>
                                            <option>-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="exampleInputEmail1">No incluye apliaciones extras mas allá
                                            de </label>
                                        <select class="form-control">
                                            <option>
                                                Baño estandar para el dormitorio de atras
                                            </option>
                                            <option>-</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="exampleInputEmail1">No incluye cambio de las ventanas </label>
                                        <select class="form-control">
                                            <option>
                                                Baño estandar para el dormitorio de atras
                                            </option>
                                            <option>-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ventanas tipo junta
                                        hueso</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default" data-toggle-class="btn-primary"
                                                   data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="male"> &nbsp; Si &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary"
                                                   data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="female"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Azulejar de lavandería</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default" data-toggle-class="btn-primary"
                                                   data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="male"> &nbsp; Si &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary"
                                                   data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="female"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="exampleInputEmail1">Pago incial servicio de agua</label>
		                            <?php echo form_input($pago_serivicio_agua); ?>
                                    <span class="fa fa-home form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="exampleInputEmail1">Cuota inicial de garita principal de seguridad</label>
		                            <?php echo form_input($pago_seguridad); ?>
                                    <span class="fa fa-home form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="exampleInputEmail1">Pago incial servicio de agua</label>
			                        <?php echo form_input($pago_areas_verdes); ?>
                                    <span class="fa fa-home form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- validator -->
<script src="<?php echo base_url(); ?>ui/vendors/validator/validator.js"></script>
<!--<script src="<?php echo base_url(); ?>ui/vendors/jquery-ui-1.12.1/external/jquery/jquery.js"></script>-->
<script src="<?php echo base_url(); ?>ui/vendors/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/jQuery-tagEditor/jquery.tag-editor.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/caret/jquery.caret.js"></script>
<script>
    /* VALIDATOR */
    function init_validator() {
        if (typeof (validator) === 'undefined') {
            return;
        }
        console.log('init_validator');
        // initialize the validator function
        validator.message.date = 'not a real date';
        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required').on('keyup blur', 'input', function () {
            validator.checkField.apply($(this).siblings().last()[0]);
        });

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;

            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();

            return false;
        });

    };

    //TAGS
    $('#tag').tagEditor({
        autocomplete: {
            delay: 0, // show suggestions immediately
            position: {collision: 'flip'}, // automatic menu position up/down
            source: ['Churrasquera', 'Chimeneas', 'Fuentes', 'Búcaros', 'Pérgolas',
                'ménsulas', 'domos', 'gargolas', 'capiteles', 'moduleras', 'zocalo de piedra', 'nichos'
                , 'cascadas', 'artesas', 'muros de contención', 'jardineras', 'tabiques', 'mesetas', 'cornisas', 'filetes'
                , 'pestañas', 'voladizos', 'macetones', 'plantas', 'jetinas', 'balcones', 'lámparas', 'cortinas', 'muebles y electrodomésticos']
        },
        forceLowercase: false,
        placeholder: 'Opciones ...'
    });

</script>


<?php $this->stop() ?>



