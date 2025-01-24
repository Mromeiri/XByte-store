
document.addEventListener('DOMContentLoaded', function() {
    // Your code here
  
  const urlParams = new URLSearchParams(window.location.search);
          const alertParam = urlParams.get('alert');
   if (alertParam === 'Password or Username unvalid') {
            var Probleme = document.getElementsByTagName('h2')[0];
  Probleme.innerHTML='Password or Username unvalid';
  Probleme.style.color = "rgba(255, 0, 0, 1)";
          }
          if (alertParam === 'Username exist') {
            var Probleme = document.getElementsByTagName('header')[1];
            Probleme.innerHTML='Username exist';
            Probleme.style.color = "rgba(255, 0, 0, 0.9)";
            register()
  
  
          }
        
        
        
        });