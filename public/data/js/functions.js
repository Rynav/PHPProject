function togglepasswordvisibility(){
    var passwordfield = document.getElementById('password')
    var showpassbutton = document.getElementById('showpassbutton')
    var shownicon = '<span><i class="fas fa-eye-slash"></i> </span> '
    var hiddenicon = '<span> <i class="fas fa-eye"></i> </span>'


    if(passwordfield.getAttributeNode('type').value == 'password') {
        passwordfield.setAttribute('type', 'text')
        showpassbutton.innerHTML = shownicon
    }
    else {
        passwordfield.setAttribute('type', "password")
        showpassbutton.innerHTML = hiddenicon
    }
}

document.addEventListener('DOMContentLoaded', () => {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
      const $notification = $delete.parentNode;
  
      $delete.addEventListener('click', () => {
        $notification.parentNode.removeChild($notification);
      });
    });
});




var curURL = window.location.href

if(!curURL.includes('/dashboard/')){}
else if(curURL.includes('/dashboard/?tab=info')){
  var btn1 = document.getElementById('info')
  btn1.setAttribute('style', 'width: 100%; border-radius: 6px 0px 0px 0px; background-color: rgb(24,24,24) ; border: none;');

}else if(curURL.includes('/dashboard/?tab=pfp')){
  var btn2 = document.getElementById('pfp')
  btn2.setAttribute('style', 'width: 100%; border-radius: 0px 0px 0px 0px; background-color: rgb(24,24,24) ; border: none;');
  


}else if(curURL.includes('/dashboard/?tab=password')){
  var btn3 = document.getElementById('pass')
  btn3.setAttribute('style', 'width: 100%; border-radius: 0px 0px 0px 6px; background-color: rgb(24,24,24);border: none;');
}
else{
  window.location.href = curURL + "?tab=info"
}