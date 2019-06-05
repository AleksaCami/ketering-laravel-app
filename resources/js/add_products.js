$(document).ready(function () {

    let productsInCart = [];

    // Event na dugme za dodavanje proizvoda u korpu
    $('#proizvodi').on('click', '#dodaj_proizvod', function() {

        let product_id = $(this).val();
        // pretvaram product_id u integer
        let id = parseInt(product_id);

        // url zbog preglednosti stavljamo u promenljivu
        let url = 'http://localhost:8000/api/product/' + id;

        // primer JavaScript async fetch metode koju cemo implementirati kasnije u pravu aplikaciju umesto ajax-a.
        // fetch(url)
        //     .then(response => {
        //         return response.json();
        //     })
        //     .then(myJson => {
        //         console.log(JSON.stringify(myJson));
        //     });

        $.ajax({
            url: url,
            type: 'GET',
            // !!!!!!!!
            dataType: "json",
            complete: function(result) {
                result.responseJSON = result.responseJSON[0];
                // Sada je result objekat, u kome se nalazi response u JSON obliku sa kojim mozete da radite sta ocete
                // console.log(result);

                // Ako se u listi productInCard nalazi id proizvoda, ispisi
                // alert poruku, u suprotom dodaj proizvod u tabelu.
                if($.inArray(result.responseJSON.id, productsInCart) !== -1) {

                    alert('Proizvod je vec u korpi');

                } else {



                    productsInCart.push(result.responseJSON.id);

                    // Problem je bio sto niste eksplicitno rekli Ajax-u da ocekujete JSON, cim saam to uradio sve je proradilo
                    // Ukoliko iz nekog razloga nece da vam radi, ocistite app cache i config cache
                    // console.log(result.responseJSON.id);

                    $('#bindProducts').append(`
                            <tr>
                                <td>
                                    <div class="img-wrap"><img src="/storage/products_images/${result.responseJSON.products_images}" class="img-thumbnail img-sm"></div>
                                </td>
                                <td>
                                    <figure class="media pt-4">
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">${result.responseJSON.naziv}</h6>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="media pt-4">
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">${result.responseJSON.nazivKuhinje}</h6>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var id="cena${result.responseJSON.id}" class="price"><span id="cena">${result.responseJSON.cena}</span> din.</var>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td>
                                    <input id="kolicina${result.responseJSON.id}" style="width: 70px" class="kolicina form-control" type="number" name="kolicina" value="1">
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var id="ukupno${result.responseJSON.id}" class="price"><span id="ukupnaCena">${result.responseJSON.cena}</span> din.</var>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">

                                    <a data-id="${result.responseJSON.id}" href="#" id="deleteProduct" class="btn btn-danger"> <i class="fas fa-trash"></i></a>

                            </tr>
                                </td>
                        `);
                    povecajUkupnuCenuSvihProizvoda();
                    povecajBrojProizvoda();
                }
            }
        }); // ajax

    }); // event dodaj_proizvod

    // Event za brisanje proizvoda
    $('body').on('click', '#deleteProduct', function(e) {
        e.preventDefault();

        // Obisi id iz liste productsInCart pa zatim obrisi ceo elemenat
        let index = productsInCart.indexOf($(this).data('id'));
        if (index > -1) {
            productsInCart.splice(index, 1);
        }

        $(this).parents('tr').detach();

        povecajUkupnuCenuSvihProizvoda();
        povecajBrojProizvoda();
    });


    // Event za dodavanje kolicine na proizvod
    $('body').on('change', '.kolicina', function(e) {

        let kolicina = $(this).val();
        let row = $(this).parents('tr');
        let cena = $(row).find('#cena').text();
        let ukupnaCena = $(row).find('#ukupnaCena');


        // Promeni ukupnu cenu
        $(ukupnaCena).text(parseInt(cena) * parseInt(kolicina));

        povecajUkupnuCenuSvihProizvoda();
    });

    // Event za pretragu
    $("#pretraga").keyup(function() {

        let valueOfInput = $(this).val().toLowerCase();

        $("h4#nazivProizvoda").filter(function() {
            let proizvod = $(this).parents('#proizvod');
            let nazivProizvoda = $(this).text();

            if(nazivProizvoda.toLowerCase().indexOf(valueOfInput)) {
                console.log('Nema proizvoda');
                $(proizvod).hide();
            } else {
                $(proizvod).show();
            }

        });
    });

    // Event za prikaz tabele sa proizvodima
    $("#stavkeProizvoda").on('click', function () {
        $('#tabelaSaProizvodima').slideToggle(200, 'linear');
    });

    // Submit stavke

    $('#tabelaSaProizvodima').submit(function (e) {
        e.preventDefault();

        // kolicina${result.responseJSON.id}

        let order_id = $('#order_id').val();
        let url = 'http://localhost:8000/stavkeProizvoda/store/' + order_id;

        $.each(productsInCart, function (i, val) {
            let kolicina = $('#kolicina'+val).val();
            let product_id = val;
            console.log(order_id);
            console.log(kolicina);
            console.log(product_id);

            $.ajax({
                url : url,
                type : 'POST',
                data : {
                    'order_id': order_id,
                    'kolicina': kolicina,
                    'product_id': product_id
                },
                success : function(result) {

                    location.href = "http://localhost:8000/stavkeProizvoda/" + order_id;
        }
            });
        });
    });


    function povecajUkupnuCenuSvihProizvoda() {
        let kolicinaSvihProizvoda = $('#bindProducts tr').toArray();
        let ukupnaCenaSvihProizvoda = $('#total');

        let novaCenaSvihProizvoda = 0;
        let cenaProizvoda;

        $.each(kolicinaSvihProizvoda, function(i, val) {
            cenaProizvoda = $(val).find('#ukupnaCena').text()
            novaCenaSvihProizvoda += parseInt(cenaProizvoda);
        });


        $(ukupnaCenaSvihProizvoda).text(novaCenaSvihProizvoda);
    }

    function povecajBrojProizvoda() {

        $('#brojProizvoda').text(productsInCart.length);

    }


}); // Document ready
