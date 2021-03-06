<?php session_start();
require_once("TMB/functions.php");
?>

<?php $title = 'Most Viewed YouTube Videos | Popular Videos | Grid View | TubeList'; include("header.php"); ?>

<?php require_once("navbar.php");?>

<div class="container">

<?php require_once("filters.php");?>

    <div class="row">

            
        <div class="col-md-8">

                <div class = "listButton">             
                      <ul class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Thumbnail View<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href=# onclick="location.href='list.php'+window.location.search">List View</a></li>
                          <!--  <li><a href=# onclick="location.href='index.php'+window.location.search">Thumbnails</a></li> -->
                        </ul>
                      </ul>             
                </div>

          <!--   <div class="videoHeader">Videos</div> -->
            <div class="searchBox">
                <div class="videoList" id="videoList"></div>
            </div> <!--searchBox-->           
        </div> <!--col md 8-->
       
        <div class="col-md-4">
            <div id="playerContainer">
                <div id="player"></div>
                <br>
            </div> <!-- player container-->           
        </div><!--col md 4-->
        
        <div class="col-md-4">
            <div id="playList" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h5 align="center">Drag & Drop Play List</h5>
            </div>
        </div><!--col md 4-->
        
    </div><!--row-->
    
</div><!--container-->

<?php require_once("footer.php");?>

<script>

    getVideoList('videos');

  /* ===========================================================================================
    The YouTube Player - code from https://developers.google.com/youtube/iframe_api_reference
 ============================================================================================== */
      //This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

     //This function creates an <iframe> (and YouTube player)  after the API code downloads.   
      var player;        
      function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '263',
                width: '350',
                videoId: '9bZkp7q19f0',
                // videoId: document.getElementById("videoList").children[0].id,
                playerVars: {
                    'controls': 1,
                    'disablekb': 1
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        //The API will call this function when the video player is ready.
    function onPlayerReady(event) {
    }

        //The API calls this function when the player's state changes.
      function onPlayerStateChange(event) {
    }
/* ===========================================================================================    
 ============================================================================================== */

    // add meta data on hover
    $(function () {
        $(document).on('mouseenter', '.videoItemContainer', function (e) {
            var $id = $(this).attr('id');
            //console.log($id);
            var $THIS = $(this);
            var vedioMeta = $THIS.find(".videoMeta");
            if (vedioMeta.length == 0) {
                $.get('TMB/meta.php', {id: $id}, function (data) {
                    $THIS.append("<div class='videoMeta'>" + data + "</div>");
                });
            }
        });
    });

</script>

</body>
</html>