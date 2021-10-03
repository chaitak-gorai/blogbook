/*
    Function scrollToTop changes scroll position to currentPositionOfX ,0 (scrollX, scrollY)
    Returns Undefined;
*/
function scrollToTop(){
    // Scrolling to top only, doesn't scroll in X axis
    scrollTo(window.screenX , 0)
    // Update visibility of button
    updateVisibility()
}
// Nessasary command, to ensure that function is declared on window, otherwise it could not be accessed on page.
window.scrollToTop = scrollToTop;


// Variable to set offset which triggers visibility of button (in pixels)
const beginingOfShowButton = 1
/* 
    Function isVisible is used for showing and hiding scroll to top button. (If it is already on top, why should button be visible?)
    Returns [Bool] - True if scroll is less than "beggingOfShowButton" px, otherwise False
*/
function isHidden(){
    return window.scrollY <= beginingOfShowButton;
}


// Variable to hold visibility state, used for stopping unnecessary updates.
let visibility = true;
/*
    Function updateVisibility is used to show and hide button according to "isHidden" function
    Returns Undefined;
*/
function updateVisibility(){
    const currentVisibility = isHidden()
    if(visibility != currentVisibility){
        // Change visibility style on button element to hidden or visible according to current visibility
        document.querySelector(".toTopButton").style.visibility =  currentVisibility ? "hidden" : "visible";
        // Update state
        visibility = currentVisibility
    }
    
}

/*
    Event register, if user scrolls on side, scrolling triggers "onScroll" event, which starts this function 
*/
window.onscroll = () => {
    updateVisibility()
}