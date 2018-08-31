           <div class="col-md-10">

          <div class='panel-body filters'>
            <div class='row'>
          <table class='table'>
<h4> <br/>Исходящие </h4>
            <tbody>
               <?php foreach ($outbox as $outbox): ?>
              <tr>

                <td><i class="fa fa-star text-yellow"></i></td>
                <td class=""><a href='<?php echo site_url('in/Adminmsg/read/'.$outbox['msg_id']); ?>'>#<?php echo $outbox['id']; ?></a></td>
                <td class="col-md-2"><i class="fa fa-share"></i> <?php echo $outbox['receiver_name']; ?></td>
                <td class="col-md-7"><a href='<?php echo site_url('in/Adminmsg/read/'.$outbox['msg_id']); ?>'><?php echo $outbox['msg_title']; ?></a></td>
                <td class="col-md-2">@<?php echo date('dS,F,Y',strtotime($outbox['msg_date']));?></td>
              </tr>
<?php endforeach; ?>
            </tbody>
          </table>

        </div>

          </div>
 </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="https://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
  </body>
</html>
