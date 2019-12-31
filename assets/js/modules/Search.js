
import $ from 'jquery';


class Search {

  // describe and create/initiate our object

constructor() {
  this.resultsDiv = $("#search-overlay__results");
  this.searchTerm = $("#search-term");
  this.openButton = $(".js-search-trigger");
  this.closeButton = $(".search-overlay__close");
  this.searchOverlay = $(".search-overlay");
  this.events();
  this.isOverlayOpen = false;
  this.typingTimer;

}

// events

events() {

this.openButton.on("click", this.openOverlay.bind(this));
this.closeButton.on("click", this.closeOverlay.bind(this));
$(document).on("keydown", this.keyPress.bind(this));
this.searchTerm.on("keydown", this.typingLogic.bind(this));


}

//functions

typingLogic() {

  clearTimeout(this.typingTimer);
  this.resultsDiv.html('<div class="spinner-loader"></div>');
  this.typingTimer = setTimeout(this.getResults.bind(this), 2000);

}

getResults() {

  this.resultsDiv.html();
}

keyPress(e) {

if(e.keyCode == 83 && !this.isOverlayOpen) {

this.openOverlay();

}

if(e.keyCode == 27 && this.isOverlayOpen) {

this.closeOverlay();

}

}

openOverlay() {

  this.searchOverlay.addClass("search-overlay--active");
  $('body').addClass("body-no-scroll");
  this.isOverlayOpen = true;


}

closeOverlay() {

  this.searchOverlay.removeClass("search-overlay--active");
  this.isOverlayOpen = false;


}


}

export default Search;
