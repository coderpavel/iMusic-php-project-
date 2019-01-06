
    
    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="theme-section-heading">
                        <h1>Get <span>in touch</span></h1>
                        <h4>If you have any question, contact us any time.</h4>
                    </div>


                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1  col-xs-12">
                        <form name="contactForm" data-toggle="validator" onsubmit="return email();" action="">  
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="fname" name="fname" placeholder="First Name" class="form-control"  type="text" required>
                            </div>  

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                                <input type='email' id="mail" class='form-control' name='mail' placeholder='Email Here' required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <textarea id="comment" class="form-control" name="comment" placeholder="Your Comments" rows="3" cols="30" required></textarea>
                            </div>

                            <div class="input-group">
                                <button type='submit' class='btn btn-default header-button'>Send Message</button>
                            </div>
                        </form>
                    </div>


                    <div class="col-lg-5 col-lg-offset-1 col-md-6 col-sm-6 col-xs-12">
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 icons"> <!--bebin first col contact section-->
                            <ul>
                                <li><i class="fa fa-map-marker"></i> Inha</li>
                                <li><i class="fa fa-phone"></i> (90) 924-30-31 </li>
                                <li><i class="fa fa-envelope"></i> 9243031@gmail.com</li>
                            </ul>
                        </div><!--end first col contact section-->

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 icons"> <!--bebin second col contact section-->
                            <ul>
                                <li><a href="#"><i class="fa fa-instagram"></i>Instagram </a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i>Facebook </a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i>Twetter </a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> On Google+ </a></li>
                            </ul>
                        </div><!--end second col contact section-->

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                     
                    <div class="theme-section-heading">
                        <h1>Our <span>location</span></h1>
                    </div>

                        <div id="map" class="mapping"></div>
                        <script>
                          function initMap() {
                            var uluru = {lat: -25.363, lng: 131.044};
                            var map = new google.maps.Map(document.getElementById('map'), {
                              zoom: 4,
                              center: uluru
                            });
                            var marker = new google.maps.Marker({
                              position: uluru,
                              map: map
                            });
                          }
                        </script>
                        <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1eAQMjHGSA3eXvW0JW1ErFtxHhV_lozQ&callback=initMap">
                        </script>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                        <br><p>Made with love by Pavel 2017. All Rights Reserved.</p>
                    </div>
                </div> <!-- col lg-12 ends -->
            </div><!-- row ends -->
        </div> <!-- container ends -->
    </section>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custome JavaScript -->
    <script src="js/custom.js"></script>


	<script>
	$(document).ready(function(){
	    $('#music a').click(function(){
	        event.preventDefault();
	        var value = $(this).attr('href');
	        $('source').attr("src", value);
	        $("#aud").load();

            $.ajax
                ({
                  type:'post',
                  url: 'view_update.php',
                  data: 
                  {
                     track_link: value
                  },
                  success: function (response) 
                  {
                  
                    
                  }
                }); 
	    });
	});


	</script>

</body>

</html>
