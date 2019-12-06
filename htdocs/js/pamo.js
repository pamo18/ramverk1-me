/**
 * To show off JS works and can be integrated.
 */
"use strict";

// eslint-disable-next-line no-unused-vars
function tableLinks(id, url) {
    var element = document.getElementById(id);

    element.addEventListener("click", function() {
        location.href = url;
    });
}
