 var checkbox2 = document.getElementById('checkbox2');
                            var delivery2_div = document.getElementById('delivery1');
                            var showHiddenDiv = function(){
                            if(checkbox1.checked) {
                              delivery2_div.style['display'] = 'block';
                             } else {
                            delivery2_div.style['display'] = 'none';
   } 
}
                             checkbox2.onclick = showHiddenDiv;
                             showHiddenDiv();
                            