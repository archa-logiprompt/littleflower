<div class="row row-eq">
    <?php
    //print_r($enquiry_data);
    $admin = $this->customlib->getLoggedInUserData();
    // print_r($admin);
    ?>
    <div class="col-lg-8 col-md-8 col-sm-8 paddlr">
        <!-- general form elements -->
        <form id="evaluation_data" method="post" class="ptt10"   action="<?php echo site_url('user/homework/homework_detail/'.$id) ?>"     style="min-height: 500px;" enctype="multipart/form-data"> 
        <p><?php echo $result['description']; ?></p>

        <!-- File input field -->
        <input class="form-control" data-height="20" type="file"
                                                        name="work_assigned" id="work_assigned_id" size="20"  style="opacity:100 !important">
                                                    <div class="dropify-preview"><span class="dropify-render"></span>
                                                        <div class="dropify-infos">
                                                            <div class="dropify-infos-inner">
                                                                <p class="dropify-filename"><span
                                                                        class="file-icon"></span> <span
                                                                        class="dropify-filename-inner"></span></p>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>

        <!-- Other form elements go here if needed -->

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>    


    <div class="col-lg-4 col-md-4 col-sm-4 col-eq">
        <div class="taskside">
            <?php //print_r($enquiry_data); ?>
            <h4><?php echo $this->lang->line('summary'); ?></h4>
            <div class="box-tools pull-right">
            </div><!-- /.box-tools -->
            <h5 class="pt0 task-info-created">
                <!--small class="text-dark">Homework Date <span class="text-dark"><?php print_r(date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($result['homework_date']))); ?></span> <i class="fa fa-clock-o" data-toggle="tooltip" data-title="Created at 31.05.2018 13:00:09"></i></small-->
            </h5>

            <hr class="taskseparator" />
            <div class="task-info task-single-inline-wrap task-info-start-date">
                <h5><i class="fa task-info-icon fa-fw fa-lg fa-calendar-plus-o pull-left fa-margin"></i>
                    <span><?php echo $this->lang->line('homework_date'); ?></span>:<?php print_r(date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($result['homework_date']))); ?>                                      
                </h5>
            </div>
            <div class="task-info task-single-inline-wrap task-info-start-date">
                <h5><i class="fa task-info-icon fa-fw fa-lg fa-calendar-plus-o pull-left fa-margin"></i>
                    <span><?php echo $this->lang->line('submission_date'); ?></span>:<?php print_r(date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($result['submit_date']))); ?>                                      
                </h5>
            </div>
            <div class="task-info task-single-inline-wrap task-info-start-date">
                <h5><i class="fa task-info-icon fa-fw fa-lg fa-calendar-plus-o pull-left fa-margin"></i>
                    <span><?php echo $this->lang->line('evaluation_date'); ?></span>:<?php
                    if (!empty($report)) {
                        print_r(date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($report['date'])));
                    }
                    ?>                                      
                </h5>
            </div>
            <!--div class="task-info task-single-inline-wrap task-info-start-date">
                <h5><i class="fa task-info-icon fa-fw fa-lg fa-fa-list pull-left fa-margin"></i>
                    Description:<br/><br/><?php echo $result["description"]; ?>                                       
                </h5>
            </div-->
            <div class="task-info task-single-inline-wrap ptt10">
                <label><span><?php echo $this->lang->line('created_by'); ?></span>: <?php echo $created_by; ?></label>
                <label><span><?php echo $this->lang->line('evaluated_by'); ?></span>: <?php echo $evaluated_by; ?></label>             
                <label><span><?php echo $this->lang->line("class") ?></span>: <?php echo $result['class']; ?></label>
                <label><span><?php echo $this->lang->line("section") ?></span>: <?php echo $result['section']; ?></label>
                <label><span><?php echo $this->lang->line("subject") ?></span>: <?php echo $result['name']; ?></label>
                <label><?php echo $this->lang->line(" ") ?><?php
                    if (!empty($report)) {

                        if ($report["status"] == "Complete") {
                            $class = "class= 'label label-success'";
                        } else {
                            $class = "class= 'label label-danger'";
                        }
                        echo "<font $class >" . $report["status"] . "</font>";
                    }
                    ?></label>
                        <?php if (!empty($result["document"])) { ?>  
                    <label><a href="<?php echo base_url() . "user/homework/download/" . $result["id"] . "/" . $result["document"] ?>"><?php echo $this->lang->line('download') ?> <i class="fa fa-download"></i></a></label>
<?php } ?>
            </div> 
        </div>
    </div>  
</div>
<?php

function searchForId($id, $array) {
    foreach ($array as $key => $val) {
        if ($val['student_id'] === $id) {
            return "<label class='label label-success'>" . $val["status"] . "</label>";
        }
    }
    return "<label class='label label-danger'>Incomplete</label>";
}
?>
<script>
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#evaluation_date').datepicker({
            format: date_format,
            autoclose: true
        });



    });

    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#follow_date_of_call').datepicker({
            format: date_format,
            autoclose: true
        });


        $("#modaltable").DataTable({
            dom: "Bfrtip",
            buttons: [

                {
                    extend: 'copyHtml5',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    title: $('.download_label').html(),
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',

                    title: $('.download_label').html(),
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'csvHtml5',
                    text: '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV',
                    title: $('.download_label').html(),
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF',
                    title: $('.download_label').html(),
                    exportOptions: {
                        columns: ':visible'

                    }
                },

                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    title: $('.download_label').html(),
                    customize: function (win) {
                        $(win.document.body)
                                .css('font-size', '10pt');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    },
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Columns',
                    title: $('.download_label').html(),
                    postfixButtons: ['colvisRestore']
                },
            ]
        });
    });




</script>