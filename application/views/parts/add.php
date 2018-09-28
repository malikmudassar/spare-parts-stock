<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-4">
            <div class="login-body">
                <?php if(isset($errors)){?>
                    <div class="alert alert-danger">
                        <?php print_r($errors);?>
                    </div>
                <?php }?>
                <?php if(isset($success)){?>
                    <div class="alert alert-success">
                        <?php print_r($success);?>
                    </div>
                <?php }?>
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="control-label">Model</label>
                            <select class="form-control" name="model">
                                <option>Select Model</option>
                                <?php
                                foreach($models as $model){
                                ?>
                                    <option value=""><?php echo $model['name'];?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Part Name</label>
                            <input  class="form-control" type="text" name="partsname" data-msg-required="Please enter your Menu Name." required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">CCP</label>
                            <input  class="form-control" type="text" name="ccp" >
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">CP</label>
                            <input  class="form-control" type="text" name="cp" >
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">RP</label>
                            <input  class="form-control" type="text" name="rp" >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Add Part</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>