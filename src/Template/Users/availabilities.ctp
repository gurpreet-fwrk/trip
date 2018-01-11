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
              <a class="btn btn-primary blue" href="#">Your Listings</a>
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
        <div id="datepicker" class="datepick"></div>
        </div>
        <!--col-sm-9--> 
        
      </div>
    </div>
  </div>
</section>

<script>

$('#datepicker').multiDatesPicker({
	minDate: 0
});

$(document).delegate("#datepicker", "change", function(){
    	
	
        var selected = $(this).val();
        alert(selected);
    });

</script>