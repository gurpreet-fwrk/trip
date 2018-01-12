<?= $this->Html->css( array('multidatespicker/jquery-ui.structure', 'multidatespicker/jquery-ui.theme', 'multidatespicker/mdp') ) ?>
<?= $this->Html->script(array('multidatespicker/jquery-ui.multidatespicker', 'multidatespicker/jquery-ui-1.11.1')) ?>


<section class="basic">
  <div class="second">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="base base_b"> 
          
         	 <!--small_slider-->
              <div class="small_slider slider_manage">
              <a class="btn btn-primary blue" href="<?php echo $this->request->webroot ?>trips">Your Listings</a>
              <h3>Trip</h3>
              <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="item">
                   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                   </div>
                  <div class="item">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                   </div>
                  <div class="item active">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                  </div>
                </div>
              
               </div>
               </div><!--small_slider-->
            
          </div>
        </div>
        <div class="col-sm-9">
        
        <?php echo $this->Flash->render(); ?>
            
        <div id="datepicker" class="datepick"></div>
        
        <?php //echo "<pre>"; print_r($availabilities); echo "</pre>"; ?>
        
        <form action="<?php echo $this->request->webroot ?>users/availabilities" method="post">
        <input type="hidden" name="dates">
        <input type="submit">
        </form>
        </div>
        <!--col-sm-9--> 
        
      </div>
    </div>
  </div>
</section>

<script>
var date = new Date();

var all_dates = [];

var selected_dates = [];

var availabilities = $.parseJSON('<?php echo json_encode($availabilities) ?>');
for(i=0; i<Object.keys(availabilities).length; i++){
    selected_dates.push(new Date(availabilities[i]['date']).getTime());
    all_dates.push(availabilities[i]['date']);
}

$( "#datepicker").multiDatesPicker({
    minDate: 0,
    dateFormat: "yy/m/d",
    addDates: selected_dates,
    //showButtonPanel: true,
    //changeMonth: true,
    //changeYear: true,
    onSelect: function(dateText, inst) { 
       

        if($.inArray(dateText, all_dates) !== -1){
            
            for(var i=0;i<all_dates.length;i++) {
                if(all_dates[i] == dateText){
                    all_dates.splice(i,1);
                }
            }
            
            var data = '';
            
            for(var i=0;i<all_dates.length;i++) {
                if(i+1 == all_dates.length ){
                    data += all_dates[i];
                }else{
                    data += all_dates[i]+',';
                }
            }
            
            $('input[name="dates"]').val(data);
            
        }else{
            all_dates.push(dateText);
            var dates = $('input[name="dates"]').val();
            if(dates == ''){
                $('input[name="dates"]').val(dateText);
            }else{
                $('input[name="dates"]').val(dates+','+dateText);
            }
        }
        
    }
});

</script>