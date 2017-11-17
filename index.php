<!DOCTYPE html>
<?php 
    echo realpath(__FILE__);
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>DropZone</title>
		<link rel="stylesheet" href="assets/css/style.css"/>
		<link rel="stylesheet" href="assets/css/jquery.mThumbnailScroller.css">
		<link rel="stylesheet" href="assets/css/lightbox.css">
	</head>
	<body>
<?php
	$url = 'http://graphics8.nytimes.com/images/2015/06/09/world/asia/north-korea-ss-slide-GX03/north-korea-ss-slide-GX03-superJumbo.jpg';
$img = 'uploads/' . basename($url);
file_put_contents($img, file_get_contents($url));
?>
		<header>
			<h1>&nbsp;</h1>
		</header>
		<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
			<div id="drop">
				Glisser des fichiers ici
				<a>Choisir</a>
				<input type="file" name="upl" multiple />
			</div>
			<div id='test'>
				<ul>
					<!-- The file uploads will be shown here -->
				</ul>
			</div>
		</form>
		<footer>
			<div id="my-thumbs-list" class="mThumbnailScroller" data-mts-axis="x" data-mts-type="hover-precise">
				<section id="examples">
					<div id="content-5" class="content">
						<ul>
						<?php
							$dir = opendir('uploads');
							
							// loop through it, looking for any/all JPG files:
							while (false !== ($fname = readdir( $dir ))) {
								// parse path for the extension
								$info = pathinfo($pathToImages . $fname);
								// continue only if this is a image
								if ( strtolower($info['extension']) == 'png' 
									|| strtolower($info['extension']) == 'jpg' 
									|| strtolower($info['extension']) == 'jpeg' 
									|| strtolower($info['extension']) == 'gif' 
									|| strtolower($info['extension']) == 'bmp') 
								{
									$fname = str_replace(" ","%20",$fname);
									echo 
'							<li>
								<a href="http://public.zurp.me/' . $fname . '" data-lightbox="' . $fname . '" data-title="' . $fname . '" >
									<img src="http://public.zurp.me/' . $fname . '" />
								</a>
							</li>';
								}
							}
							// close the directory
							closedir( $dir );
						?>
						</ul>
					</div>
				</section>
			</div>
		</footer>
		<!-- JavaScript Includes -->
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.knob.js"></script>
		<script type="text/javascript" src="assets/js/jquery.mThumbnailScroller.js"></script>
		<script type="text/javascript" src="assets/js/ZeroClipboard.js"></script>
		<script type="text/javascript" src="assets/js/lightbox.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script type="text/javascript" src="assets/js/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="assets/js/jquery.iframe-transport.js"></script>
		<script type="text/javascript" src="assets/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script type="text/javascript" src="assets/js/script.js"></script>
	</body>
</html>