<style type="text/css">
    .nav-tabs-custom>.nav-tabs>li.active {
        border-top-color: #faa21c;
    }
	
	.dash
	{
	   border-bottom:1px dashed;	
		
	}
	
	
	
	/*.tg  {border-collapse:collapse;border-spacing:0; border:1px;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 10px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 10px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:black;}
.tg .tg-0lax{text-align:left;vertical-align:top}
.tg .tg-pcvp{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-ihkz{border-color:inherit;text-align:center;vertical-align:top}*/

.table-bordered {
    border: 1px solid #121213 !important;
}

.table>tbody>tr>td{
    border-top: unset !important;
}
</style>
<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-line-chart"></i> <?php echo $this->lang->line('reports'); ?> <small> </small>   </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('search_transaction'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="<?php echo site_url('admin/collectionreport/mess_collection_report') ?>" method="post" class="form-horizontal">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label><?php echo $this->lang->line('date_from'); ?></label>
                                            <input autofocus="" id="datefrom" name="date_from" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date_from', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly"/>
                                            <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                        </div>
                                        <div class="col-sm-4">
                                            <label><?php echo $this->lang->line('date_to'); ?></label>
                                            <input id="dateto" name="date_to" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date_to', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly"/>
                                        </div>
                                        
                                        <div class="col-sm-4">
                                    <label for="exampleInputEmail1"> <?php echo $this->lang->line('income_head'); ?></label>
                                    
                                      <select autofocus="" id="head_id" name="head_id" class="form-control" >
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                    <option <?php if($head=='mess_fee'){ echo 'selected=selected';}  ?> value="mess_fee">Mess fee</option>
                                        <?php
                                        foreach ($incomehead as $inchead) {
                                            ?>
                                            <option value="<?php echo $inchead['id'] ?>"<?php
                                            if (set_value('head_id') == $inchead['id']) {
                                                echo "selected = selected";
                                            }
                                            ?>><?php echo $inchead['category'] ?></option>

                                            <?php
                                            $count++;
                                        }
                                        ?>
                                    </select>

                                    
                                    <span class="text-danger"><?php echo form_error('head_id'); ?></span>
                                </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  if(isset($feeList)) {
					
					
					
					
                    ?>
                    
                   
                    <div class="box box-primary" >
                        <h3 class="titless pull-left"><i class="fa fa-money"></i> <?php echo $exp_title; ?>
                    
                        </h3>
                       
                        <button type="button" style="margin-right: 10px;margin-top: 10px;" name="search" id="collection_print" value="" class="btn btn-sm btn-primary login-submit-cs fa fa-print pull-right"> <?php echo $this->lang->line('print'); ?></button>     
                        
                      
                            <div class="box-body" id="collection_report">
                            
                            <?php if(!empty($feeList)) {
								
								
								 ?> 
                             <div class="row">
                             
                              <div class="col-md-12 ">    
                          
                                   
                                    <div class="box-header with-border">
                                   <div class="row">
                                   <div class="col-sm-2" style="width:20%;"> 
         
         </div>
         <div class="col-sm-12">
                   <center>
                         <h3 style="font-family: initial !important;"> MESS COLLECTION REPORT</h3></center>
                            <h3 style="font-family: initial !important;"> <?php echo $exp_title ?>   </h3>
                            
                            
                            </div>
                                    </div>
                                    
                                    </div>
                                   
                                        
                                           
                                        
                                  <table style="width:100%;" border="1">
                                        
                                            <thead>
                                                <tr>
                                                    <th style="padding: 5px;"><?php echo $this->lang->line('sl_no'); ?></th>
                                                    
                                   <th style="padding: 5px;"><?php echo $this->lang->line('bill_no'); ?></th> 
                                   
                                   <th style="padding: 5px;">Fee head</th>  
                                    <th style="padding: 5px;">Description</th>  
                                    
                                   <th style="padding: 5px;"><?php echo $this->lang->line('bill_date'); ?></th>
                  
                                                    <th style="padding: 5px;"><?php echo $this->lang->line('name'); ?></th>
                                     <th style="padding: 5px;" class="text text-right"> <?php echo $this->lang->line('fee'); ?> <?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                   <th style="text-align:center !important;" class="text"><?php echo $this->lang->line('cancelled'); ?> <?php echo $this->lang->line('bill_no'); ?> </th>
                                                   
                                                   <th class="text" style="text-align:center !important;"><?php echo $this->lang->line('cancelled'); ?> <?php echo $this->lang->line('bill_date'); ?>  </th>
                                                 
                                                 <th style="text-align:center !important;" class="text"><?php echo $this->lang->line('cancelled'); ?> <?php echo $this->lang->line('amount'); ?>  </th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                           	
                                            <?php  
											
											 $each_id=array();
											 $total=0;
											  $deleted_amount=0;
											if(isset($feeList)) $i=1; foreach($feeList as $fee) {
												
											
												 $payment_mode='';
												 $description="";
												
											  $total=$total+$fee['amount'];
										 
										  if(!empty($fee['amount_detail']))
										  {
										  $amount_detail=json_decode($fee['amount_detail']);
										 
										  foreach($amount_detail as $mode)
										  {
											  if($fee['invoice_no']==$mode->inv_no)
											  {
											$payment_mode= $mode->payment_mode;
											 $description=$mode->description;
											  }
											  }
										  }
										  else 
										  {
											 $payment_mode= $fee['payment_mode'];
											 $description=$fee['description'];
											  
											  }
										  
										  
										  
												?>
                                            
                                              <tr>
                                              
                                              <td style="text-align:center"> <?php echo $i; ?></td>
                                              <td style="text-align:center"><?php echo $fee['invoice_no'] ?></td>
                                               <td style="text-align:center"><?php echo $fee['name'] ?></td>
                                               <td style="text-align:center"><?php echo $payment_mode.'/ '. $description ?></td>
                                              
                                              <td style="text-align:center"> <?php  echo date('d-m-Y',strtotime($fee['date']));?></td>
                                              <td style="text-align:center"> <?php echo $fee['person_name'] ?></td>
                                              <td style="text-align:center"><?php echo $fee['amount'] ?></td>
                                          
                                          
                                              
                                              <td style="text-align:center"><?php if($fee['is_cancelled']==1)  {echo $fee['invoice_no']; } ?></td>
                                       <td style="text-align:center"> <?php if($fee['is_cancelled']==1)  {echo $fee['cancelled_date'];}?></td>
                                        <td style="text-align:center"> <?php if($fee['is_cancelled']==1)  { echo $fee['amount'];    $deleted_amount=$deleted_amount+$fee['amount'];}?></td>
                                       
                                                     
                                              
                                              
                                              </tr>
                                              <?php  $i= $i+1; } ?>       
                                            </tbody>
                                            
                                        </table>
                                        
                                        
                                        
                                        <table style="width:100%;border-left: 1px solid;border-right: 1px solid;" border="0">
                                              
                                              <tr class="box box-solid total-bg">
                                                <td class="text-right"> <?php echo $this->lang->line('total'); ?>  </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style=" border-bottom: 1px dashed;" class="text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"> <?php echo ($currency_symbol . number_format($total, 2, '.', '')); ?></td></tr>
                                                <tr class="box box-solid total-bg">
                                                <td class="text-right"> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td ></td>
                                                <td  class="text-right"><?php echo $this->lang->line('collection');  ?> :</td>
                                                <td  class="text text-right"></td>
                                                <td  class="text text-right"></td>
                                                <td class="text text-right"></td>
                                                <td  class="text text-right"> <?php echo ($currency_symbol . number_format($total, 2, '.', '')); ?></td>
                                                </tr>
                                                
                                                <tr class="box box-solid total-bg">
                                                <td class="text-right"> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td ></td>
                                                <td style=" border-bottom: 1px dashed;" style=" border-bottom: 1px dashed;" class="text-right"><?php echo $this->lang->line('deleted_amount');  ?> :</td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"><?php echo  ($currency_symbol . number_format($deleted_amount, 2, '.', '')); ?></td></tr>
                                                
                                                <tr class="box box-solid total-bg">
                                                <td class="text-right"> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td ></td>
                                                <td   class="text-right"><?php echo $this->lang->line('total_collection');  ?> :</td>
                                                <td  class="text text-right"></td>
                                                <td  class="text text-right"></td>
                                                <td class="text text-right"></td>
                                                <td class="text text-right"> 
												<?php 
												
												$total_collection=$total-$deleted_amount;
												
												echo ($currency_symbol . number_format($total_collection, 2, '.', '')); ?>  </td></tr>
                                                <tr class="box box-solid total-bg">
                                                <td class="text-right"> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td ></td>
                                                <td style=" border-bottom: 1px dashed;" style=" border-bottom: 1px dashed;" class="text-right"><?php echo $this->lang->line('refund');  ?> :</td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"></td>
                                                <td style=" border-bottom: 1px dashed;" class="text text-right"> </td></tr>
                                                
                                                <tr class="box box-solid total-bg" style="border-bottom: 1px solid;">
                                                <td class="text-right"> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td ></td>
                                                <td   class="text-right"><?php echo $this->lang->line('cash_hand');  ?> :</td>
                                                <td  class="text text-right"></td>
                                                <td  class="text text-right"></td>
                                                <td  class="text text-right"></td>
                                                <td  class="text text-right"> <?php echo ($currency_symbol . number_format($total, 2, '.', '')); ?> </td></tr>
                                              
                                              <tr  style="border-bottom: 1px solid;">
                                                <td class="text-right" style="color: #e80a0a;">Grand Total </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td ></td>
                                                <td   class="text-right"></td>
                                                <td  class="text text-right"></td>
                                                <td  class="text text-right"></td>
                                                <td  class="text text-right"></td>
                                                <td  class="text text-right" style="color: #e80a0a;"><?php echo ($currency_symbol . number_format($total, 2, '.', '')); ?>  </td></tr>
                                              
                                              
                                              
                                                    
                                            </tbody>
                                            
                                        </table>
                                        
                                        
                                        
                                        
                                    </div>    
                                     
                                    
                                </div>
                                
                              <?php } else { ?>
                              
                              <div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div><?php } ?>  

                            </div>
                            <div class="box-footer">
                                <div class="mailbox-controls"> 
                                    <div class="pull-right">
                                    </div>
                                </div>
                            </div>
                       <!-- </div>-->
                        
                        </div>
                    <?php
                }
                ?>
            </div>  
        </div>

    </section>
