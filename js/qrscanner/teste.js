window.onload =  function() {
    /* Ask for "environnement" (rear) camera if available (mobile), will fallback to only available otherwise (desktop).
     * User will be prompted if (s)he allows camera to be started */
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" }, audio: false }).then(function(stream) {
        var video = document.getElementById("video-preview");
        video.srcObject = stream;
        video.setAttribute("playsinline", true); /* otherwise iOS safari starts fullscreen */
        video.play();
        setTimeout(tick, 100); /* We launch the tick function 100ms later (see next step) */
    })
        .catch(function(err) {
            console.log(err); /* User probably refused to grant access*/
        });
};