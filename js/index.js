'use strict';
const options = {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric'
};
date = new Date().toLocaleDateString("en-US", options);
document.getElementById("current_date").innerHTML = date;

$("button").toggleClass("button-8");
$("button").attr("role", "button");