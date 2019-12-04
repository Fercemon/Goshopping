/* script for menu button */
let count = 1; 
function handleNavBar() {
count++;
    if(count % 2 === 0){
        document.querySelector('.dashboard-overlay').style.left=0;
    }else {
        document.querySelector('.dashboard-overlay').style.left='110%';
    }
}