   <!--work-shop-->
<section id="work-shop" class="section-padding">
      <div class="container">
        <div class="row">
                                          <div class="header-section text-center">

            <hr class="bottom-line">
          </div>
          <div class="col-md-12">
            <div class="orders-profile loggedin">
         
        <div class="row">
         <h2> <?php echo $topic;?></h2>
        </div>


        <div class="row odetails">

          <div class="col-md-2 border-right ">

<table class="table table-condensed">
   <tbody>
     <tr>
    <td class="text-right col-sm-4">Category: </td>
    <td class="description"><?php echo $subject;?></td>
  </tr>

     <tr>
    <td class="text-right col-sm-4">Words:</td>
    <td class="description"><?php echo $words;?></td>
  </tr>
    <tr>
    <td class="text-right col-sm-4">Amount:</td>
    <td class="description"><?php echo '$'.$writerpay;?></td>
  </tr>
       <tr>
    <td class="text-right col-sm-4">Status</td>
    <td class="description"><?php echo $order_status;?></td>
  </tr>        
  <tr>
    <td class="text-right col-sm-4">Writer:</td>
    <td class="description"><?php echo $preferred_writer;?></td>
  </tr> 

  </tbody>
</table> 



          </div>
          <div class="col-md-10">


<p>Paper instructions</p>
<div class="orders-profile"><?php echo $instructions;?>
  <hr/>
<h1> Answer </h1>


<div class="dmh-answer row">

<?php           
   echo preg_replace(array('/advantages/', '/toward/', '/may/', '/trial/','/large/','/general/','/provide/','/information/','/issue/','/such/', '/language/', '/does not /', '/follow/', '/common/','/using/', '/well/', '/single/', '/begin/', '/related/', '/those/',  '/benefit/', '/need/', '/early/', '/detail/', '/consideration/', '/proceed/', '/approach/','/review/', '/how/', '/based/', '/paper/', '/some /','/usually/','/again/','/high/','/been/','/type/','/these/','/apply/','/specific/','/have/','/other/','/were/','/took/','/place/','/between/','/study/','/factors/','/various/','/most/','/mean/','/change/','/would/','/allow/','/advantage/','/select/','/about/','/standard/','/certain/','/just/','/after/','/before/','/include/','/below/','/period /','/However/','/however/','/manner/','/effective/','/has/','/and/','/very/','/There/','/here/','/was/','/difference/','/its/','/it is/','/that/','/make/','/than/','/like/','/more/','/from/','/From/','/particular/','/find/', '/often/','/great/','/complete/','/They/','/this/','/same/','/reduce/','/should/','/lead/','/into/','/which/','/will/','/for/','/are/', '/order/','/can/','/being/','/rate/','/consider/','/total/','/do not/','/cost/','/impact/','/countr/','/his/','/able/','/addition/','/people/','/done/','/who/','/work/','/argu/','/this/','/them/','/affect/','/behavior/','/only/','/bes/','/way/','/many/','/while/','/over/','/led/','/when/','/long/','/she/','/tim/','/due/','/had/','/next/','/is in/','/could/','/what/','/inc/','/aim/','/pay/','/depend/','/involv/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/big/','/but/','/last/','/the/','/know/','/rather/', '/ways/' ,'/also/' , '/fact/'), 'xxxx', $extract);
             ?> 

</div>
</div>
<hr/>



          </div>

        </div>

            </div>
          </div>          

        </div>
      </div>
    </section>
    <!--/ work-shop-->


<script>
   $(document).ready(function() {
       $('form.assign_writer').on('submit',
         function(form){
           form.preventDefault();
           $.post('<?php echo ci_site_url(); ?>ordersed/assign_writer', $('form.assign_writer').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
             location.reload();
           });
           });
   
   });
</script>   


<script>

$(document).ready(function() {
    $('form.jsddform').on('submit',
      function(form){
        form.preventDefault();
        $.post('<?php echo ci_site_url(); ?>/Ordersed/submission', $('form.jsddform').serialize(), function(data){
          $('div.jsError').html(data);
          $('div.show').show();
          $('div.show').hide();
          location.reload();
        });
        });

});
</script>

<script>
   $(document).ready(function() {
       $('form.jsform').on('submit',
         function(form){
           form.preventDefault();
           $.post('<?php echo ci_site_url(); ?>messages/post_message', $('form.jsform').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
             location.reload();
           });
           });
   
   });
</script>
<script type="text/javascript">
   jQuery(document).ready(function($){
   
        $(document).on('click', 'button#ADDFILE', function(event) {
           event.preventDefault();
           $("div#submit").css("display", "block")
           addFileInput();
        });
   
        function addFileInput() {
           var html ='';
           html +='<div class="alert alert-info">';
           html +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>';
           html +='<strong> Upload file </strong>';
           html +='<input type="file" name="multipleFiles[]">';
           html +='<input type="hidden" name="upload_type" value="material">';
           html +='</div>';
   
           $("div#uploadFileContainer").append(html);
        }
   
   });
   
</script>

<script>
$('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');
</script>


<script>
   $(document).ready(function() {
       $('form.order_rating').on('submit',
         function(form){
           form.preventDefault();
           $.post('<?php echo ci_site_url(); ?>/Messages/order_rating', $('form.order_rating').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
             location.reload();
           });
           });
   
   });
</script>

<script>
$(document).ready(function() {
    $('form.profadminedit').on('submit',
      function(form){
        form.preventDefault();
        $.post('<?php echo ci_site_url(); ?>/Ordersed/editmyorder', $('form.profadminedit').serialize(), function(data){
          $('div.jsError').html(data);
          $('div.show').show();
          $('div.show').hide();
          location.reload();
        });
        });

});
</script>

