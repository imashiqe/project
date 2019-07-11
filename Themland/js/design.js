
// =========================
// Click to show more
// Gloabal variables

let records = document.getElementById('records');
let song = records.getElementsByClassName('artist-song');
var songs = document.querySelectorAll(".artist-song");
var showMore = document.getElementById("show-more");


// Show only first 20 list items and show 20 more with each button click. Once to end of list, button is hidden.
//turn this into plain javascript

// $(function () {
//     $('#show-more').click(function() {
//         $('.artist-song:hidden').slice(0, 19).show();
//         if ($('.artist-song').length === $('.artist-song:visible').length) {
//             $('#show-more').hide();
//         }
//     });
// });

// Show only first 20 list items and show 20 more with each button click. Once to end of list, button is hidden.

showMore.addEventListener("click", handleClick);

function handleClick() {
  var hiddenSongs = [];
  // loop through all of the songs and if the offsets of a given artist-song are <= 0 (meaning hidden) we'll push that song into a new array called hiddensongs.
  // https://makandracards.com/makandra/1339-check-whether-an-element-is-visible-or-hidden-with-javascript 
  for (let i = 0; i < songs.length; i++) {
    if (songs[i].offsetWidth <= 0 && songs[i].offsetHeight <= 0) {
      hiddenSongs.push(songs[i]);
    }
  }

  for (let i = 0; i < 8; i++) {
    // loop through 20 songs
    // we have to check to see if hiddenSongs[i] is true, we have to do this in case there are less than 20 in the loop
    // if it's true then we'll set the display to block
    if (hiddenSongs[i]) {
      hiddenSongs[i].style.display = "block";
    } else {
      // if hiddenSongs[i] ever becomes falsy that means that there are no more items to loops through so we can set the display of the showmore button to none and exit the loop
      showMore.style.display = "none";
      break;
    }
  }
  // empty the array so it grabs an updated list the next time handleClick executes
  hiddenSongs.length = 0;
}

//Future adds: Add link to artist Wikipedia page, Add sleve image, Add a link to a youtube video, Add year,

// Toggle Additional Information on button click
window.onload = function() {

    // var accItem = document.getElementsByClassName('artist-song');
    const toggle = document.getElementsByClassName('btn-more');
    for (i = 0; i < toggle.length; i++) {
        toggle[i].addEventListener('click', toggleItem, false);
    }
    function toggleItem() {
        const itemClass = this.parentNode.className;
        for (i = 0; i < song.length; i++) {
            song[i].className = 'artist-song close';
        }
        if (itemClass == 'artist-song close') {
            this.parentNode.className = 'artist-song open';
        }
    }
}

		