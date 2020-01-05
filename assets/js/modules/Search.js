
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
  this.isSpinnerVisible = false;
  this.previousValue;
  this.typingTimer;

}

// events

events() {

this.openButton.on("click", this.openOverlay.bind(this));
this.closeButton.on("click", this.closeOverlay.bind(this));
$(document).on("keydown", this.keyPress.bind(this));
this.searchTerm.on("keyup", this.typingLogic.bind(this));


}

//functions

typingLogic() {

  // Search if not match to previous value

if(this.searchTerm.val() != this.previousValue) {

   //Clear Timeout after typing
  clearTimeout(this.typingTimer);

  if(this.searchTerm.val()) {

    //Dont run spinner again if already running
    if(!this.isSpinnerVisible) {
      this.resultsDiv.html('<div class="spinner-loader"></div>');
      this.isSpinnerVisible = true;

    }

    this.typingTimer = setTimeout(this.getResults.bind(this), 2000);

  } else {


    this.resultsDiv.html('');
    this.isSpinnerVisible = false;

  }



}

  this.previousValue = this.searchTerm.val();

}

getResults() {

$.getJSON(BlogUrl.root_url + '/wp-json/artificial_topic/v3/search?term='+ this.searchTerm.val(), (posts)=> {

  this.resultsDiv.html(`

    <h2 class="search-overlay__section-title">Gernal Information</h2>
    ${posts.length ? '<ul class="link-list min-list">' : `<p>No Gernal Information matches that search. <a href="${BlogUrl.root_url}/blog">View All</a></p>`}
    ${posts.map(item => `<li><a target="_blank" href="${item.url}">${item.title}</a></li>`).join('')}
    ${posts.length ? '</ul>' : ''}

  `);

  this.isSpinnerVisible = false;

});

}

keyPress(e) {

if(e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) {

this.openOverlay();

}

if(e.keyCode == 27 && this.isOverlayOpen) {

this.closeOverlay();

}

}

openOverlay() {

  this.searchOverlay.addClass("search-overlay--active");
  this.searchTerm.val('');
  $('body').addClass("body-no-scroll");
  setTimeout(() => this.searchTerm.focus(), 301);
  this.isOverlayOpen = true;


}

closeOverlay() {

  this.searchOverlay.removeClass("search-overlay--active");
  $('body').removeClass("body-no-scroll");
  this.isOverlayOpen = false;


}


}

export default Search;
