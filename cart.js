
window.addEventListener('load', function() {
    let newArray=[];
    /* if user confirme directly */
    var table = document.getElementById("myTable");
        tr = table.getElementsByTagName('tr');
        length = tr.length
       total = 0;
       let Array = [];
       for (let i = 1; i < length-1; i++) {
           prix = removeSpacesFromNumber(tr[i].querySelector("td:nth-child(3)").textContent);
           qte = tr[i].querySelector("td:nth-child(4) div div input").value;
           newArray.push(qte);
           Array.push(qte);
            Amount = parseFloat(qte)*parseFloat(prix);
            total+=Amount;
            tr[i].querySelector("td:nth-child(5) p").textContent = formatNumberWithSpaces(Amount);   
       }
       console.log(newArray);
        tr[length-1].querySelector("td:nth-child(5)").textContent = "TOTAL =" + formatNumberWithSpaces(total)+" DA" ;
        
        promo = parseFloat(document.getElementById("promo").textContent);
        total1 = total * (1 - (promo / 100));
console.log(total1);
        console.log(promo)
         table = document.getElementsByClassName('table')[1];
     tr = table.getElementsByTagName('tr');
         tr[0].querySelector("td:nth-child(2) p").textContent=formatNumberWithSpaces(total)+" DA";
         tr[2].querySelector("td:nth-child(2) p").textContent=formatNumberWithSpaces(total1)+" DA";

         const jsonString = JSON.stringify(newArray);
       setCookie("myCookie", jsonString, 7); 
       const ttl = JSON.stringify(total1);
       setCookie("to", ttl, 7); 

       
       
   

        $('.qtybutton').on('click', function () {
        var table = document.getElementById("myTable");
        tr = table.getElementsByTagName('tr');
        length = tr.length
       total = 0;
       let Array = [];
       let newArray = [];
       for (let i = 1; i < length-1; i++) {
           prix = removeSpacesFromNumber(tr[i].querySelector("td:nth-child(3)").textContent);
           
           qte = tr[i].querySelector("td:nth-child(4) div div input").value;
           newArray.push(qte);
           Array.push(qte);
            Amount = parseFloat(qte)*parseFloat(prix);
            total+=Amount;
            tr[i].querySelector("td:nth-child(5) p").textContent = formatNumberWithSpaces(Amount);   
       }
       console.log(newArray)
        tr[length-1].querySelector("td:nth-child(5)").textContent = "TOTAL =" + formatNumberWithSpaces(total)+" DA" ;
        
        promo = parseFloat(document.getElementById("promo").textContent);
        total1 = total * (1 - (promo / 100));
console.log(total1);
        console.log(promo)

        table = document.getElementsByClassName('table')[1];
     tr = table.getElementsByTagName('tr');
         tr[0].querySelector("td:nth-child(2) p").textContent=formatNumberWithSpaces(total)+" DA";
         tr[2].querySelector("td:nth-child(2) p").textContent=formatNumberWithSpaces(total1)+" DA";
         const jsonString = JSON.stringify(newArray);
       setCookie("myCookie", jsonString, 7); 
       
       const ttl = JSON.stringify(total1);
       setCookie("to", ttl, 7); 
});});
function formatNumberWithSpaces(number) {
    // Convert the number to a string
    let numberStr = String(number);
  
    // Reverse the string to start adding spaces from the end
    numberStr = numberStr.split('').reverse().join('');
  
    // Add spaces every three digits
    const spacedNumber = numberStr.replace(/(\d{3})/g, '$1 ').trim();
  
    // Reverse the string again to get the original order
    return spacedNumber.split('').reverse().join('');
  }
  function removeSpacesFromNumber(formattedNumber) {
    // Remove all spaces from the formatted number
    const numberWithoutSpaces = formattedNumber.replace(/\s/g, '');
  
    return numberWithoutSpaces;
  }
  function setCookie(cookieName, cookieValue, expirationDays) {
    const d = new Date();
    d.setTime(d.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
  }