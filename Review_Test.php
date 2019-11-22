<?php
function renderStarRating($rating,$maxRating=5) {
    $fullStar = "<li><i class = 'fa fa-star'></i></li>";
    $halfStar = "<li><i class = 'fa fa-star-half-full'></i></li>";
    $emptyStar = "<li><i class = 'fa fa-star-o'></i></li>";
    $rating = $rating <= $maxRating?$rating:$maxRating;

    $fullStarCount = (int)$rating;
    $halfStarCount = ceil($rating)-$fullStarCount;
    $emptyStarCount = $maxRating -$fullStarCount-$halfStarCount;

    $html = str_repeat($fullStar,$fullStarCount);
    $html .= str_repeat($halfStar,$halfStarCount);
    $html .= str_repeat($emptyStar,$emptyStarCount);
    $html = '<ul>'.$html.'</ul>';
    return $html;
}
print(renderStarRating(4));