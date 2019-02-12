<?php
 include('application/views/header.php');
?>

    <div id="main">
        <?php if( $error = $this->session->flashdata('response') ): ?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        <div class="container">
        <h1 class="display-6">FORM REGISTER</h1>
            <p class="lead">
                <fieldset>
                    <legend>Silahkan Daftar</legend>
                    <?php echo form_open('c_register/do_register', ['class'=>'form-horizontal']); ?>
                    <div class="form-group">
                        <label class="control-label col-lg-4" for="ux_user">Username :</label>
                        <div class="col-lg-8">
                            <?php echo form_input(['name'=>'ux_user', 'class'=>'form-control', 'placeholder'=>'Masukan Username', 'value'=>set_value('ux_user')]); ?>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label class="control-label col-lg-4" for="ux_pass">Passsword :</label>
                        <div class="col-lg-8">
                            <?php echo form_input(['name'=>'ux_pass', 'type'=>'password', 'class'=>'form-control', 'placeholder'=>'Masukan Passsword', 'value'=>set_value('ux_pass')]) ; ?>
                        </div>
                    </div>   
                    <div class="form-group">
                <div class="col-lg-10 col-sm-offset-2"> 
                <?php echo form_submit(['value'=>'Daftar', 'class'=>'btn btn-success']) ; ?>
                <?php echo anchor("c_login/index", 'LOGIN', ['class'=>'btn btn-info']); ?> 
            </div>
            
                </fieldset>
            </p>
        </div>
    </div>

<?php
    include('application/views/footer.php');
?>