</div>

<script type="text/javascript">
    $(document).ready(function () {
  var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(),['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
  
  //var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), array('d' => "dd", 'm' => "mm", 'Y' => "yyyy",)) ?>';
        $(".date").datepicker({
            format: date_format,
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $.extend($.fn.dataTable.defaults, {
            ordering: false,
            paging: false,
            bSort: false,
            info: false
        });
    })
    $(document).ready(function () {
        $('.table-fixed-header').fixedHeader();
    });

    (function ($) {

        $.fn.fixedHeader = function (options) {
            var config = {
                topOffset: 50

            };
            if (options) {
                $.extend(config, options);
            }

            return this.each(function () {
                var o = $(this);

                var $win = $(window);
                var $head = $('thead.header', o);
                var isFixed = 0;
                var headTop = $head.length && $head.offset().top - config.topOffset;

                function processScroll() {
                    if (!o.is(':visible')) {
                        return;
                    }
                    if ($('thead.header-copy').size()) {
                        $('thead.header-copy').width($('thead.header').width());
                    }
                    var i;
                    var scrollTop = $win.scrollTop();
                    var t = $head.length && $head.offset().top - config.topOffset;
                    if (!isFixed && headTop !== t) {
                        headTop = t;
                    }
                    if (scrollTop >= headTop && !isFixed) {
                        isFixed = 1;
                    } else if (scrollTop <= headTop && isFixed) {
                        isFixed = 0;
                    }
                    isFixed ? $('thead.header-copy', o).offset({
                        left: $head.offset().left
                    }).removeClass('hide') : $('thead.header-copy', o).addClass('hide');
                }
                $win.on('scroll', processScroll);

                // hack sad times - holdover until rewrite for 2.1
                $head.on('click', function () {
                    if (!isFixed) {
                        setTimeout(function () {
                            $win.scrollTop($win.scrollTop() - 47);
                        }, 10);
                    }
                });

                $head.clone().removeClass('header').addClass('header-copy header-fixed').appendTo(o);
                var header_width = $head.width();
                o.find('thead.header-copy').width(header_width);
                o.find('thead.header > tr:first > th').each(function (i, h) {
                    var w = $(h).width();
                    o.find('thead.header-copy> tr > th:eq(' + i + ')').width(w);
                });
                $head.css({
                    margin: '0 auto',
                    width: o.width(),
                    'background-color': config.bgColor
                });
                processScroll();
            });
        };

    })(jQuery);

</script>


<script type="text/javascript">
  
   $(document).on('click', '#collection_print', function () {
	
   
     var printContents = document.getElementById('collection_report').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;

   
   });
   
   
   
   
   </script> 