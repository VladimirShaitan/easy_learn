<div class="main">
  
  <div class="main-inner">

      <div class="container">

          
        <!-- /row -->
  
        <div class="row">
          
          <div class="span8">
            
            <div class="widget">
            
          <div class="widget-header">
            <i class="icon-star"></i>
            <h3>Some Stats</h3>
          </div> <!-- /widget-header -->
          
          <div class="widget-content">





<?php echo validation_errors(); ?>
<?php echo form_open('opmaster/new_editors'); ?>

   <form class="form-horizontal">


    <div class="control-group">
      <label class="control-label span2" for="email">Writer's Email</label>
      <div class="span5">
        <input type="email" name="email" class="span5" placeholder="Your Primary email">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label span2" for="email">First Name</label>
      <div class="span5">
        <input type="text" name="firstname" class="span5" placeholder="Enter First Name">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label span2" for="email">Last Name</label>
      <div class="span5">
        <input type="text" name="lastname" class="span5" placeholder="Enter Last Name">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label span2" for="email">Your Gender</label>
      <div class="span5">
        <input type="radio" name="gender" value="male" class="frm-control"> Male
        <input type="radio" name="gender" value="female" class="frm-control"> Female
      </div>
    </div>

    <div class="control-group">
      <label class="control-label span2" for="email">Country</label>
      <div class="span5">
        <select name='country' class="span5" class="input_text" >
    <?php foreach ($country as $news_item) { ?>
    <option value="<?php echo $news_item['CountryName']; ?>">
    <?php echo $news_item['CountryName']; ?>
    </option>
    <?php } 
    ?>
    </select>
      </div>
    </div>

        <div class="control-group">
      <label class="control-label span2" for="streetaddress">Street address</label>
      <div class="span5">
        <input type="text" name="streetaddress" class="span5" placeholder="Street address">
      </div>
    </div>


        <div class="control-group">
      <label class="control-label span2" for="City">City</label>
      <div class="span5">
        <input type="text" name="city" class="span5" placeholder="Your City">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label span2" for="email">State</label>
      <div class="span5">
     <select name='state' class="span5" class="input_text" >
     <option value="other"> Outside USA  </option>
    <?php foreach ($states as $states) { ?>
    <option value="<?php echo $states['states_name']; ?>">
    <?php echo $states['states_name']; ?>
    </option>
    <?php } 
    ?>
    </select>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label span2" for="email">ZIP (postal code)</label>
      <div class="span5">
        <input type="text" name="zip" class="span5" placeholder="ZIP(postal code)">
      </div>
    </div>


    <div class="control-group">
      <label class="control-label span2" for="email">Your Password</label>
      <div class="span5">
        <input type="password" name="password" class="span5" placeholder="Secure Password (must be more than 5 characters)">
      </div>
    </div>


    <div class="control-group">
      <label class="control-label span2" for="email">Confirm Password</label>
      <div class="span5">
        <input type="password" name="cpassword" class="span5" placeholder="confirm Password (like one you entered above)">
      </div>
    </div>


    <div class="control-group">
      <label class="control-label span2" for="email">Primary Phone</label>
      <div class="span5">
        <input type="text" name="primaryphone" class="span5" placeholder="Primary Phone">
      </div>
    </div>

<!--
    <div class="control-group">
      <label class="control-label span2" for="email">Available 24/7?</label>
      <div class="span5">
     <input type="radio" name="availability" value="Yes" > Yes
     <input type="radio" name="availability" value="No"> No 
      </div>
    </div>
-->

    <div class="control-group">
      <label class="control-label span2" for="email">Citation</label>
      <div class="span5">
     <input type="checkbox" name="citation[]"  id="citation" value="MLA" > MLA</input>
     <input type="checkbox" name="citation[]" id="citation" value="APA"> APA</input>
    <input type="checkbox" name="citation[]" id="citation" value="Chicago/Turabian" > Chicago/Turabian</input>
     <input type="checkbox" name="citation[]" id="citation" value="Harvard"> Harvard </input>
      <input type="checkbox" name="citation[]" id="citation" value="Other"> Other</input> 
      </div>
    </div>

    <div class="control-group">
      <label class="control-label span2" for="email">Native language?</label>
      <div class="span5">
        <input type="text" name="nativelanguage" class="span5" placeholder="Native language">
      </div>
    </div>


    <div class="control-group">
      <label class="control-label span2" for="email">Highest Academic Level</label>
      <div class="span5">
    <select class="span5" name='academiclevel' class="input_text" >
     <option  value=""> Choose Option</option>
     <option value="Undergraduate"> Undergraduate</option>
     <option value="Bachelor"> Bachelor</option>
     <option value="Masters"> Masters</option>
     <option value="PhD"> PhD</option>
    </select><br />
      </div>
    </div>
    

    <div class="control-group">
      <label class="control-label span2" for="email">Subject Area (Select maximum 10 subjects)</label>
      <div class="span5">
    <div class="checkboxarea">
    <?php foreach ($subject as $subject) { ?>
    <div class="checkbox-inline"><input name="subject[]" id="subject" type="checkbox" value="<?php echo $subject['subject']; ?>">
    <?php echo $subject['subject']; ?>
    </input></div>
    <?php } 
    ?> </div>
      </div>
    </div>



    <div class="control-group">
      <label class="control-label span2" for="email">About me</label>
      <div class="span5">
          <textarea name="text" div="bio" class="span5" placeholder="short bio about you (seen by clients)"></textarea>
      </div>
    </div>

    <input type="submit"  class="btn btn-warning fullwidth" name="submit" value="Create writer" />
 <?php echo form_close();?>  
</form>
          </div> <!-- /widget-content -->
            
        </div> <!-- /widget -->
        
            
            
            
        </div> <!-- /span6 -->
          
          
          <div class="span4">
            
            <div class="widget">
              
          <div class="widget-header">
            <i class="icon-list-alt"></i>
            <h3>Another Chart</h3>
          </div> <!-- /widget-header -->
          
          <div class="widget-content">
            <canvas id="bar-chart" class="chart-holder" height="250" width="538"></canvas>
          </div> <!-- /widget-content -->
        
        </div> <!-- /widget -->
                  
          </div> <!-- /span6 -->
          
        </div> <!-- /row -->
        
        
        
      
        
        
      </div> <!-- /container -->
      
  </div> <!-- /main-inner -->
    
</div> <!-- /main -->
    

  