
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="blue bigger">REQUISITION NO - REQ#001<?php echo $reqDetails->requisition_id; ?></h4>
        </div>

        <div class="modal-body" id="printThisArea"> 
            <div class="col-xs-12 col-sm-12">
                            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="margin-top:1%"  class="table-condensed">
                              <tr>
                                <td align="center" style="padding:1%">
                                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center"><img src="<?php echo base_url('resource/interface/img/smscLogo.png'); ?>" class="img-responsive center-block" style="height:80px" /></td>
                                <td align="left" style="font-size:25px; line-height:20px !important; border:dashed 1px #CCC; width:400px; padding:1%;">
                                       S@ilor's Model School & College<br/>
                                           <span style="font-size:14px;"> <?php echo $this->session->branchName; ?><br/> 
                                           <?php echo $this->session->autohorBranchAddress; ?><br/>
                                        </span>       
                                </td>
                                <td align="center" style="font-weight:bold">REQUISITION COPY <br/><h3>PURCHASE REQUISITION</h3></td>
                              </tr>
                            </table>
                                </td>
                              </tr>
                              <tr>
                                <td align="center" style="padding:1%">
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="40%">
                                                <table width="100%" height="120" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                  <tr>
                                                    <td>To<br/>
                                                    S@ilor's Model School & College<br/>
                                                    Mobile : 01929588684
                                                    </td>
                                                  </tr>
                                               </table>
                                           </td>
                                            <td>
                                               <table width="100%" height="120" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                  <tr>
                                                    <td>Delivery To<br/>
                                                   <?php echo $reqDetails->depart_name ; ?><br/>
                                                   Email : info@gmail.com
                                                    </td>
                                                  </tr>
                                               </table>
                                            </td>
                                          </tr>
                                      </table>
                                </td>
                              </tr>
                              <tr>
                                <td>
                              <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th width="96">S.N</th>
                                        <th width="96">Product Name</th>														
                                        <th width="75" class="hidden-480"> Product Code</th>
                                        <th width="50" class="text-right"> Quantity</th>
                                        <th width="42" class="text-right">Price</th>
                                        <th width="100" class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php 
                                 //print_r($sellDetailsViewInfo);												
                                    $i = 1;
                                    $allamount = 0;
									
                                    foreach ($reqItemDetails as $v){
										$total_price   = $v->item_qnty * $v->price;
										$allamount += $total_price;
                                     
                                ?>
                                    <tr>    
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $v->item_name; ?></td>														
                                        <td class="hidden-480"><?php echo $v->item_code; ?></td>
                                        <td class="text-right"><?php echo $v->item_qnty ; ?></td>
                                        <td class="text-right"><?php echo $v->price; ?></td>
                                        <td align="right">	<?php echo $total_price; ?>.00</td>
                                    </tr>
                                         
                                    <?php } ?>
                                    <tr>    
                                        <td colspan="5" align="right">TOTAL AMOUNT :</td>														
                                        <td align="right"><?php echo $allamount ; ?>.00</td>
                                    </tr>
                                    
                                    
                                    
                                    <tr>    
                                        <td colspan="6" align="center"><strong>In Word :</strong>
														<?php 
                                                        function convert_number_to_words($number) {
                                                        
                                                        $hyphen      = '-';
                                                        $conjunction = ' And ';
                                                        $separator   = ', ';
                                                        $negative    = 'negative ';
                                                        $decimal     = ' point ';
                                                        $dictionary  = array(
                                                        0                   => 'Zero',
                                                        1                   => 'One',
                                                        2                   => 'Two',
                                                        3                   => 'Three',
                                                        4                   => 'Four',
                                                        5                   => 'Five',
                                                        6                   => 'Six',
                                                        7                   => 'Seven',
                                                        8                   => 'Eight',
                                                        9                   => 'Nine',
                                                        10                  => 'Ten',
                                                        11                  => 'Eleven',
                                                        12                  => 'Twelve',
                                                        13                  => 'Thirteen',
                                                        14                  => 'Fourteen',
                                                        15                  => 'Fifteen',
                                                        16                  => 'Sixteen',
                                                        17                  => 'Seventeen',
                                                        22                  => 'Eighteen',
                                                        19                  => 'Nineteen',
                                                        20                  => 'Twenty',
                                                        30                  => 'Thirty',
                                                        40                  => 'Fourty',
                                                        50                  => 'Fifty',
                                                        60                  => 'Sixty',
                                                        70                  => 'Seventy',
                                                        80                  => 'Eighty',
                                                        90                  => 'Ninety',
                                                        100                 => 'Hundred',
                                                        1000                => 'Thousand',
                                                        1000000             => 'Million',
                                                        1000000000          => 'Billion',
                                                        1000000000000       => 'Trillion',
                                                        1000000000000000    => 'Quadrillion',
                                                        1000000000000000000 => 'Quintillion'
                                                        );
                                                        
                                                        if (!is_numeric($number)) {
                                                        return false;
                                                        }
                                                        
                                                        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
                                                        // overflow
                                                        trigger_error(
                                                        'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' And ' . PHP_INT_MAX,
                                                        E_USER_WARNING
                                                        );
                                                        return false;
                                                        }
                                                        
                                                        if ($number < 0) {
                                                        return $negative . convert_number_to_words(abs($number));
                                                        }
                                                        
                                                        $string = $fraction = null;
                                                        
                                                        if (strpos($number, '.') !== false) {
                                                        list($number, $fraction) = explode('.', $number);
                                                        }
                                                        
                                                        switch (true) {
                                                        case $number < 21:
                                                        $string = $dictionary[$number];
                                                        break;
                                                        case $number < 100:
                                                        $tens   = ((int) ($number / 10)) * 10;
                                                        $units  = $number % 10;
                                                        $string = $dictionary[$tens];
                                                        if ($units) {
                                                        $string .= $hyphen . $dictionary[$units];
                                                        }
                                                        break;
                                                        case $number < 1000:
                                                        $hundreds  = $number / 100;
                                                        $remainder = $number % 100;
                                                        $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                                                        if ($remainder) {
                                                        $string .= $conjunction . convert_number_to_words($remainder);
                                                        }
                                                        break;
                                                        default:
                                                        $baseUnit = pow(1000, floor(log($number, 1000)));
                                                        $numBaseUnits = (int) ($number / $baseUnit);
                                                        $remainder = $number % $baseUnit;
                                                        $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                                                        if ($remainder) {
                                                        $string .= $remainder < 100 ? $conjunction : $separator;
                                                        $string .= convert_number_to_words($remainder);
                                                        }
                                                        break;
                                                        }
                                                        
                                                        if (null !== $fraction && is_numeric($fraction)) {
                                                        $string .= $decimal;
                                                        $words = array();
                                                        foreach (str_split((string) $fraction) as $number) {
                                                        $words[] = $dictionary[$number];
                                                        }
                                                        $string .= implode(' ', $words);
                                                        }
                                                        
                                                        return $string;
                                                        }
                                                        
                                                        
                                                        echo convert_number_to_words($allamount);
                                                        ?>  Tk.
                                        </td>														
                                    </tr>
                                </tbody>
                             </table>
                             </td>
                              </tr>
                              
                              <tr>
                                <td align="center">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="left" valign="middle" style="padding-right:200px; padding-left:10px; font-size:14px; font-family:Verdana, Geneva, sans-serif">
    (<?php echo $reqDetails->remarks ?>.)<br/>
                                       </td>
                                      </tr>
                                      
                                      <tr>
                                        <td><br/><br/>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td height="19">&nbsp;</td>
                                                <td align="center" valign="top"></td>
                                                <td>&nbsp;</td>
                                                <td align="center" valign="top" style="font-size:14px; font-family:Arial;"><?php echo $reqDetails->creator_name ?></td>
                                                <td>&nbsp;</td>
                                                <td align="center" valign="top" style="font-size:14px; font-family:Arial;">&nbsp;</td>
                                                <td>&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td width="27" height="19">&nbsp;</td>
                                                <td align="center" width="421" valign="top"></td>
                                                <td width="187">&nbsp;</td>
                                                <td width="443" align="center" valign="top" style="border-top:1px solid #000; font-size:16px; font-family:Arial;">PREPARED BY</td>
                                                <td width="166">&nbsp;</td>
                                                <td align="center" width="373" valign="top" style="border-top:1px solid #000; font-size:16px; font-family:Arial;">AUTHORISED SIGNATURE</td>
                                                <td width="29">&nbsp;</td>
                                              </tr>
                                            </table>

                                            <br/><br/>
                                         </td>
                                      </tr>
                                    </table>

                                </td>
                              </tr>
                            </table>  

            </div>                                               
        </div>

        <div class="modal-footer" style="background:#FFF; border:0px !important">
            <button class="btn btn-sm" data-dismiss="modal">
                <i class="ace-icon fa fa-times"></i>
                Cancel
            </button>

            <button class="btn btn-sm btn-primary" type="button" id="printme" data-title="PUR#000<?php echo $v->id ?>">
                <i class="ace-icon fa fa-check"></i>
                Print
            </button>
        </div>
    </div>

										