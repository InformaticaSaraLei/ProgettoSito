$(document).ready(function () {
    elaborator(".box1");
    elaborator(".box2");
    elaborator(".box3");
    elaborator(".box4");
    elaborator(".box5");
    elaborator(".box6");
});

function elaborator(class_string) {
    var newheight = 0 //impostiamo un'altezza iniziale

    var padding = ($(class_string).css("padding")).split('px');
    //estraggo, se c'è, il padding della classe, dividendolo dall'unità di misura 'px'

    $(class_string).each(function () { // Per ogni div con la classe .single_box

        if ($(this).height() > newheight)
        // se l'altezza di questo div è maggiore dell'attuale
        //valore di NEWHEIGHT, reimposto il valore di questa variabile

        {
            newheight = $(this).height();
        }


        //aggiungo all'altezza del più alto il padding estratto,
        //moltiplicato per 2 , per avere un leggero margine in piu


    });
    var compHeight = newheight + 10 + "px";

    $(class_string).css("height", compHeight); //imposto al volo il valore 'height' nel CSS, con il nuovo valore trovato.
}