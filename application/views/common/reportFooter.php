<script type="text/javascript">


        function print_content() {
            var content = $("#printable_area").html();
			
			var html_content	= '<link rel="stylesheet" href="<?php //echo base_url("resource/assets/css/bootstrap.min.css"); ?>" /><link href="<?php echo base_url('resource/css/custom.css'); ?>" rel="stylesheet"><link rel="stylesheet" href="<?php echo base_url("resource/css/printPage.css"); ?>" />'+content;

            newwindow = window.open();
            newdocument = newwindow.document;
            newdocument.write('<div style="width:1056px" class="col-md-12">'+html_content+'</div>');
            newdocument.close();

            newwindow.print();

            return false;
        }

    </script>