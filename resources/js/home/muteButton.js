
function muteButton() {
    const video = document.getElementById('audio_play')
    const button = document.getElementById('mute')
    button.onclick = function (){
        if (video.muted) {
            video.muted = false;
            console.log("videp is unmuted")
        }
        else {
            video.muted = true;
            console.log("video is muted")

        }
    }
}


