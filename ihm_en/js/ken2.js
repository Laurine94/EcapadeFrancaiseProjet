 var checkbox1 = document.getElementById('checkbox1');
                            var delivery1_div = document.getElementById('delivery1');
                            var showHiddenDiv = function(){
                            if(checkbox1.checked) {
                              delivery1_div.style['display'] = 'block';
                             } else {
                            delivery1_div.style['display'] = 'none';
   } 
}
                             checkbox1.onclick = showHiddenDiv;
                             showHiddenDiv();
                            