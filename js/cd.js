// @Author: Stefan Natter

var counter = 10;
function countdown() {
  if (--counter > 0) {
    window.setTimeout(countdown, 1000);
  } else {
    location.href = 'requested_url';
  }
}
function startCountdown() {
  window.setTimeout(countdown, 1000);
}