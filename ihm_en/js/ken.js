 
                            var checkbox = document.getElementById('checkbox');
                            var delivery_div = document.getElementById('delivery');
                            var showHiddenDiv = function(){
                            if(checkbox.checked) {
                              delivery_div.style['display'] = 'block';
                             } else {
                            delivery_div.style['display'] = 'none';
   } 
}
                             checkbox.onclick = showHiddenDiv;
                             showHiddenDiv();
                            