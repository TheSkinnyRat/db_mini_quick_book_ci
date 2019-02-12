<?php
    include ('header.php');
?>
<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">
    <?php if( $error = $this->session->flashdata('response') ): ?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <h1 class="display-6">FORM LOGIN</h1>
        <p class="lead">
            
    <fieldset>
        <legend>Silahkan Login</legend>
        <?php echo form_open('c_login/aksi_login', ['class'=>'form-horizontal']); ?>
        
            <div class="form-group">
                <label class="control-label col-lg-4" for="user">Username :</label>
                    <div class="col-lg-8">
                        <input type="text" name="user" class="form-control" id="user" placeholder="Username">
                    </div>
            </div>
                <small id="emailHelp" class="form-text text-muted"></small>

            <div class="form-group">
                <label class="control-label col-lg-4" for="user">Passsword :</label>
                <div class="col-lg-8">
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-sm-offset-2"> 
                    <?php echo form_submit(['value'=>'LOGIN', 'class'=>'btn btn-info']) ; ?>
                    <?php echo anchor("c_register", 'Daftar', ['class'=>'btn btn-warning']); ?>
        </div>
    </fieldset>
        </p>
    </div>
</div>  
    
<?php
    include('footer.php');
?>