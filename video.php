<?php

include('inc/connect.php');
include('header.php');
include('inc/timeago.php');

$id=$_GET["id"];

$result = mysqli_query($con,"SELECT videos.name, videos.image, videos.description, videos.user_id, videos.categories_id, videos.date_added, videos.url, videos.rating, users.username, users.id FROM videos INNER JOIN users ON users.id=videos.user_id WHERE videos.id=$id");

while($row = mysqli_fetch_array($result)){
	$title = $row['name'];
	$description = $row['description'];
	$user_id = $row['user_id'];
	$username = $row['username'];
	$categories_id = $row['categories_id'];
	$date_added = $row['date_added'];
	$url = $row['url'];
	$image = $row['image'];
	$rating = $row['rating'];
}
?>
<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit" id="video-unit">
		<div class="container">
			<div class="row center">
				<video class="span11 center" style="background:#000" id="video" preload="auto" autobuffer="" controls="" poster="videos/thumbnails/<?php echo $image ?>">
				  	<?php echo '<source src="videos/'.$url.'" type="video/mp4">'; ?>
				  	<!--<source src="movie.ogg" type="video/ogg">-->
					Your browser does not support the video tag.
				</video>
			</div>
		</div>
</div>

<section id="about-video">
	<div class="container">
    	<div class="row">
				<div class="span7" style="padding-top: 20px">
					<ul id="video-title">
						<li id="video-title"><h1><?php echo $title; ?></h1></li>
						<li id="like" style="margin: 0px !important"><a href="#" onclick="addrating(<?php echo $id ?>)" class="voteup-button"></a></li>
						<li id="dislike" style="margin: 0px !important"><a href="#" onclick="minusrating(<?php echo $id ?>)" class="votedown-button"></a></li>
						<li data-value="<?php echo $rating ?>" id="rating"
							<?php if($rating > 0){
								?> class="green" <?php
							} elseif ($rating < 0) {
								?> class="red" <?php
							} ?>
						 ><h2>
							<?php if($rating > 0){
								?> + <?php
							} elseif ($rating < 0) {
								?> - <?php
							} ?>
						 <?php echo $rating ?></h2></li>
					</ul>
				</div>
				<div id="specific_buttons" class="span4 social-share">
				  <div id="twitter" data-url="http://www.cdisports.jamescobbett.co.uk<?php echo $_SERVER['REQUEST_URI']?>" data-title="Share on Twitter"></div>
				  <div id="facebook" data-url="http://www.cdisports.jamescobbett.co.uk<?php echo $_SERVER['REQUEST_URI']?>" data-title="Share on Facebook"></div>
				  <div id="pinterest" data-url="http://www.cdisports.jamescobbett.co.uk<?php echo $_SERVER['REQUEST_URI']?>" data-title="Share on Google Plus"></div>	
				</div>
				<div class="span7" style="margin-top: -10px">
					<div class="author" id="author">Uploaded by <a href="http://cdisports.jamescobbett.co.uk/user.php?id=<?php echo $user_id ?>"><?php echo $username; ?></a></div>
					<div class="date" id="date"><?php echo ago($date_added); ?></div>
					<div class="description" id="description"><?php echo $description; ?></div>
				</div>


				<!--<div id="social-share" class="span4">
					<img src="images/twitter-share.png">
					<img src="images/facebook-share.png">
					<img src="images/pinterest-share.png">
				</div>-->
		</div>
	</div>
</section>

<section id="related-videos">
	<div class="container reducebottom">
    	<div class="row">
			<div class="span12">
				<h3>RELATED VIDEOS //</h3>
				<?php
					$result2 = mysqli_query($con,"SELECT videos.id, videos.name, videos.description, videos.user_id, videos.categories_id, videos.date_added, videos.url, videos.length, videos.image, categories.category FROM videos INNER JOIN categories ON categories.id=videos.categories_id WHERE videos.categories_id=$categories_id LIMIT 3");
					?>
					<div class="row row-fix">
					<?php
					while($row = mysqli_fetch_array($result2)){
					?>
					<div id="recent-videos" class=" tab-pane fade active in video-grid">
				        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4 video text-center box"> 
				        	<a href="/video.php?id=<?php echo $row['id'];?>" class="video-overlay">
				        		<div>
				        			<h2><?php echo $row['name'];?></h2>
				        			<span><?php echo $row['category'];?></span>
				        		</div>
				        	</a>    
				       		<img src="videos/thumbnails/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>" />
				       		<div class="overlay">
		                      <span class="span-title"><?php echo $row['name'] ?></span>
		                       <?php
		                      $length = explode(":", $row['length']);
								$mins = $length[1];
								$length = explode(".", $length[2]);
								$row['length'] = $mins.":".$length[0];
							?>
		                      <span class="span-length"><?php echo $row['length'] ?></span>
		                    </div>
				        </div>
				    </div>
					<?php } ?>
					</div>
			</div>	
		</div>
	</div>
</section>

<section id="comments-hottest">
	<div class="container">
    	<div class="row">
			<div class="span6">
				<h3>COMMENTS //</h3>
<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'cdisports'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
			</div>
			<div class="span5">
				<h3>THIS WEEKS HOTTEST //</h3>
				<script type="text/javascript">$( document ).ready(function() {hottestvideos_videopage(7, 3);});</script>	
				<div id="weeks-hottest" class=" tab-pane fade active in video-grid">
			<div>	
		</div>
	</div>
</section>

<script type="text/javascript">

$('#twitter').sharrre({
      share: { twitter: true },
      url: document.URL,
      enableHover: false,
      enableTracking: true,
      template: '<a class="box" href="#"><div class="count" href="#">{total}</div></a>',
      buttons: { twitter: {via: 'James_Cobbett'}},
      click: function(api, options){
	    api.simulateClick();
	    api.openPopup('twitter');
	  }
    });

    $('#facebook').sharrre({
      share: { facebook: true },
      title: <?php echo '"'.$title.'"' ?>,
      text: <?php echo '"'.$description.'"' ?>,
      url: document.URL,
      enableHover: false,
      enableTracking: true,
      template: '<a class="box" href="#"><div class="count" href="#">{total}</div></a>',
      click: function(api, options){
	    api.simulateClick();
	    api.openPopup('facebook');
	  }
    });



    $('#pinterest').sharrre({
	  share: { pinterest: true },
	  url: document.URL,  //if you need to personalize url button
  	  media: '',
      description: '',
      template: '<a class="box" href="#"><div class="count" href="#">{total}</div></a>',
      	  click: function(api, options){
	    api.simulateClick();
	    api.openPopup('pinterest');
	  }
	});

	document.getElementById("video").addEventListener('play', function(){ addcount(<?php echo $id; ?>); }, false);

	// $( document ).ready(function() {
	// 	// This block of code must be run _after_ the DOM is ready
	// 	// This will capture the frame at the 10th second and create a poster
	// 	var video = Popcorn( "#video" );

	// 	// Once the video has loaded into memory, we can capture the poster
	// 	video.listen( "canplayall", function() {

	// 	  this.currentTime( 10 ).capture();

	// 	});
	// });
</script>

<?php include('footer.php'); ?>