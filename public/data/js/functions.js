function togglepasswordvisibility(){
    var passwordfield = document.getElementById('password')
    var showpassbutton = document.getElementById('showpassbutton')
    var shownicon = '<span> <i class="fas fa-eye-slash"></i> </span> '
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
