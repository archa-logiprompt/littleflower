<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-gears"></i> <?php echo $this->lang->line('system_settings'); ?> </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                    	<?php /*?><li><a href="#tab_5" data-toggle="tab">Worldline</a></li><?php */?>
                        <li><a href="#tab_4" data-toggle="tab">CCAvenue</a></li>
                        <li><a href="#tab_3" data-toggle="tab">PayU</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Worldline</a></li>
                        <li class="active"><a href="#tab_1" data-toggle="tab">Paypal</a></li>
                        <li class="pull-left header"><i class="fa fa-mobile"></i> <?php echo $this->lang->line('payment_methods'); ?></li>
                    </ul>
                    <div class="tab-content pb0">
                        <div class="tab-pane active" id="tab_1">
                            <form role="form" id="paypal" action="<?php echo site_url('admin/paymentsettings/paypal') ?>" class="form-horizontal" method="post">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-7">

                                                <?php
                                                $paypal_result = check_in_array('paypal', $paymentlist);
                                                ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-5 col-sm-12 col-xs-12" for="exampleInputEmail1">
                                                        <?php echo $this->lang->line('paypal_username'); ?>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        <input autofocus="" id="name" name="paypal_username" placeholder="" type="text" class="form-control col-md-7 col-xs-12" value="<?php echo isset($paypal_result->api_username) ? $paypal_result->api_username : ""; ?>" />
                                                        <span class=" text text-danger paypal_username_error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-5 col-sm-12 col-xs-12" for="exampleInputEmail1">
                                                        <?php echo $this->lang->line('paypal_password'); ?>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        <input id="name" name="paypal_password" placeholder="" type="password" class="form-control col-md-7 col-xs-12"  value="<?php echo isset($paypal_result->api_password) ? $paypal_result->api_password : ""; ?>" />
                                                        <span class=" text text-danger paypal_password_error"></span>
                                                    </div></div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-5 col-sm-12 col-xs-12" for="exampleInputEmail1">
                                                        <?php echo $this->lang->line('paypal_signature'); ?>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        <input id="name" name="paypal_signature" placeholder="" type="text" class="form-control col-md-7 col-xs-12"  value="<?php echo isset($paypal_result->api_signature) ? $paypal_result->api_signature : ""; ?>" />
                                                        <span class=" text text-danger paypal_signature_error"></span>
                                                    </div>  </div>


                                            </div>
                                            <div class="col-md-5 text text-center disblock">
                                                <a href="https://www.paypal.com/in/home" target="_blank"><img src="<?php echo base_url() ?>backend/images/paypal.png" width="200"><p>https://www.paypal.com</p></a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary col-md-offset-3 paypal_save" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <form role="form" id="stripe" id="stripe" action="<?php echo site_url('admin/paymentsettings/worldline') ?>" class="form-horizontal" method="post">
                                <div class="box-body minheight149">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-7">
                                                <?php
                                                $worldline_result = check_in_array('stripe', $paymentlist);
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><?php echo $this->lang->line('worldline_api_secret_key'); ?></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="api_secret_key" value="<?php echo isset($worldline_result->api_secret_key) ? $worldline_result->api_secret_key : ""; ?>">
                                                        <span class=" text text-danger api_secret_key_error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">
                                                        <?php echo $this->lang->line('worldline_publishable_key'); ?></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="api_publishable_key" value="<?php echo isset($worldline_result->api_publishable_key) ? $worldline_result->api_publishable_key : ""; ?>">
                                                        <span class=" text text-danger api_publishable_key_error"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-5 text text-center disblock">
                                                <a href="https://www.worldline.com" target="_blank"><img src="<?php echo base_url() ?>backend/images/logo-worldline.png" width="200"><p>https://worldline.com/</p></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary col-md-offset-3 stripe_save" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <form role="form" id="payu" id="custom" action="<?php echo site_url('admin/paymentsettings/payu') ?>" class="form-horizontal" method="post">
                                <div class="box-body minheight149">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-7">
                                                <?php
                                                $payu_result = check_in_array('payu', $paymentlist);
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><?php echo $this->lang->line('payu_money_key'); ?>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="key" value="<?php echo isset($payu_result->api_secret_key) ? $payu_result->api_secret_key : ""; ?>">
                                                        <span class="text text-danger key_error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><?php echo $this->lang->line('payu_money_salt'); ?>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="salt" value="<?php echo isset($payu_result->salt) ? $payu_result->salt : ""; ?>">
                                                        <span class="text text-danger salt_error"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-5 text text-center disblock">
                                                <a href="https://www.payumoney.com" target="_blank"><img src="<?php echo base_url() ?>backend/images/paym.png"><p>https://www.payumoney.com</p></a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary col-md-offset-3 payu_save" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="tab_4">
                            <form role="form" id="ccavenue"  action="<?php echo site_url('admin/paymentsettings/ccavenue') ?>" class="form-horizontal" method="post">
                                <div class="box-body minheight149">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-7">
                                                <?php
                                                $ccavenue_result = check_in_array('ccavenue', $paymentlist);
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><?php echo $this->lang->line('merchant_id'); ?>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="ccavenue_secret" value="<?php echo isset($ccavenue_result->api_secret_key) ? $ccavenue_result->api_secret_key : ""; ?>">
                                                        <span class="text text-danger ccavenue_secret_error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><?php echo $this->lang->line('working_key'); ?>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="ccavenue_salt" value="<?php echo isset($ccavenue_result->salt) ? $ccavenue_result->salt : ""; ?>">
                                                        <span class="text text-danger ccavenue_salt_error"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-5 text text-center disblock">
                                                <a href="https://www.ccavenue.com" target="_blank"><img src="<?php echo base_url() ?>backend/images/ccavenue.png" width="200"><p>https://www.ccavenue.com</p></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary col-md-offset-3 ccavenue_save" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                                </div>
                            </form>
                        </div>
                        
                        
                        <?php /*?><div class="tab-pane" id="tab_5">
                            <form role="form" id="worldline"  action="<?php echo site_url('admin/paymentsettings/worldline') ?>" class="form-horizontal" method="post">
                                <div class="box-body minheight149">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-7">
                                                <?php
                                                $ccavenue_result = check_in_array('worldline', $paymentlist);
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><?php echo $this->lang->line('merchant_id'); ?>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="ccavenue_secret" value="<?php echo isset($ccavenue_result->api_secret_key) ? $ccavenue_result->api_secret_key : ""; ?>">
                                                        <span class="text text-danger ccavenue_secret_error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><?php echo $this->lang->line('working_key'); ?>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="ccavenue_salt" value="<?php echo isset($ccavenue_result->salt) ? $ccavenue_result->salt : ""; ?>">
                                                        <span class="text text-danger ccavenue_salt_error"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-5 text text-center disblock">
                                                <a href="https://www.ccavenue.com" target="_blank"><img src="<?php echo base_url() ?>backend/images/logo-worldline.png" width="200"><p>https://worldline.com/</p></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary col-md-offset-3 worldline_save" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                                </div>
                            </form>
                        </div><?php */?>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo site_url('admin/paymentsettings/setting') ?>" id="payment_gateway" method="POST">
                        <div class="box-body minheight199">
                            <div class="form-group"> <!-- Radio group !-->
                                <?php
                                $radio_check = check_selected($paymentlist);
                                ?>

                                <label class="control-label"><?php echo $this->lang->line('select_payment_gateway'); ?></label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment_setting" value="paypal" <?php
                                        if ($radio_check == 'paypal') {
                                            echo "checked";
                                        }
                                        ?>>
                                        Paypal
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="payment_setting" value="worldline" <?php
                                        if ($radio_check == 'worldline') {
                                            echo "checked";
                                        }
                                        ?>>
                                        Worldline
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="payment_setting" value="payu" <?php
                                        if ($radio_check == 'payu') {
                                            echo "checked";
                                        }
                                        ?>>
                                        PayU
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="payment_setting" value="ccavenue" <?php
                                        if ($radio_check == 'ccavenue') {
                                            echo "checked";
                                        }
                                        ?>>
                                        CCAvenue
                                    </label>
                                </div>
                                <?php /*?><div class="radio">
                                    <label>
                                        <input type="radio"  name="payment_setting" value="worldline" <?php
                                        if ($radio_check == 'worldline') {
                                            echo "checked";
                                        }
                                        ?>>
                                        Worldline
                                    </label>
                                </div><?php */?>
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="payment_setting" value="none" <?php
                                        if ($radio_check == 'none') {
                                            echo "checked";
                                        }
                                        ?>>
                                        None
                                    </label>
                                </div>
                                <span class="text text-danger payment_setting_error"></span>
                            </div>		
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right payment_gateway_save" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </section>
</div>

