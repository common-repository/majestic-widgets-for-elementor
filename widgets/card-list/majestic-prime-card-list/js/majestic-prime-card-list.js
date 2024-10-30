jQuery(document).ready(function ($) {
    // Get the middle card index
    var middleIndex = Math.floor($('.majestic-elite-card-list .cards').length / 2);

    // Apply a scale transformation to the middle card by default
    $('.majestic-elite-card-list .cards').eq(middleIndex).addClass('card-scale');
});