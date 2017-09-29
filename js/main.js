//video
$(document).ready(function () {
    function randomizeVideo() {
        var videosArray = ["oX6I6vs1EFs", "DVabBY-NXRg", "H6IsIWlSVkA", "C-Q7GeQG6iE"];
        //Pick a random index number from the array
        var randomIndex = videosArray[Math.floor(Math.random() * videosArray.length)];
        var videoUrl = "http://www.youtube.com/embed/" + randomIndex + "?autoplay=0&amp;frameborder=0&amp;controls=0&amp;modestbranding=1&amp;showinfo=0&amp;rel=0&amp;disablekb=1&amp;start=0&amp;iv_load_policy=3";
        //Use jQuery to use the class ytplaer and change the attribute src to the one I just made
        $(".ytplayer").attr("src", videoUrl);
    }
    randomizeVideo();
});