<?php

function check_selected($array) {
    $selected = "none";
    if (!empty($array)) {

        foreach ($array as $a => $element) {
            if ($element->is_active == "yes") {
                $selected = $element->payment_type;
            }
        }
    }
    return $selected;
}

function check_in_array($find, $array) {
    if (!empty($array)) {

        foreach ($array as $element) {

            if ($find == $element->payment_type) {
                return $element;
            }
        }
    }
    $object = new stdClass();
    $object->id = "";
    $object->type = "";
    $object->api_id = "";
    $object->username = "";
    $object->url = "";
    $object->name = "";
    $object->contact = "";
    $object->password = "";
    $object->authkey = "";
    $object->senderid = "";
    $object->is_active = "";
    return $object;
}
?>


<script type="text/javascript">

    $("#payment_gateway").submit(function (e) {
        $("[class$='_error']").html("");

        var $this = $(".payment_gateway_save");
        $this.button('loading');
        var url = $(this).attr('action'); // the script where you handle the form input.

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: url,
            data: $("#payment_gateway").serialize(), // serializes the form's elements.
            success: function (data, textStatus, jqXHR)
            {
                if (data.st === 1) {
                    $.each(data.msg, function (key, value) {
                        $('.' + key + "_error").html(value);
                    });
                } else {
                    successMsg(data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $(".custom_loader").html("");
                //if fails      
            }, complete: function () {
                $this.button('reset');
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });



    $("#paypal").submit(function (e) {
        $("[class$='_error']").html("");

        var $this = $(".paypal_save");
        $this.button('loading');
        var url = $(this).attr('action'); // the script where you handle the form input.

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: url,
            data: $("#paypal").serialize(), // serializes the form's elements.
            success: function (data, textStatus, jqXHR)
            {
                if (data.st === 1) {
                    $.each(data.msg, function (key, value) {
                        $('.' + key + "_error").html(value);
                    });
                } else {
                    successMsg(data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $(".custom_loader").html("");
                //if fails      
            }, complete: function () {
                $this.button('reset');
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

    $("#stripe").submit(function (e) {
        $("[class$='_error']").html("");

        var $this = $(".stripe_save");
        $this.button('loading');
        var url = $(this).attr('action'); // the script where you handle the form input.

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: url,
            data: $("#stripe").serialize(), // serializes the form's elements.
            success: function (data, textStatus, jqXHR)
            {
                if (data.st === 1) {
                    $.each(data.msg, function (key, value) {
                        $('.' + key + "_error").html(value);
                    });
                } else {
                    successMsg(data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $(".custom_loader").html("");
                //if fails      
            }, complete: function () {
                $this.button('reset');
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

    $("#payu").submit(function (e) {
        $("[class$='_error']").html("");
        var $this = $(".payu_save");
        $this.button('loading');
        var url = $(this).attr('action');

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: url,
            data: $("#payu").serialize(),
            success: function (data, textStatus, jqXHR)
            {
                if (data.st === 1) {
                    $.each(data.msg, function (key, value) {
                        $('.' + key + "_error").html(value);
                    });
                } else {
                    successMsg(data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $(".custom_loader").html("");
            }, complete: function () {
                $this.button('reset');
            }
        });
        e.preventDefault();
    });


    $("#twocheckout").submit(function (e) {
        $("[class$='_twocheckout_error']").html("");
        var $this = $(".twocheckout_save");
        $this.button('loading');
        var url = $(this).attr('action');

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: url,
            data: $("#twocheckout").serialize(),
            success: function (data, textStatus, jqXHR)
            {
                if (data.st === 1) {
                    $.each(data.msg, function (key, value) {
                        $('.' + key + "_twocheckout_error").html(value);
                    });
                } else {
                    successMsg(data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $(".custom_loader").html("");
            }, complete: function () {
                $this.button('reset');
            }
        });
        e.preventDefault();
    });



    $("#ccavenue").submit(function (e) {
        $("[class$='_error']").html("");
        var $this = $(".ccavenue_save");
        $this.button('loading');
        var url = $(this).attr('action');

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: url,
            data: $("#ccavenue").serialize(),
            success: function (data, textStatus, jqXHR)
            {
                if (data.st === 1) {
                    $.each(data.msg, function (key, value) {
                        $('.' + key + "_error").html(value);
                    });
                } else {
                    successMsg(data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $(".custom_loader").html("");
            }, complete: function () {
                $this.button('reset');
            }
        });
        e.preventDefault();
    });
	  
</script>


